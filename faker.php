<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/bootstrap.php';

use App\Entity\Article;

$faker = Faker\Factory::create();
$i     = 0;

while ($i < 10000) {
    $article = new Article();
    $article->setName($faker->name);
    $article->setStatus(mt_rand(0, 2));
    $entityManager->persist($article);

    if ($i % 100) {
        $entityManager->flush();
    }

    $i++;
}

$entityManager->flush();

echo "<h1>10000 new fake Articles successfully created.</h1>";