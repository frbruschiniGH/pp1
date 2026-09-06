<?php
// src/Controller/ProductoController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductoController extends AbstractController
{
    #[Route('/', name: 'listar_productos')]
public function listarProductos(ProductoRepository $repository): Response
{

 $productos = $repository->findAll(); 
 return $this->render('producto/lista.html.twig', $productos);
}

}
