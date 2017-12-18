<?php
/**
 * Created by PhpStorm.
 * User: xuenru
 * Date: 2017/12/17
 * Time: 上午12:02
 */
require_once "bootstrap.php";

$newUserName = $argv[1];
$user = new User();
$user->setName($newUserName);

$entityManager->persist($user);
$entityManager->flush();

echo "Created User with ID ".$user->getId()."\n";
