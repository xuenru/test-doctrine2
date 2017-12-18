<?php

require_once "bootstrap.php";

$theBugId = $argv[1];

$bug = $entityManager->find('Bug', $theBugId);
$bug->close();

$entityManager->flush();
