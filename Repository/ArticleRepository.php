<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class ArticleRepository extends EntityRepository
{
    public function loadAll($limit = 500, $offset = 0)
    {
        $queryBuilder = $this->createQueryBuilder('a');
        $queryBuilder->setFirstResult($offset);
        $queryBuilder->setMaxResults($limit);

        return $queryBuilder->getQuery()->execute();
    }

    public function count()
    {
        $queryBuilder = $this->createQueryBuilder('a');
        $queryBuilder->select('COUNT(a.id)');

        return (int) $queryBuilder->getQuery()->getSingleScalarResult();
    }
}