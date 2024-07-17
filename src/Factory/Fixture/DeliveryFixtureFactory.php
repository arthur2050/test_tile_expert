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


use App\Entity\Delivery;
use Faker\Factory;

class DeliveryFixtureFactory implements FixtureFactoryInterface
{

    public function create()
    {
        $faker = Factory::create();
        $delivery = new Delivery(); //cost, type, country, city, address, phone, payType,
        //trackingNumber, carrierName,
        $delivery->setCost($faker->randomFloat(20000));
        $delivery->setIndexD($faker->postcode);
        $delivery->setType($faker->numberBetween(1, 4));
        $delivery->setCountry($faker->numberBetween(1, 100));
        $delivery->setCity($faker->city);
        $delivery->setAddress($faker->address);
        $delivery->setPhone(substr($faker->phoneNumber, 0, 18));
        $delivery->setPayType($faker->numberBetween(1, 4));
        $delivery->setTrackingNumber($faker->md5);
        $delivery->setCarrierName($faker->unique()->name);
        $delivery->setCarrierContactData($faker->phoneNumber);
        $delivery->setAddressPayer($faker->numberBetween(1, 100000));

        return $delivery;
    }
}
