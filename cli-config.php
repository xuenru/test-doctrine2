<?php
/**
 * Created by PhpStorm.
 * User: xuenru
 * Date: 2017/12/16
 * Time: 下午9:49
 */
require_once 'bootstrap.php';

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);