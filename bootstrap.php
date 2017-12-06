<?php

require __DIR__ . '/vendor/autoload.php';
$params = require __DIR__ . '/parameters.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths         = ["/Entity"];
$isDevMode     = true;
$config        = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($params['db'], $config);