<?php
require_once "bootstrap.php";

$bugId = $argv[1];

/** @var Bug $bug */
$bug = $entityManager->find("Bug", (int)$bugId);
$bug->close();

$entityManager->flush();