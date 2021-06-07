<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\AjoutThemeType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Theme;
use App\Form\ModifThemeType;
use App\Repository\ThemeRepository;
use App\Entity\Vocabulaire;


class ThemeController extends AbstractController
{
    /**
     * @Route("/theme", name="theme")
     */
    public function theme(ThemeRepository $themeRepository, Request $request): Response
    {
        $em = $this->getDoctrine();
        $repoTheme = $em->getRepository(Theme::class);
        
        if ($request->get('supp') != null) {
            $theme = $repoTheme->find($request->get('supp'));
            if ($theme != null) {
                $em->getManager()->remove($theme);
                $em->getManager()->flush();
            }
            return $this->redirectToRoute('theme');
        }
        $themes = $repoTheme->findBy(array(), array('libelle' => 'ASC'));
        return $this->render('theme/themes.html.twig', [
            'themes' => $themes
            , "vocasParTheme" => $themeRepository->nbVocaParTheme()
           
        ]);
    }

    /**
     * @Route("/statistiques", name="statistiques")
     */
    public function statsTheme(ThemeRepository $themeRepository, Request $request): Response
    {
        $em = $this->getDoctrine();
        $repoTheme = $em->getRepository(Theme::class);
        
        if ($request->get('supp') != null) {
            $theme = $repoTheme->find($request->get('supp'));
            if ($theme != null) {
                $em->getManager()->remove($theme);
                $em->getManager()->flush();
            }
            return $this->redirectToRoute('theme');
        }
        $themes = $repoTheme->findBy(array(), array('libelle' => 'ASC'));
        return $this->render('statistiques/statistiques.html.twig', [
            'themes' => $themes 
            , "vocasParTheme" => $themeRepository->nbVocaParTheme()
           
        ]);
    }


    /**
     * @Route("/ajout_theme", name="ajout_theme")
     */
    public function ajoutTheme(Request $request)
    {
        $theme = new Theme(); // Instanciation d’un objet Theme
        $form = $this->createForm(AjoutThemeType::class, $theme);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {


                $em = $this->getDoctrine()->getManager();

                $em->persist($theme); // Nous enregistrons notre nouveau thème
                $em->flush(); // Nous validons notre ajout
                $this->addFlash('notice', 'Thème inséré'); // Nous préparons le message à

            }
            return $this->redirectToRoute('ajout_theme');
        }
        return $this->render('theme/ajoutTheme.html.twig', [
            'form' => $form->createView() // Nous passons le formulaire à la vue
        ]);
    }

    /**
     * @Route("/modif_theme/{id}", name="modif_theme", requirements={"id"="\d+"})
     */
    public function modifTheme(int $id, Request $request)
    {
        $em = $this->getDoctrine();
        $repoTheme = $em->getRepository(Theme::class);
        $theme = $repoTheme->find($id);
        if ($theme == null) {
            $this->addFlash('notice', "Ce thème n'existe pas");
            return $this->redirectToRoute('theme');
        }
        $form = $this->createForm(ModifThemeType::class, $theme);
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($theme);
                $em->flush();
                $this->addFlash('notice', 'Thème modifié');
            }
            return $this->redirectToRoute('theme');
        }
        return $this->render('theme/modifTheme.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
