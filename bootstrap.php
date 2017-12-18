<?php
/**
 * Created by PhpStorm.
 * User: xuenru
 * Date: 2017/12/16
 * Time: 下午9:43
 */

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration([__DIR__.'/src'], $isDevMode);

// or if you prefer yaml or XML
//$config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);
//$config = Setup::createYAMLMetadataConfiguration(array(__DIR__."/config/yaml"), $isDevMode);

// database configuration parameters
$conn = [
    'driver' => 'pdo_sqlite',
    'path'   => __DIR__.'/db.sqlite',
];

$entityManager = EntityManager::create($conn, $config);