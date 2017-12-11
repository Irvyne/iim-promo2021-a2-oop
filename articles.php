<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/bootstrap.php';

use App\Entity\Article;

// ?page={{value}}
$page = $_GET['page'] ?? 1;

/** @var \App\Repository\ArticleRepository $repo */
$repo     = $entityManager->getRepository(Article::class);
$articles = $repo->loadAll(Article::MAX_PER_PAGE, ($page - 1) * Article::MAX_PER_PAGE);
$count    = $repo->count();
$maxPage  = (int)ceil($count / Article::MAX_PER_PAGE);

echo $twig->render('articles.html.twig', [
    'title'       => 'Articles',
    'articles'    => $articles,
    'currentPage' => $page,
    'maxPage'     => $maxPage,
]);