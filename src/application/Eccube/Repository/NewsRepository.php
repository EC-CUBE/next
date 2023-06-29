<?php

/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) EC-CUBE CO.,LTD. All Rights Reserved.
 *
 * http://www.ec-cube.co.jp/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Eccube\Repository;

use Eccube\ORM\Exception\ForeignKeyConstraintViolationException;
use Eccube\ORM\ManagerRegistry;
use Eccube\Entity\News;

/**
 * NewsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class NewsRepository extends AbstractRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, News::class);
    }

    /**
     * 新着情報を登録します.
     *
     * @param $News
     */
    public function save($News)
    {
        $em = $this->getEntityManager();
        $em->persist($News);
        $em->flush();
    }

    /**
     * 新着情報を削除します.
     *
     * @param News $News
     *
     * @throws ForeignKeyConstraintViolationException 外部キー制約違反の場合
     */
    public function delete($News)
    {
        $em = $this->getEntityManager();
        $em->remove($News);
        $em->flush();
    }

    /**
     * @return \Eccube\ORM\QueryBuilder
     */
    public function getQueryBuilderAll()
    {
        $qb = $this->createQueryBuilder('n');
        $qb->orderBy('n.publish_date', 'DESC')
            ->addOrderBy('n.id', 'DESC');

        return $qb;
    }

    /**
     * @return News[]
     */
    public function getList()
    {
        // second level cacheを効かせるためfindByで取得
        $Results = $this->findBy(['visible' => true], ['publish_date' => 'DESC', 'id' => 'DESC']);

        // 公開日時前のNewsをフィルター
        return array_filter($Results, fn ($News) => $News->getPublishDate() <= new \DateTime());
    }
}
