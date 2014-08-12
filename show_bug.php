<?php
require_once "bootstrap.php";

$bugId = $argv[1];

/** @var Bug $bug */
$bug = $entityManager->find("Bug", (int)$bugId);

if ($bug === null) {
    echo "Kein Bug mit dieser ID gefunden.\n";
    exit(1);
}

echo "Bug: ".$bug->getDescription()."\n";
echo "Engineer: ".$bug->getEngineer()->getName()."\n";