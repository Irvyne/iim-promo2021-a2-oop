<?php

require __DIR__ . '/vendor/autoload.php';
$params = require __DIR__ . '/parameters.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths         = [__DIR__."/Entity"];
$isDevMode     = true;
$config        = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);
$entityManager = EntityManager::create($params['db'], $config);