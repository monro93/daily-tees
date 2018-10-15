<?php
/**
 * Created by PhpStorm.
 * User: albert
 * Date: 15/10/18
 * Time: 20:25
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @return Response
     */
    public function indexAction()
    {
        return new Response("Hello world");
    }
}