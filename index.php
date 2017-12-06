<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/vendor/autoload.php';

$article = new App\Entity\Article();

try {
    $article->setId(19);
    $article->setName("Mon Belézef \$zdf zfz");
    $article->setStatus(\App\Entity\Article::STATUS_UNPUBLISHED);

    dump($article);
} catch (Exception $e) {
    echo "Error, ".$e->getMessage();
}
