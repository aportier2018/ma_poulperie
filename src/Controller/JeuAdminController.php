<?php

namespace App\Controller;

use App\Entity\Jeu;
use App\Form\JeuType;

use Doctrine\Common\Persistence\ObjectManager;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class JeuAdminController extends AbstractController
{
    /**
     * @Route("/jeu/admin/list", name="jeuAdminList")
     */
    public function jeuAdminList()
    {
        $repo = $this->getDoctrine()->getRepository(Jeu::class);

        $jeux = $repo->findAll();

        return $this->render('jeuAdmin/jeuAdminList.html.twig', [
            'controller_name' => 'JeuAdminController',
            'jeux' => $jeux
        ]);

    }

     /* -----------------AJOUTER UN NOUVEAU JEU ET EDITER DES JEUX POUR LES MODIFIER  */        


    /**
        * @Route("/jeu/admin/new", name ="jeuAdminNew")
        * @Route("/jeu/admin/{id}/edit", name ="jeuAdminEdit")
        */
       public function formJeu(Jeu $jeu = null, Request $request, ObjectManager $manager)
        {
            if(!$jeu){
            $jeu = new Jeu();
            }

            $form = $this->createForm(JeuType::class, $jeu);

            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()){
                $manager->persist($jeu);
                $manager->flush();

                return $this->redirectToRoute('jeuAdminList');

            }

            return $this->render('jeuAdmin/jeuAdminNew.html.twig', [
                'controller_name' => 'JeuController',
                'formJeu' => $form->createView(),
                'editMode' => $jeu->getId() !==null
            ]);
        }



         /* ----------------SUPPRIMER UN JEU                      */      
    /** 
    *
    * @Route("/jeu/admin/{id}/delete", name="jeuAdminDelete")
    *
    * @param Jeu $jeu
    * @param ObjectManager $manager
    * 
    * @return Response
    */
    public function jeuDelete(Jeu $jeu, ObjectManager $manager)
    {
        $manager->remove($jeu);
        $manager->flush();

        $this->addFlash(
            'success',
            "Le jeu <strong>{$jeu->getNom()}</strong> a été supprimé !"
        );
        
        return $this->RedirectToRoute('jeuAdminList');
    }


}
