<?php
/**
 * @author    Arthur Patsanovskiy <arthur2050@mail.ru>
 * @copyright Copyright (c) 2024, Darvin Digital
 * @link      https://darvindigital.ru/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\EventSubscriber;


use App\Event\RedirectEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class RedirectSubscriber implements EventSubscriberInterface
{
    private $urlGenerator;

    public function __construct(UrlGeneratorInterface $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    public static function getSubscribedEvents()
    {
        return [
            RedirectEvent::class => 'onRedirect',
        ];
    }

    public function onRedirect(RedirectEvent $event)
    {
        $routeName = $event->getRouteName();
        $routeParams = $event->getRouteParams();

        $url = $this->urlGenerator->generate($routeName, $routeParams);

        $response = new RedirectResponse($url);
        $response->send();
        exit;
    }
}
