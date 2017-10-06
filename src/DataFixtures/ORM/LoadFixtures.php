<?php
namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Category;
use AppBundle\Entity\User;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Provider\DateTime;
use Nelmio\Alice\Loader\NativeLoader;

class LoadFixtures extends Fixture
{
    public function cat(ObjectManager $manager)
    {
        for ($i = 0; $i<10; $i++) {
            $category = new Category();
            $category->setName('Octopus' . rand(1, 100));
            $category->setDescription('Octopodinae');
            $category->setCreatedAt(new \DateTime());
            $manager->persist($category);
            $manager->flush();
        }
    }

    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i<10; $i++) {
            $user = new User();
            $user->setEmail('mail-' . rand(1, 100) . '@gmail.com');
            $user->setPlainPassword('123');
            $user->setRoles(['ROLE_ADMIN']);
            $manager->persist($user);
            $manager->flush();
        }

//        $loader = new NativeLoader();
//
//        $objectSet = $loader->loadData([
//            User::class => [
//                'user{1..10}' => [
//                    'email' => '<email()>',
//                ],
//            ]]);
    }

//    public function load(ObjectManager $manager)
//    {
//        $loader = new NativeLoader();
//        $objects = $loader->loadFile(__DIR__.'/fixtures.yml');
//    }
}