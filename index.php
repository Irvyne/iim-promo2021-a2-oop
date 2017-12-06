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

    // Save all data each 500 articles to avoid memory leaks.
    if (0 === $i % 500) {
        $entityManager->flush();
    }
}

$entityManager->flush();
