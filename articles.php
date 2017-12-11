<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/bootstrap.php';

use App\Entity\Article;

// ?page={{value}}
$page = $_GET['page'] ?? 1;

/** @var \App\Repository\ArticleRepository $repo */
$repo          = $entityManager->getRepository(Article::class);
$articles      = $repo->loadAll(Article::MAX_PER_PAGE, ($page - 1) * Article::MAX_PER_PAGE);
$count         = $repo->count();

$maxPagination = (int)ceil($count / Article::MAX_PER_PAGE);

$minPage = (int)max(1, ($page - 5));
$maxPage = (int)min($maxPagination, ($page + 5));

$max = 0;

while(abs($minPage - $maxPage) < 10){
    if ($minPage > 1){
        $minPage--;
    }
    if ($maxPage < $maxPagination){
        $maxPage++;
    }

    $max++;

    if ($max > 10){
        break;
    }
}

echo $twig->render('articles.html.twig', [
    'title'         => 'Articles',
    'articles'      => $articles,
    'currentPage'   => $page,
    'maxPagination' => $maxPagination,
    'minPage'       => $minPage,
    'maxPage'       => $maxPage,
]);