<?php
/**
 * @author    Arthur Patsanovskiy <arthur2050@mail.ru>
 * @copyright Copyright (c) 2024, Darvin Digital
 * @link      https://darvindigital.ru/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Entity\Model;


class OrderListParameters
{
    /**
     * @var string
     */
    private $groupBy;

    /**
     * @return string
     */
    public function getGroupBy(): string
    {
        return $this->groupBy;
    }

    /**
     * @param string $groupBy
     *
     * @return OrderListParameters
     */
    public function setGroupBy(string $groupBy): OrderListParameters
    {
        $this->groupBy = $groupBy;

        return $this;
    }
}
