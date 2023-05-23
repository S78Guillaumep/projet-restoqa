<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/profil', name: 'profil_')]
class ProfilController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('profil/index.html.twig', [
            'controller_name' => 'Profil de l\'utilisateur',
        ]);
    }

    #[Route('/reservationpasse', name: 'reservationpasse')]
    public function reservationpasse(): Response
    {
        return $this->render('profil/index.html.twig', [
            'controller_name' => 'Réservations passées de l\'utilisateur',
        ]);
    }
}
