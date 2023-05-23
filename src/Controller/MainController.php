<?php

namespace App\Controller;

use App\Entity\Menu;
use App\Entity\Carte;
use App\Repository\CarteRepository;
use App\Repository\MenuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'main_carte')]
    #[Route('/menu', name: 'main_menu')]
    public function index (CarteRepository $carteRepository , MenuRepository $menuRepository): Response
    {
        $cartes = $carteRepository->findBy([],['carteordre' => 'asc']);
        $menus = $menuRepository->findBy([],['menuordre' => 'asc']);

        return $this->render('main/index.html.twig', [
            'carte' => $cartes,
            'menu' => $menus
        ]);
    }
    
}
