<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\InscriptionType;

use Symfony\Component\HttpFoundation\Request;
use App\Entity\Utilisateur;
use App\Entity\User;
use App\Form\ModifUserType;

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
        $repoUtilisateur = $em->getRepository(User::class);
        if ($request->get('supp') != null) {
            $utilisateur = $repoUtilisateur->find($request->get('supp'));
            if ($utilisateur != null) {
                $em->getManager()->remove($utilisateur);
                $em->getManager()->flush();
            }
            return $this->redirectToRoute('listeutilisateurs');
        }
            
            
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
        $repoUtilisateur = $em->getRepository(User::class);
        $utilisateur =  $repoUtilisateur->find($id);
        if($utilisateur==null){
            $this->addFlash('notice', "Cet utilisateur");
            return $this->redirectToRoute('listeutilisateurs');
                }
        $form = $this->createForm(ModifUserType::class,$utilisateur);


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
