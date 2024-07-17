<?php


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
