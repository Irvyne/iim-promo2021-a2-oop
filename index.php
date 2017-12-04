<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/Article.php';

$article = new Article();

try {
    $article->setId(19);
    $article->setName("Blabla");
    $article->setStatus(Article::STATUS_UNPUBLISHED);
} catch (Exception $e) {
    echo "Error, ".$e->getMessage();
}
