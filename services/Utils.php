<?php

/**
* Classe utilitaire : cette classe ne contient que des méthodes statiques qui peuvent être appelées
* directement sans avoir besoin d'instancier un objet Utils.
*/

class Utils {

    /**
     * Convertit une date et une heure vers le format de type "15.07 12:34".
     * @param DateTime $date : la date à convertir.
     * @return string : la date convertie.
     */
    public static function convertDateToFrenchFormat(DateTime $date) : string
    {
        $dateFormatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::FULL, IntlDateFormatter::FULL);
        $dateFormatter->setPattern('d.MM H:mm');
        return $dateFormatter->format($date);
    }

    /**
     * Convertit une heure vers le format de type "14:56".
     * @param DateTime $date : l'heure à convertir.
     * @return string : l'heure convertie.
     */
    public static function convertDateToHour(DateTime $date) : string
    {
        $dateFormatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::FULL, IntlDateFormatter::FULL);
        $dateFormatter->setPattern('H:mm');
        return $dateFormatter->format($date);
    }

    /**
     * Cette méthode permet de récupérer une variable de la superglobale $_REQUEST.
     * Si cette variable n'est pas définie, on retourne la valeur null (par défaut)
     * ou celle qui est passée en paramètre si elle existe.
     * @param string $variableName : le nom de la variable à récupérer.
     * @param mixed $defaultValue : la valeur par défaut si la variable n'est pas définie.
     * @return mixed : la valeur de la variable ou la valeur par défaut.
     */
    public static function request(string $variableName, mixed $defaultValue = null) : mixed
    {
        return $_REQUEST[$variableName] ?? $defaultValue;
    }

    /**
     * Redirige vers une URL.
     * @param string $action : l'action que l'on veut faire (correspond aux actions dans le routeur).
     * @param array $params : Facultatif, les paramètres de l'action sous la forme ['param1' => 'valeur1', 'param2' => 'valeur2']
     * @return void
     */
    public static function redirect(string $action, array $params = []) : void
    {
        $url = "index.php?action=$action";
        foreach ($params as $paramName => $paramValue) {
            $url .= "&$paramName=$paramValue";
        }
        header("Location: $url");
        exit();
    }

    /**
     * Vérifie que l'utilisateur est connecté.
     * @return void
     */
    public static function checkIfUserIsConnected() : void
    {
        // On vérifie que l'utilisateur est connecté.
        if (!isset($_SESSION['user'])) {
            Utils::redirect("connectionForm");
        }
    }

    /**
     * Attribue la classe focus à la page en cours dans le menu du header.
     * @return string
     */
    public static function focus(string $page, $action = '') : string
    {
        return $page === $action ? 'focus' : '';
    }

    /**
     * Compte le nombre d'années d'inscription de l'utilisateur.
     * @return string
     */
    public static function years(DateTime $date) {
        $currentDate = new DateTime();
        $interval = $date->diff($currentDate);
        return $interval->y;
    }

    /**
     * Transforme le nom de l'utilisateur ou du livre en nom utilisable pour le fichier image.
     * @return string
     */
    public static function sanitizeFilename($name) {

        // Supprime les apostrophes et autres caractères spéciaux
        $username = preg_replace('/[\'"^£$%&*()}{@#~?><>,|=_+¬-]/', '', $name);

        // Remplace les espaces par des tirets
        $username = str_replace(' ', '-', $name);
    
        // Convertit en minuscules (optionnel)
        $username = strtolower($name);
    
        return $name;
    }
    

}