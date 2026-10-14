<?php
//src/Manager/OrdenManager.php
namespace App\Manager;

use App\Entity\Orden;
use App\Entity\Usuario;
use App\Repository\ProductoRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;


class OrdenManager 
{
    private EntityManagerInterface $em;
    private ProductoRepository $productoRepository;

    public function __construct (EntityManagerInterface $em, ProductoRepository $productoRepository)
    {
        $this->em = $em;
        $this->productoRepository = $productoRepository;
    }


    public function agregarProducto(Usuario $usuario, int $idProducto, int $cantidad) : void
    {
        $orden = new Orden();
        $orden->setEstado('Iniciada');
        $orden->setIniciada(new Datetime());
        $orden->setUsuario($usuario);

        $producto = $this->productoRepository->find($idProducto);

        $item= $orden->agregarItem($producto,$cantidad);

        $this->em->persist($item);
        $this->em->persist($orden);
        $this->em->flush();
    }
}