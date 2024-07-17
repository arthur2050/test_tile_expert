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


class MainRouteParameters
{
    /**
     * @var string
     */
    private $factory;

    /**
     * @var string
     */
    private $collection;

    /**
     * @var string
     */
    private $article;

    /**
     * @return string
     */
    public function getFactory()
    {
        return $this->factory;
    }

    /**
     * @param string $factory factory
     *
     * @return MainRouteParameters
     */
    public function setFactory($factory): MainRouteParameters
    {
        $this->factory = $factory;

        return $this;
    }

    /**
     * @return string
     */
    public function getCollection()
    {
        return $this->collection;
    }

    /**
     * @param string $collection collection
     *
     * @return MainRouteParameters
     */
    public function setCollection($collection): MainRouteParameters
    {
        $this->collection = $collection;

        return $this;
    }

    /**
     * @return string
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * @param string $article article
     *
     * @return MainRouteParameters
     */
    public function setArticle($article): MainRouteParameters
    {
        $this->article = $article;

        return $this;
    }
}
