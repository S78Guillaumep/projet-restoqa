<?php

namespace App\Controller;

use App\Repository\PlatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class PlatController extends AbstractController
{
    #[Route('/plat', name: 'plat')]
    public function index(PlatRepository $platRepository): Response
    {
        
        return $this->render('plat/index.html.twig', [
            'plat' => $platRepository -> findBy([], 
            ['type' => 'asc'])
        ]);
    }
}
