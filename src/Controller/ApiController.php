<?php
/**
 * @author    Arthur Patsanovskiy <arthur2050@mail.ru>
 * @copyright Copyright (c) 2024, Darvin Digital
 * @link      https://darvindigital.ru/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Controller;

use App\Parser\PriceParserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    const MAIN_ROUTE_PATTERN = '/fr/tile/%s/%s/a/%s';

    /**
     * @var PriceParserInterface
     */
    private $priceParser;

    public function __construct(PriceParserInterface $priceParser)
    {
        $this->priceParser  = $priceParser;
    }

    /**
     * @Route("/api/1/{factory}/{collection}/{article}", methods={"GET"}, name="api_main_route")
     *
     * @return JsonResponse
     */
    public function getByMainRoute($factory, $collection, $article)
    {
        $mainRoute = sprintf(self::MAIN_ROUTE_PATTERN, $factory, $collection, $article);
        $this->priceParser->setUrl($mainRoute);

        $parsedPrice = $this->priceParser->getByUrl();

        return new JsonResponse([
            'factory'    => $factory,
            'collection' => $collection,
            'article'    => $article,
            'price'      => $parsedPrice
        ]);
    }
}
