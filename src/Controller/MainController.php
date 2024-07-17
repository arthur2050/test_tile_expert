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

use App\Handler\FormHandlerInterface;
use App\Handler\MainRouteFormHandler;
use App\Handler\OrderListFormHandler;
use App\Handler\OrderShowFormHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class MainController
 * @package App\Controller
 */
class MainController extends AbstractController
{
    /**
     * @var FormHandlerInterface
     */
    private $formMainRouteHandler;

    /**
     * @var FormHandlerInterface
     */
    private $formOrderShowHandler;

    /**
     * @var FormHandlerInterface
     */
    private $formOrderListHandler;

    public function __construct(MainRouteFormHandler $formMainRouteHandler,
                                OrderShowFormHandler $formOrderShowHandler,
                                OrderListFormHandler $formOrderListHandler)
    {
        $this->formMainRouteHandler = $formMainRouteHandler;
        $this->formOrderShowHandler = $formOrderShowHandler;
        $this->formOrderListHandler = $formOrderListHandler;
    }

    /**
     * @Route("/main", methods={"GET"})
     */
    public function main(Request $request)
    {

        $formMainRoute = $this->formMainRouteHandler->handle($request);
        $formOrderShow = $this->formOrderShowHandler->handle($request);
        $formOrderList = $this->formOrderListHandler->handle($request);

        return $this->render('index.html.twig', [
            'form_main_route' => $formMainRoute->createView(),
            'form_order_show' => $formOrderShow->createView(),
            'form_order_list' => $formOrderList->createView()
        ]);
    }
}
