<?php
//src/Manager/ProductoManager.php
namespace App\Manager;

use App\Repository\ProductoRepository;

class ProductoManager 
{
    private ProductoRepository $repository;

    public function __construct (ProductoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getProductos(): array
    {
        return $this->repository->findAll();
    }

    public function getProducto($id)
    {
        return $this->repository->find($id);
    }

}