<?php
// src/Controller/OrdenController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Manager\OrdenManager;

class OrdenController extends AbstractController
{
    #[Route('/orden/agregar', name: 'agregar_producto')]
public function agregarProducto(Request $request, OrdenManager $manager): Response
{
    $idProducto = (int) $request->request->get('idProducto'); // $_POST['idProducto']
    $cantidad = (int) $request->request->get('cantidad'); // $_POST['cantidad']

    $usuario = $this->getUser();

    $manager->agregarProducto($usuario, $idProducto, $cantidad);

    $this->addFlash(
        'confirmacionProductoAgregado',
        'Se ingreso a la orden '.$cantidad.' unidades del producto '. $idProducto.', donde '.$cantidad.'
        es la cantidad enviada como parametro y '.$idProducto.' es el id de producto'
    );

    return $this->redirectToRoute('listar_productos');

}

}