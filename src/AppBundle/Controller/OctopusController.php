<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 08.09.17
 * Time: 21:50
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OctopusController extends Controller
{
    /**
     * @Route("octopus/{name}")
     */
    public function helloAction($name){
        return $this->render('octopus/hello.html.twig',['name' => $name]);
    }

    public function testAction($test)
    {
        return new Response('test');
    }

}