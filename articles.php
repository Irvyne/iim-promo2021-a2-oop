<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/bootstrap.php';

use App\Entity\Article;

// ?page={{value}}
$page = $_GET['page'] ?? 1;

/** @var \App\Repository\ArticleRepository $repo */
$repo = $entityManager->getRepository(Article::class);

$articles = $repo->loadAll(10, ($page - 1) * 10);

$count = $repo->count();

$maxPage = (int)ceil($count / 10);

echo $twig->render('articles.html.twig', [
    'title'       => 'Articles',
    'articles'    => $articles,
    'currentPage' => $page,
    'maxPage'     => $maxPage,
]);