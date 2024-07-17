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


use App\Entity\Store;
use Faker\Factory;

class StoreFixtureFactory implements FixtureFactoryInterface
{

    public function create()
    {
        $faker = Factory::create();

        $store = new Store();
        $store->setAddress($faker->address);
        $store->setName($faker->name);
        $store->setWorkingHours($faker->randomElement(['09:00 - 17:00', '10:00 - 18:00', '08:30 - 16:30']));

        return $store;
    }
}
