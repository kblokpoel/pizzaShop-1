<?php

namespace App\DataFixtures;

use App\Entity\Products;
use App\Entity\Category;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PizzaFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $array = ['vlees', 'vega', 'vis'];
        $categories = [];
        for ($j=0; $j < 3; $j++) {
            $category = new Category();
            $category->setName($array[$j]);
            $category->setDescription('Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis, ipsa.');
            array_push($categories, $category);
            $manager->persist($category);
            for ($i=0; $i < 6; $i++) {
                $pizza = new Products();
                $pizza->setName('products'.$i);
                $pizza->setDescription('Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis, ipsa.');
                $pizza->setPrice(1);
                foreach ($categories as $category) {
                    $pizza->setCategory($category);
                }
                $manager->persist($pizza);
            }
        }
//        $user = new User();
//        $user->setUsername('admin');
//        $user->setPassword('qwerty');
//        $user->setRoles(['ROLE_ADMIN','ROLE_USER']);
//        $manager->persist($user);
        $manager->flush();
    }
}
