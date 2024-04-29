<?php

/**
 * Système d'autoload. 
 * A chaque fois que PHP va avoir besoin d'une classe, il va appeler cette fonction 
 * et chercher dnas les divers dossiers (ici models, controllers, views, services) s'il trouve 
 * un fichier avec le bon nom. Si c'est le cas, il l'inclut avec require_once.
 */
spl_autoload_register(function($className) {
    
    // Liste des répertoires à parcourir
    $directories = ['services', 'models', 'controllers', 'views'];

    // Parcourir les répertoires pour rechercher la classe
    foreach ($directories as $directory) {
        $filePath = $directory . '/' . $className . '.php';
        if (file_exists($filePath)) {
            require_once $filePath;
            return;
        }
    }
    
});