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


use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class ApiHelper implements ApiRequestInterface
{
    private $client;

    private $baseUrl;

    /**
     * ApiHelper constructor.
     * @param string $baseUrlRequest
     */
    public function __construct(
        string $baseApiUrl
    )
    {
        $this->baseUrl = $baseApiUrl;
        $this->client = new Client(['base_uri' => $this->baseUrl]);;
    }

    /**
     * @param string $url
     * @param string $method
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function sendApiRequest(string $url = '', string $method = 'GET')
    {
        return $this->client->request($method, $url);
    }

    public function setBaseUrl(string $baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }

    public function getBaseUrl()
    {
        return $this->baseUrl;
    }
}
