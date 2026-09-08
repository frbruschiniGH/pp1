<?php

namespace App\DataFixtures;

use App\Entity\Usuario;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UsuarioFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        for ($i = 1; $i <= 5; $i++) {
            $usuario = new Usuario();
            $usuario->setNombre('Usuario'.$i);
            $usuario->setEmail('usuario'.$i.'gmail.com');
            $usuario->setPassword('$2y$13$m63OaJ3c38u7dxsVJnKEa.WHIk80/q4nf/4nZSs9f6XE9lskUqZIa');

            $manager->persist($usuario);
        }


        $manager->flush();
    }
}
