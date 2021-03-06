<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 08.09.17
 * Time: 21:50
 */

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OctopusController extends Controller
{
    /**
     * @Route("octopus/{name}")
     * @param $name
     * @Security("is_granted('ROLE_USER')")
     * @return Response
     */
    public function helloAction($name)
    {
        $this->addFlash(
            'success',
            sprintf('Genus created by you: %s!', $this->getUser()->getEmail())
        );
        return $this->render('octopus/hello.html.twig', ['name' => $name]);
    }

    /**
     * @param $test
     * @return Response
     */
    public function testAction($test)
    {
        return new Response('test');
    }

    /**
     * @Route("create-user")
     */
    public function createUserAction()
    {
        $em = $this->getDoctrine()->getManager();

        $user = new User();
        $user->setEmail('mai112l@mail.ru');
        $user->setPlainPassword('123');

        $em->persist($user);
        $em->flush();

        return $this->render('octopus/hello.html.twig', ['name' => 'create user']);
    }
}
