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


use App\Entity\Model\OrderListParameters;
use App\Event\RedirectEvent;
use App\Form\Type\OrderListFormType;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;

class OrderListFormHandler implements FormHandlerInterface
{    /**
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
        $orderListParameters = new OrderListParameters();
        $formOrderList = $this->formFactory->create(OrderListFormType::class, $orderListParameters);
        $formOrderList->handleRequest($request);

        if($formOrderList->isSubmitted() && $formOrderList->isValid()) {
            $event = new RedirectEvent('orders_list',  [
                'groupBy' => $orderListParameters->getGroupBy()
            ]);
            $this->eventDispatcher->dispatch($event);
        }

        return $formOrderList;
    }
}
