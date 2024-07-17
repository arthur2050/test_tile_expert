<?php
/**
 * @author    Arthur Patsanovskiy <arthur2050@mail.ru>
 * @copyright Copyright (c) 2024, Darvin Digital
 * @link      https://darvindigital.ru/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Handler;


use App\Entity\Model\MainRouteParameters;
use App\Event\RedirectEvent;
use App\Form\Type\MainRouteFormType;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;

class MainRouteFormHandler implements FormHandlerInterface
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    public function __construct(FormFactoryInterface $formFactory,
                                EventDispatcherInterface $eventDispatcher)
    {
        $this->formFactory  = $formFactory;
        $this->eventDispatcher = $eventDispatcher;
    }

    public function handle(Request $request)
    {
        $mainRouteParameters = new MainRouteParameters();
        $formMainRoute = $this->formFactory->create(MainRouteFormType::class, $mainRouteParameters);
        $formMainRoute->handleRequest($request);


        if($formMainRoute->isSubmitted() && $formMainRoute->isValid()) { //если всё хорошо редиректим на api
            $event = new RedirectEvent('api_main_route',  [
                'factory'    => $mainRouteParameters->getFactory(),
                'collection' => $mainRouteParameters->getCollection(),
                'article'    => $mainRouteParameters->getArticle(),
            ]);
            $this->eventDispatcher->dispatch($event);
        }

        return $formMainRoute;
    }
}
