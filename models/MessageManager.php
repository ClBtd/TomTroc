<?php

/**
 * Manager des méthodes relatives aux messages.
 */

class MessageManager extends AbstractEntityManager
{
    /**
     * Récupère le dernier message reçu de chaque conversation de l'utilisateur.
     * @return array : un tableau d'objet Message.
     */
    public function getAllConversations($userId) : array
    {
        $sql = "SELECT m.*,
                us.login AS senderLogin,
                us.picture AS senderPicture,
                uc.login AS userLogin,
                uc.picture AS userPicture
                FROM Messages m
                INNER JOIN (
                    SELECT 
                        LEAST(userId, senderId) AS groupId,
                        GREATEST(userId, senderId) AS contactId,
                        MAX(date) AS maxDate
                    FROM Messages
                    WHERE userId = :userId OR senderId = :userId
                    GROUP BY LEAST(userId, senderId), GREATEST(userId, senderId)
                ) groupedMessages ON (
                    LEAST(m.userId, m.senderId) = groupedMessages.groupId 
                    AND GREATEST(m.userId, m.senderId) = groupedMessages.contactId 
                    AND m.date = groupedMessages.maxDate
                )
                JOIN Users us ON m.senderId = us.id
                JOIN Users uc ON m.userId = uc.id   
                WHERE m.userId = :userId OR m.senderId = :userId
                ORDER BY m.date DESC;";
       $result = $this->db->query($sql, ['userId' => $userId]);
       $messages = [];

       while ($message = $result->fetch()) {
           $messages[] = new Message($message);
       }
       return $messages;
    }

    /**
     * Récupère tout les messages d'une conversation avec un utilisateur via son ID.
     * @return array : un tableau d'objets Message.
     */
    public function getMessagesRecieved(int $userId, int $senderId) : array
    {
        $sql = "SELECT * FROM Messages 
        WHERE userId = :userId AND senderId = :senderId 
        OR userId = :senderId AND senderId = :userId
        ORDER BY date DESC";
        $result = $this->db->query($sql, ['userId' => $userId,'senderId' => $senderId]);
        $messages = [];

        while ($message = $result->fetch()) {
            $messages[] = new Message($message);
        }
        return $messages;
    }

    /**
     * Ajoute un nouveau message.
     * @param Message $message
     * @return bool
     */
    public function sendMessage(Message $message) : bool 
    {
        $timezone = new DateTimeZone('Europe/Paris');
        $date = new DateTime('now', $timezone);
        $formatedDate = $date->format('Y-m-d H:i:s');

        $sql = "INSERT INTO Messages (content, date, userId, senderId) VALUES (:content, :date, :userId, :senderId)";
        $params =[
            ':content' => $message->getContent(),
            ':date' => $formatedDate,
            ':userId' => $message->getUserId(),
            ':senderId' => $message->getSenderId()
        ];

        $result = $this->db->query($sql, $params);
        return $result->rowCount() > 0;
    }
}