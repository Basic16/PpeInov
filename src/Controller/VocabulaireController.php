<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\AjoutVocabulaireType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Vocabulaire;
use App\Form\ModifVocabulaireType;


class VocabulaireController extends AbstractController
{
    /**
     * @Route("/vocabulaire", name="vocabulaire")
     */
    public function index(Request $request): Response
    {   
        $vocabulaire = new Vocabulaire();
        $form = $this->createForm(AjoutVocabulaireType::class, $vocabulaire);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {


                $em = $this->getDoctrine()->getManager();

                $em->persist($vocabulaire); 
                $em->flush(); 
                $this->addFlash('notice', 'Vocabulaire inséré'); 

            }
            return $this->redirectToRoute('vocabulaire');
        }
        
        return $this->render('vocabulaire/index.html.twig', [
            'controller_name' => 'VocabulaireController',
            'form'=>$form->createView()
        ]);
    }
    /**
     * @Route("/liste-vocabulaire", name="liste-vocabulaire")
     */
    public function listeVocabulaire(Request $request)
    {
        $em = $this->getDoctrine();
        $repoVocabulaire = $em->getRepository(Vocabulaire::class);
        if ($request->get('supp') != null) {
            $vocabulaire = $repoVocabulaire->find($request->get('supp'));
            if ($vocabulaire != null) {
                $em->getManager()->remove($vocabulaire);
                $em->getManager()->flush();
            }
            return $this->redirectToRoute('liste-vocabulaire');
        }
        $vocabulaire = $repoVocabulaire->findBy(array(), array('libelle' => 'ASC'));
        return $this->render('vocabulaire/liste-vocabulaire.html.twig', [
            'vocabulaire' => $vocabulaire
        ]);
    }
    /**
     * @Route("/modif-vocabulaire/{id}", name="modif-vocabulaire", requirements={"id"="\d+"})
     */
    public function modifVocabulaire(int $id, Request $request)
    {
        $em = $this->getDoctrine();
        $repoVocabulaire = $em->getRepository(Vocabulaire::class);
        $vocabulaire = $repoVocabulaire->find($id);
        if ($vocabulaire == null) {
            $this->addFlash('notice', "Ce vocabulaire n'existe pas");
            return $this->redirectToRoute('liste-vocabulaire');
        }
        $form = $this->createForm(ModifVocabulaireType::class, $vocabulaire);
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($vocabulaire);
                $em->flush();
                $this->addFlash('notice', 'Vocabulaire modifié');
            }
            return $this->redirectToRoute('liste-test');
        }
        return $this->render('vocabulaire/modif-vocabulaire.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
