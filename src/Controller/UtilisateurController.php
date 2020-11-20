<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\InscriptionType;

class UtilisateurController extends AbstractController
{
    /**
     * @Route("/inscription", name="inscription")
     */
    public function index(): Response
    {
        $form = $this->createForm(InscriptionType::class);
        return $this->render('utilisateur/inscription.html.twig', [
            'controller_name' => 'UtilisateurController',
            'form'=>$form->createView()

        ]);
    }
}
