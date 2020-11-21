<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\InscriptionType;
use App\Form\ModifUtilisateurType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Utilisateur;

class UtilisateurController extends AbstractController
{
    /**
     * @Route("/inscription", name="inscription")
     */
    public function index(Request $request): Response
    {
        $utilisateur = new Utilisateur();
        $form = $this->createForm(InscriptionType::class,$utilisateur);
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                
                $em = $this->getDoctrine()->getManager(); 
                $utilisateur->setdateinscription(new \DateTime());
                $em->persist($utilisateur); 
                $em->flush(); 
                 $this->addFlash('notice', 'Inscriprion réussi'); 
            }
                return $this->redirectToRoute('inscription'); 
            } 

        return $this->render('utilisateur/inscription.html.twig', [
            'controller_name' => 'UtilisateurController',
            'form'=>$form->createView()

        ]);
    }
    /**
     * @Route("/listeutilisateurs", name="listeutilisateurs")
     */
    public function listeutilisateurs(Request $request): Response
    {   
        $em = $this->getDoctrine();
        $repoUtilisateur = $em->getRepository(Utilisateur::class);
            
            
        $utilisateur = $repoUtilisateur->findBy(array(), array('nom' => 'ASC','prenom' => 'ASC'));
        
        return $this->render('utilisateur/listeutilisateurs.html.twig', [
        'utilisateurs' => $utilisateur // Nous passons la liste des utilisateurs à la vue
        ]);
    }
    /**
     * @Route("/modifutilisateur/{id}", name="modifutilisateur", requirements={"id"="\d+"})
     */
    public function modifutilisateur(int $id,Request $request): Response
    {   
        $em = $this->getDoctrine();
        $repoUtilisateur = $em->getRepository(Utilisateur::class);
        $utilisateur =  $repoUtilisateur->find($id);
        if($utilisateur==null){
            $this->addFlash('notice', "Cet utilisateur");
            return $this->redirectToRoute('listeutilisateurs');
                }
        $form = $this->createForm(ModifUtilisateurType::class,$utilisateur);


        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($utilisateur);
                $em->flush();  
                $this->addFlash('notice', 'utilisateur modifié');} 
            return $this->redirectToRoute('listeutilisateurs'); 
                }   
        
        return $this->render('utilisateur/modifutilisateur.html.twig', [
            'form'=>$form->createView()
        ]);
    }
}
