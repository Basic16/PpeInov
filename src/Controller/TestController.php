<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\TestType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Test;
use App\Form\ModifTestType;
use App\Repository\TestRepository;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function index(Request $request): Response
    {
        $test = new Test();
        $form = $this->createForm(TestType::class, $test);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {


                $em = $this->getDoctrine()->getManager();

                $em->persist($test); // Nous enregistrons notre nouveau thème
                $em->flush(); // Nous validons notre ajout
                $this->addFlash('notice', 'Test inséré'); // Nous préparons le message à

            }
            return $this->redirectToRoute('test');
        }
        
        return $this->render('test/index.html.twig', [
            
            'form' => $form->createView() // Nous passons le formulaire à la vue
        ]);
    }
    /**
     * @Route("/liste-test", name="liste-test")
     */
    public function listetest(TestRepository $testRepository, Request $request )
    {
        $em = $this->getDoctrine();
        $repoTest = $em->getRepository(Test::class);
        if ($request->get('supp') != null) {
            $test = $repoTest->find($request->get('supp'));
            if ($test != null) {
                $em->getManager()->remove($test);
                $em->getManager()->flush();
            }
            return $this->redirectToRoute('liste-test');
        }
        $test = $repoTest->findBy(array(), array('libelle' => 'ASC'));
        return $this->render('test/liste-test.html.twig', [
            'test' => $test,
            "nombreTestPasse"=> $testRepository->nombreTestPasse()
        ]);
    }
    /**
     * @Route("/modif-test/{id}", name="modif-test", requirements={"id"="\d+"})
     */
    public function modifTest(int $id, Request $request)
    {
        $em = $this->getDoctrine();
        $repoTest = $em->getRepository(Test::class);
        $test = $repoTest->find($id);
        if ($test == null) {
            $this->addFlash('notice', "Ce test n'existe pas");
            return $this->redirectToRoute('test');
        }
        $form = $this->createForm(ModifTestType::class, $test);
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($test);
                $em->flush();
                $this->addFlash('notice', 'Test modifié');
            }
            return $this->redirectToRoute('liste-test');
        }
        return $this->render('test/modif-test.html.twig', [
            'form' => $form->createView()
        ]);
    }
    /**
     * @Route("/exercice", name="exercice")
     */
    public function exercice(Request $request): Response
    {
        return $this->render('test/exercice.html.twig', [
               
        ]);
    }
    
}
