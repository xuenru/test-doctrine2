<?php
/**
 * Created by PhpStorm.
 * User: xuenru
 * Date: 2017/12/16
 * Time: 下午10:20
 */
require_once "bootstrap.php";
$id = $argv[1];
$product = $entityManager->find('Product', $id);

//$productRepository = $entityManager->getRepository('Product');
//$product = $productRepository->find($id);



if ($product === null) {
    echo "No product found. \n";
    exit(1);
}

echo sprintf("- %s \n", $product->getName());