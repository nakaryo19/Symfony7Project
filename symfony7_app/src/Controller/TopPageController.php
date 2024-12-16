<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TopPageController extends AbstractController
{
    #[Route('/topPage', name: 'app_top_page')]
    public function index(): Response
    {
        return $this->render('top_page/index.html.twig', [
            'controller_name' => 'TopPageController',
        ]);
    }
}
