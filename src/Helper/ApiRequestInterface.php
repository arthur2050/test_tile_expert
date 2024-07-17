<?php
/**
 * @author    Arthur Patsanovskiy <arthur2050@mail.ru>
 * @copyright Copyright (c) 2024, Darvin Digital
 * @link      https://darvindigital.ru/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Helper;

/**
 * Interface ApiRequestInterface
 * @package App\Interfaces
 */
interface ApiRequestInterface
{
    public function sendApiRequest(string $url, string $method);
}
