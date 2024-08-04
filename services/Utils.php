<?php

/**
* Classe utilitaire : cette classe ne contient que des méthodes statiques qui peuvent être appelées
* directement sans avoir besoin d'instancier un objet Utils.
*/
class Utils {

    /**
     * Convertit une date vers le format de type "Samedi 15 juillet 2023" en francais.
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

    public static function focus(string $page, $action = '') 
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

    public static function sanitizeFilename($username) {

        // Supprime les apostrophes et autres caractères spéciaux
        $username = preg_replace('/[\'"^£$%&*()}{@#~?><>,|=_+¬-]/', '', $username);

        // Remplace les espaces par des tirets
        $username = str_replace(' ', '-', $username);
    
        // Convertit en minuscules (optionnel)
        $username = strtolower($username);
    
        return $username;
    }
    

}