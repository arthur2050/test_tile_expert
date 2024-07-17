<?php
/**
 * @author    Arthur Patsanovskiy <arthur2050@mail.ru>
 * @copyright Copyright (c) 2024, Darvin Digital
 * @link      https://darvindigital.ru/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Repository;


use App\Entity\Order;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class OrderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Order::class);
    }

    public function findForShowForm()
    {
        $builder = $this->createQueryBuilder('o');

        $ids = $builder->select('o.id')
            ->getQuery()->getScalarResult()
        ;

        $ids = array_map(function ($item) {
            return $item['id'];
        }, $ids);

        return array_combine($ids, $ids);

    }

    public function findForPagination($groupBy = 'days')
    {
        $groupByPatterns = [
          'days' => [
              'select' => "DATE_FORMAT(o.createdAt, '%Y-%m-%d') as time, COUNT(o.id) as orderCount",
              'groupByWord' => 'time',
              'orderByWord' => 'time'
          ],
          'months' => [
              'select' => "DATE_FORMAT(o.createdAt, '%Y-%m') as time, COUNT(o.id) as orderCount",
              'groupByWord' => 'time',
              'orderByWord' => 'time'
          ],
          'years' => [
              'select' => "DATE_FORMAT(o.createdAt, '%Y') as time, COUNT(o.id) as orderCount",
              'groupByWord' => 'time',
              'orderByWord' => 'time'
          ]
        ];
        if (!array_key_exists($groupBy, $groupByPatterns)) {
            throw new \InvalidArgumentException("Invalid group by parameter");
        }
        $builder = $this->createQueryBuilder('o');

        return $builder
            ->select($groupByPatterns[$groupBy]['select'])
            ->groupBy($groupByPatterns[$groupBy]['groupByWord'])
            ->orderBy($groupByPatterns[$groupBy]['orderByWord'])
            ->getQuery()->getResult()
        ;
    }
}
