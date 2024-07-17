<?php
/**
 * @author    Arthur Patsanovskiy <arthur2050@mail.ru>
 * @copyright Copyright (c) 2024, Darvin Digital
 * @link      https://darvindigital.ru/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Factory\Fixture;


use App\Entity\Article;
use Faker\Factory;

class ArticleFixtureFactory implements FixtureFactoryInterface
{
    private $store;

    public function create()
    {
        $faker = Factory::create();

        $article = new Article();
        //amount, price, currency, measure, weight, packagingCount, pallet, packaging, swimmingPool
        $article->setAmount($faker->numberBetween(1, 10000));
        $article->setPrice($faker->numberBetween(1, 10000));
        $article->setCurrency($faker->randomElement(['Eur', 'Dol', 'Rub']));
        $article->setMeasure($faker->randomElement(['cm','m','mm']));
        $article->setWeight($faker->randomFloat(1000));
        $article->setPackagingCount($faker->randomFloat(100));
        $article->setPallet($faker->randomFloat(100));
        $article->setPackaging($faker->randomFloat(100));
        $article->setSwimmingPool($faker->boolean);
        $article->setStore($this->store);


        return $article;
    }


    /**
     * @param mixed $store
     *
     * @return ArticleFixtureFactory
     */
    public function setStore($store): ArticleFixtureFactory
    {
        $this->store = $store;

        return $this;
    }
}
