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


use App\Entity\BankDetails;
use Faker\Factory;

class BankDetailsFixtureFactory implements FixtureFactoryInterface
{

    public function create()
    {
        $faker = Factory::create();

        $bankDetails = new BankDetails();
        $bankDetails->setInn($faker->bankAccountNumber);
        return $bankDetails;
    }
}
