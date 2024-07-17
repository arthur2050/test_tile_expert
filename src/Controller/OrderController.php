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


use App\Entity\Order;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class OrderController extends AbstractController
{
    private $em;

    private $serializer;

    /**
     * @var PaginatorInterface
     */
    private $paginator;

    public function __construct(EntityManagerInterface $em,
                                SerializerInterface $serializer,
                                PaginatorInterface $paginator)
    {
        $this->em = $em;
        $this->serializer = $serializer;
        $this->paginator  = $paginator;
    }

    /**
     * @Route("/orders", name="orders_list", methods={"GET"})
     */
    public function index(Request $request): Response
    {
        $page = $request->query->getInt('page', 1); // Номер страницы
        $perPage = $request->query->getInt('perPage', 10); // Количество на странице

        $groupBy = $request->query->get('groupBy');

        $query = $this->em->getRepository(Order::class)->findForPagination($groupBy);

        $pagination = $this->paginator->paginate(
            $query,
            $page,
            $perPage
        );
        if($request->isXmlHttpRequest()) {
            $orders = $pagination->getItems();
            $data = $this->serializer->serialize([
                'items' => $orders,
                'pagination' => [
                    'current_page' => $pagination->getCurrentPageNumber(),
                    'total_pages' => ceil($pagination->getTotalItemCount() / $pagination->getItemNumberPerPage()),
                    'total_items' => $pagination->getTotalItemCount(),
                ]], 'json');

            return new Response($data, Response::HTTP_OK, ['Content-Type' => 'application/json']);
        }

        return $this->render('order/list.html.twig',[
            'pagination' => $pagination,
        ]);
    }

    /**
     * @Route("/order/{id}", name="order_show", methods={"GET"})
     */
    public function show($id): Response
    {
        $order = $this->em->getRepository(Order::class)->find($id);

        if (!$order) {
            return new Response('Order not found', Response::HTTP_NOT_FOUND);
        }

        $data = $this->serializer->serialize($order, 'json');

        return new Response($data, Response::HTTP_OK, ['Content-Type' => 'application/json']);
    }
}
