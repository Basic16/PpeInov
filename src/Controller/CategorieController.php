<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Categorie;
use App\Entity\Vocabulaire;
use App\Form\AjoutCategorieType;
use App\Form\ModifCategorieType;
use App\Repository\VocabulaireRepository;

class CategorieController extends AbstractController
{
    /**
     * @Route("/categorie", name="categorie")
     */
    public function categorie(VocabulaireRepository $vocabulaireRepository,Request $request): Response
    {
        $em = $this->getDoctrine();
        $repoCategorie = $em->getRepository(Categorie::class);
        
        
        
        if ($request->get('supp') != null) {
            $categorie = $repoCategorie->find($request->get('supp'));
            if ($categorie != null) {
                $em->getManager()->remove($categorie);
                $em->getManager()->flush();
            }
            return $this->redirectToRoute('categorie');
        }
        $themes = $repoCategorie->findBy(array(), array('libelle' => 'ASC'));
        return $this->render('categorie/categories.html.twig', [
            'categories' => $themes
            , "vocaParTheme" => $vocabulaireRepository->nombreVocaParTheme()
        ]);
    }

    /**
     * @Route("/ajout_categorie", name="ajout_categorie")
     */
    public function ajoutCategorie(Request $request)
    {
        $categorie = new Categorie(); // Instanciation d’un objet 
        $form = $this->createForm(AjoutCategorieType::class, $categorie);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {


                $em = $this->getDoctrine()->getManager();

                $em->persist($categorie); 
                $em->flush(); // Nous validons notre ajout
                $this->addFlash('notice', 'catégorie insérée'); 

            }
            return $this->redirectToRoute('ajout_categorie');
        }
        return $this->render('categorie/ajoutCategorie.html.twig', [
            'form' => $form->createView() // Nous passons le formulaire à la vue
        ]);
    }

    /**
     * @Route("/modif_categorie/{id}", name="modif_categorie", requirements={"id"="\d+"})
     */
    public function modifCategorie(int $id, Request $request)
    {
        $em = $this->getDoctrine();
        $repoCategorie = $em->getRepository(Categorie::class);
        $categorie = $repoCategorie->find($id);
        if ($categorie == null) {
            $this->addFlash('notice', "Cette catégorie n'existe pas");
            return $this->redirectToRoute('categorie');
        }
        $form = $this->createForm(ModifCategorieType::class, $categorie);
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($categorie);
                $em->flush();
                $this->addFlash('notice', 'Catégorie modifiée');
            }
            return $this->redirectToRoute('categorie');
        }
        return $this->render('categorie/modifCategorie.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
