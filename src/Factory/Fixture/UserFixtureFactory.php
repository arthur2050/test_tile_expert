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


use App\Entity\User;
use Faker\Factory;

class UserFixtureFactory implements FixtureFactoryInterface
{
    public function create()
    {
        $faker = Factory::create();
        $user = new User();
        $user->setName($faker->name);
        $user->setEmail($faker->email);
        $user->setCompanyName($faker->company);
        $user->setPassword($faker->password);
        $user->setRoles([$faker->randomElement(['ROLE_USER', 'ROLE_MANAGER'])]);
        $user->setSurname($faker->lastName);
        $user->setSex($faker->numberBetween(1, 2));

        return $user;
    }
}
