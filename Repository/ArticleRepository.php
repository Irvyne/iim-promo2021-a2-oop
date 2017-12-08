<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class ArticleRepository extends EntityRepository
{
    public function loadAll($limit = 500, $offset = 0)
    {
        $queryBuilder = $this->createQueryBuilder('a');
        $queryBuilder->from($offset, 'a');
        $queryBuilder->setMaxResults($limit);

        return $queryBuilder->getQuery()->execute();
    }
}