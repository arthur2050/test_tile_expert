<?php
/**
 * @author    Arthur Patsanovskiy <arthur2050@mail.ru>
 * @copyright Copyright (c) 2024, Darvin Digital
 * @link      https://darvindigital.ru/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\DataFixtures;

use App\Factory\Fixture\ArticleFixtureFactory;
use App\Factory\Fixture\BankDetailsFixtureFactory;
use App\Factory\Fixture\DeliveryFixtureFactory;
use App\Factory\Fixture\FixtureFactoryInterface;
use App\Factory\Fixture\OrderFixtureFactory;
use App\Factory\Fixture\StoreFixtureFactory;
use App\Factory\Fixture\UserFixtureFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    /**
     * @var FixtureFactoryInterface
     */
    private $userFixtureFactory;

    /**
     * @var FixtureFactoryInterface
     */
    private $deliveryFixtureFactory;

    /**
     * @var FixtureFactoryInterface
     */
    private $storeFixtureFactory;

    /**
     * @var FixtureFactoryInterface
     */
    private $bankDetailsFixtureFactory;

    /**
     * @var FixtureFactoryInterface
     */
    private $articleFixtureFactory;

    /**
     * @var FixtureFactoryInterface
     */
    private $orderFixtureFactory;

    public function __construct(UserFixtureFactory        $userFixtureFactory,
                                DeliveryFixtureFactory    $deliveryFixtureFactory,
                                StoreFixtureFactory       $storeFixtureFactory,
                                BankDetailsFixtureFactory $bankDetailsFixtureFactory,
                                ArticleFixtureFactory     $articleFixtureFactory,
                                OrderFixtureFactory       $orderFixtureFactory)
    {
        $this->userFixtureFactory        = $userFixtureFactory;
        $this->deliveryFixtureFactory    = $deliveryFixtureFactory;
        $this->storeFixtureFactory       = $storeFixtureFactory;
        $this->bankDetailsFixtureFactory = $bankDetailsFixtureFactory;
        $this->articleFixtureFactory     = $articleFixtureFactory;
        $this->orderFixtureFactory       = $orderFixtureFactory;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        $users = [];
        $stores = [];
        $banksDetails = [];
        $articles = [];

        for($i=0; $i<5; $i++){
            $user = $this->userFixtureFactory->create();
            $store = $this->storeFixtureFactory->create();
            $bankDetails = $this->bankDetailsFixtureFactory->create();

            $manager->persist($user);
            $manager->persist($store);
            $manager->persist($bankDetails);

            $users[] = $user;
            $stores[] = $store;
            $banksDetails[] = $bankDetails;
        }

        $manager->flush();

        for($i=0; $i<2000; $i++){
            $article = $this->articleFixtureFactory->create();
            $article->setStore($faker->randomElement($stores));
            $manager->persist($article);
            $articles[] = $article;
        }

        $offset = 0;
        for($i=0; $i<200; $i++){
            $delivery = $this->deliveryFixtureFactory->create();

            $this->orderFixtureFactory->setUser($faker->randomElement($users));
            $this->orderFixtureFactory->setDelivery($delivery);
            $this->orderFixtureFactory->setBankDetails($faker->randomElement($banksDetails));
            $this->orderFixtureFactory->setArticles(array_slice($articles, $offset, 10));
            $order = $this->orderFixtureFactory->create();
            $offset+=10;
            $manager->persist($delivery);
            $manager->persist($order);
        }
        $manager->flush();
    }
}
