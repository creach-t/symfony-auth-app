<?php
/**
 * Script pour corriger les avertissements de dépréciation E_STRICT
 * 
 * Ce script modifie le fichier ErrorHandler.php de Symfony pour
 * remplacer les occurrences de E_STRICT par sa valeur numérique.
 */

$errorHandlerPath = __DIR__ . '/vendor/symfony/error-handler/ErrorHandler.php';

if (!file_exists($errorHandlerPath)) {
    echo "Le fichier ErrorHandler.php n'a pas été trouvé. Assurez-vous que le script est exécuté depuis la racine du projet.\n";
    exit(1);
}

$content = file_get_contents($errorHandlerPath);

// Sauvegarde du fichier original
file_put_contents($errorHandlerPath . '.bak', $content);
echo "Sauvegarde créée : {$errorHandlerPath}.bak\n";

// Remplacement des occurrences de E_STRICT par 2048
$newContent = str_replace('E_STRICT', '2048 /* E_STRICT déprécié en PHP 8 */', $content);

if ($content === $newContent) {
    echo "Aucune modification n'a été apportée au fichier.\n";
    exit(0);
}

file_put_contents($errorHandlerPath, $newContent);
echo "Le fichier ErrorHandler.php a été modifié avec succès.\n";
echo "Les occurrences de E_STRICT ont été remplacées par sa valeur numérique (2048).\n";
echo "Pour revenir à la version originale, renommez le fichier de sauvegarde.\n";
