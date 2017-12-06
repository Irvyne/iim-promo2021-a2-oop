<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/bootstrap.php';

use App\Entity\Article;

$faker = Faker\Factory::create();

for ($i = 0; $i < 100000; $i++) {
    $article = new Article();
    $article->setName($faker->name);
    $article->setStatus(Article::STATUS_UNPUBLISHED);

    $entityManager->persist($article);
}

$entityManager->flush();
