<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Abonnement;
use App\Form\AjoutAbonnementType;
use App\Form\ModifAbonnementType;

class AbonnementController extends AbstractController
{
    /**
     * @Route("/abonnement", name="abonnement")
     */
    public function abonnement(Request $request): Response
    {
        $em = $this->getDoctrine();
        $repoAbonnement = $em->getRepository(Abonnement::class);
        if ($request->get('supp') != null) {
            $abonnement = $repoAbonnement->find($request->get('supp'));
            if ($abonnement != null) {
                $em->getManager()->remove($abonnement);
                $em->getManager()->flush();
            }
            return $this->redirectToRoute('abonnement');
        }
        $abonnements = $repoAbonnement->findBy(array(), array('type' => 'ASC'));
        return $this->render('abonnement/abonnements.html.twig', [
            'abonnements' => $abonnements 
        ]);
    }

    /**
     * @Route("/ajout_abonnement", name="ajout_abonnement")
     */
    public function ajoutAbonnement(Request $request)
    {
        $abonnement = new Abonnement(); 
        $form = $this->createForm(AjoutAbonnementType::class, $abonnement);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {


                $em = $this->getDoctrine()->getManager();

                $em->persist($abonnement); 
                $em->flush(); 
                $this->addFlash('notice', 'Abonnement inséré'); 

            }
            return $this->redirectToRoute('ajout_abonnement');
        }
        return $this->render('abonnement/ajoutAbonnement.html.twig', [
            'form' => $form->createView() 
        ]);
    }

    /**
     * @Route("/modif_abonnement/{id}", name="modif_abonnement", requirements={"id"="\d+"})
     */
    public function modifAbonnement(int $id, Request $request)
    {
        $em = $this->getDoctrine();
        $repoAbonnement = $em->getRepository(Abonnement::class);
        $abonnement = $repoAbonnement->find($id);
        if ($abonnement == null) {
            $this->addFlash('notice', "Cet Abonnement n'existe pas");
            return $this->redirectToRoute('abonnement');
        }
        $form = $this->createForm(ModifAbonnementType::class, $abonnement);
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($abonnement);
                $em->flush();
                $this->addFlash('notice', 'Abonnement modifié');
            }
            return $this->redirectToRoute('abonnement');
        }
        return $this->render('abonnement/modifAbonnement.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
