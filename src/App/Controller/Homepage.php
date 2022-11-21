<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityRepository;
use Framework\Doctrine\EntityManager;
use Framework\Response\Response;

class Homepage
{
  public function __invoke()
  {
        $em = EntityManager::getInstance();

        /*$user = new User();
        $user
            ->setFirstName('Boris')
            ->setLastName('CERATI')
            ->setEmail('cerati.boris@gmail.com');

        $em->persist($user);
        $em->flush();*/

        /** @var UserRepository$userRepository */
      $userRepository = $em->getRepository(User::class);
      // $users = $userRepository->findAll();
      $user = $userRepository->findOneByEmail('cerati.boris@gmail.com');
      echo '<pre>';
      print_r($user);die;
      return new Response('home.html.twig');
  }
}
