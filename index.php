<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/Article.php';

$article = new Article();

try {
    $article->setId(-19);
} catch (Exception $e) {
    echo "Error, ".$e->getMessage();
}
