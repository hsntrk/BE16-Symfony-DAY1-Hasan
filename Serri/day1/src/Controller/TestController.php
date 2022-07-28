<?php

namespace App\Controller;

use stdClass;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/', name: 'app_root')]
    public function index(): Response
    {
        $obj = new stdClass();
        $obj->name = "Serri";
        $obj->age = 32;

        // dd($obj);
        $random = rand(0, 100);
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
            "name" => "Serri",
            "obj" => $obj,
            "random" => $random
        ]);
    }

    #[Route('/first', name: 'app_test')]
    public function firstFunc(): Response
    {
        return new Response("Hello, i come from the firstFunc");
    }

    #[Route('/first/info/{name}&{lname}', name: 'app_name')]
    public function printYourName($name, $lname)
    {
        return $this->render("test/info.html.twig", [
            "name" => $name,
            "lname" => $lname
        ]);
    }
}