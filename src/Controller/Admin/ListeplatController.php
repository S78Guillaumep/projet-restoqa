<?php

namespace App\Controller\Admin;

use App\Entity\Plat;
use App\Form\PlatFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/plat', name: 'admin_plat')]
class ListeplatController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('admin/platliste/index.html.twig');
    }

    #[Route('/ajout', name: 'add')]
    public function add(Request $request, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        //On crée un "nouveau plat"
        $plat = new Plat();

        //On crée le formulaire associé
        $platForm = $this->createForm(PlatFormType::class, $plat);

        //On traite la requête de ce formulaire
        $platForm->handleRequest($request);

        if ($platForm->isSubmitted() && $platForm->isValid()) {
            //si soumis et valide
            $em->persist($plat);
            $em->flush();

            $this->addFlash('success', 'Nouveau Plat ajouté à la liste');
        

            return $this->redirectToRoute('admin_plat');
        }
        return $this->renderForm('admin/platliste/add.html.twig', 
        compact('platForm'));
    }

    #[Route('/edition/{id}', name: 'edit')]
    public function edit(Plat $plat): Response
    {
        // On vérifie que l'utilisateur peut éditer grâce au voter
        $this->denyAccessUnlessGranted('PLAT_EDIT', $plat);

        return $this->render('admin/platliste/index.html.twig');
    }

    #[Route('/suppression/{id}', name: 'delete')]
    public function delete(Plat $plat): Response
    {
        // On vérifie que l'utilisateur peut supprimer grâce au voter
        $this->denyAccessUnlessGranted('PLAT_DELETE', $plat);

        return $this->render('admin/platliste/index.html.twig');
    }
}
