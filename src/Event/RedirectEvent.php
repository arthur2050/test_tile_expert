<?php
/**
 * @author    Arthur Patsanovskiy <arthur2050@mail.ru>
 * @copyright Copyright (c) 2024, Darvin Digital
 * @link      https://darvindigital.ru/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Event;


use Symfony\Contracts\EventDispatcher\Event;

class RedirectEvent extends Event
{
    private $routeName;
    private $routeParams;

    public function __construct(string $routeName, array $routeParams = [])
    {
        $this->routeName = $routeName;
        $this->routeParams = $routeParams;
    }

    public function getRouteName(): string
    {
        return $this->routeName;
    }

    public function getRouteParams(): array
    {
        return $this->routeParams;
    }
}
