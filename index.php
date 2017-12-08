<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/bootstrap.php';

use App\Entity\Article;

// Save ->persist($object) puis ->flush()

/** @var \App\Repository\ArticleRepository $articleRepository */
$articleRepository = $entityManager->getRepository(Article::class);

// Get One Article or null if id doesn't exist
$article = $articleRepository->find(1);

// Get all Article
$articles = $articleRepository->loadAll(500, 0);

// Get one Article with filter or null if no filter match
$articleBy = $articleRepository->findOneBy([
    'status' => Article::STATUS_PUBLISHED,
]);

// Get one Article with filter or null if no filter match
$articlesBy = $articleRepository->findBy([
    'status' => Article::STATUS_PUBLISHED,
]);

dump($article);
dump($articles);
dump($articleBy);
dump($articlesBy);
