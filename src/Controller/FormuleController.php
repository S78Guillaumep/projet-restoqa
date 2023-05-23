<?php

namespace App\Controller;

use App\Repository\FormuleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class FormuleController extends AbstractController
{
    #[Route('/formule', name: 'formule')]
    public function index(FormuleRepository $formuleRepository): Response
    {
        
        return $this->render('formule/index.html.twig', [
            'formule' => $formuleRepository -> findAll()
        ]);
    }
}
