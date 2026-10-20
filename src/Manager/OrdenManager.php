<?php
//src/Manager/OrdenManager.php
namespace App\Manager;

use App\Entity\Orden;
use App\Entity\Usuario;
use App\Repository\ProductoRepository;
use App\Repository\OrdenRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;


class OrdenManager 
{
    private EntityManagerInterface $em;
    private ProductoRepository $productoRepository;
    private OrdenRepository $ordenRepository;

    public function __construct (EntityManagerInterface $em, ProductoRepository $productoRepository, OrdenRepository $ordenRepository)
    {
        $this->em = $em;
        $this->productoRepository = $productoRepository;
        $this->ordenRepository = $ordenRepository;
    }


    public function agregarProducto(Usuario $usuario, int $idProducto, int $cantidad) : void
    {
        $orden = $this->obtenerOrden($usuario);    
    
        $producto = $this->productoRepository->find($idProducto);

        $item= $orden->agregarItem($producto,$cantidad);

        $this->em->persist($item);
        $this->em->persist($orden);
        $this->em->flush();
    }

    public function obtenerOrden(Usuario $usuario) : Orden
    {
        $orden = $this->ordenRepository->findOneBy(['usuario'=>$usuario,'estado'=>'Iniciada']);

        if(!$orden)
        {
            $orden = new Orden();
            $orden->setEstado('Iniciada');
            $orden->setIniciada(new Datetime());
            $orden->setUsuario($usuario);
        }

        return $orden;
    }
}