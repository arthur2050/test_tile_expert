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


use App\Entity\Model\OrderShowParameters;
use App\Event\RedirectEvent;
use App\Form\Type\OrderShowFormType;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;

class OrderShowFormHandler implements FormHandlerInterface
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
        $orderShowParameters = new OrderShowParameters();
        $formOrderShow = $this->formFactory->create(OrderShowFormType::class, $orderShowParameters);
        $formOrderShow->handleRequest($request);

        if($formOrderShow->isSubmitted() && $formOrderShow->isValid()) {
            $event = new RedirectEvent('order_show',  [
               'id' => $orderShowParameters->getId()
            ]);
            $this->eventDispatcher->dispatch($event);
        }

        return $formOrderShow;
    }
}
