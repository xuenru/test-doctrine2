<?php
/**
 * Created by PhpStorm.
 * User: xuenru
 * Date: 2017/12/16
 * Time: 下午10:28
 */
require_once "bootstrap.php";

$id = $argv[1];
$newName = $argv[2];
/** @var Product $product */
$product = $entityManager->find('Product', $id);

if (!$product) {
    echo "Product $id does not exist. \n";
    exit(1);
}

$product->setName($newName);

$entityManager->flush();
