<?php
/**
 * Created by PhpStorm.
 * User: xuenru
 * Date: 2017/12/16
 * Time: 下午10:17
 */
require_once "bootstrap.php";

$productRepository = $entityManager->getRepository('Product');
$products = $productRepository->findAll();

foreach ($products as $product) {
    echo sprintf("- %s\n", $product->getName());
}