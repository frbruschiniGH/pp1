<?php
// src/Controller/ProductoController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Manager\ProductoManager;

class ProductoController extends AbstractController
{
    #[Route('/', name: 'listar_productos')]
public function listarProductos(ProductoManager $manager): Response
{

 $productos = $manager->getProductos(); 
 return $this->render('producto/lista.html.twig', [ 'productos' => $productos ]);
}


    #[Route('/producto/{id}', name: 'detalle_producto')]
public function detallePedido(ProductoManager $manager, int $id): Response
{

 $producto = $manager->getProducto($id); 
 return $this->render('producto/detalle.html.twig', [ 'producto' => $producto ]);
}

}



