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


use App\Entity\Order;
use Faker\Factory;

class OrderFixtureFactory implements FixtureFactoryInterface
{
    private $user;

    private $delivery;

    private $bankDetails;

    private $articles;

    public function create()
    {
        $faker = Factory::create();

        $order = new Order();//hash, user, token, status, delivery, vatType, locale, curRate,
        //currency, measure, name, store, step, bankDetails, articles
        $order->setHash(substr(sha1($faker->unique()->uuid), 0, 18));
        $order->setUser($this->user);
        $order->setToken(substr(sha1($faker->unique()->word), 0, 18));
        $order->setStatus($faker->numberBetween(1, 10));
        $order->setDelivery($this->delivery);
        $order->setVatType($faker->numberBetween(1, 100));
        $order->setLocale(substr($faker->locale, 0, 2));
        $order->setCurRate($faker->randomFloat(1000));
        $order->setCurrency($faker->currencyCode);
        $order->setMeasure($faker->randomElement(['cm','m','mm']));
        $order->setName($faker->sentence(4));
        $order->setStep($faker->boolean);
        $order->setBankDetails($this->bankDetails);
        foreach ($this->articles as $article) {
            $order->addArticle($article);
        }
//        $years = [2023, 2024, 2022];
//        $year = $faker->randomElement($years);
//        $month = $faker->numberBetween(1, 12);
//        $day = $faker->numberBetween(1, cal_days_in_month(CAL_GREGORIAN, $month, $year));
//        $date = \DateTime::createFromFormat('Y-m-d', sprintf('%04d-%02d-%02d', $year, $month, $day));

        $date = $faker->dateTimeBetween('-2 years');

        $order->setCreatedAt($date);
        return $order;
    }

    /**
     * @param mixed $user
     *
     * @return OrderFixtureFactory
     */
    public function setUser($user): OrderFixtureFactory
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @param mixed $delivery
     *
     * @return OrderFixtureFactory
     */
    public function setDelivery($delivery): OrderFixtureFactory
    {
        $this->delivery = $delivery;

        return $this;
    }


    /**
     * @param mixed $bankDetails
     *
     * @return OrderFixtureFactory
     */
    public function setBankDetails($bankDetails): OrderFixtureFactory
    {
        $this->bankDetails = $bankDetails;

        return $this;
    }

    /**
     * @param mixed $article
     *
     * @return OrderFixtureFactory
     */
    public function setArticles($articles): OrderFixtureFactory
    {
        $this->articles = $articles;

        return $this;
    }

}
