<?php


namespace App\Parser;


use App\Helper\ApiRequestInterface;
use RuntimeException;
use Symfony\Component\DomCrawler\Crawler;

class PriceParser implements PriceParserInterface
{
    private $url;

    /**
     * @var ApiRequestInterface
     */
    private $apiHelper;

    public function __construct(ApiRequestInterface $apiHelper)
    {
        $this->apiHelper = $apiHelper;
    }

    public function getByUrl()
    {
        $response = $this->apiHelper->sendApiRequest($this->url)->getBody()->getContents();

        $crawler = new Crawler($response);

        $priceNode = $crawler->filter('div.price-per-measure-container span.js-price-tag');

        if($priceNode->count() > 0) {
           return $priceNode->attr('data-price-raw');
        }

        throw new RuntimeException(sprintf('Can\'t found price by url:%s', $this->url));
    }

    public function setUrl(string $url)
    {
        $this->url = $url;
    }
}
