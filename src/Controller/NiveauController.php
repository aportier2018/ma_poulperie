<?php

namespace App\Controller;

use App\Entity\Niveau;
use App\Form\NiveauType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NiveauController extends AbstractController
{
    /* -----------------LISTE DES NIVEAUX  */        
    /**
     * @Route("/jeu/admin/niveau", name="jeuAdminNiveau")
     */
    public function niveau()
    {
        $repo = $this->getDoctrine()->getRepository(Niveau::class);

        $niveaux = $repo->findAll();

        return $this->render('jeuAdmin/jeuAdminNiveau.html.twig', [
            'controller_name' => 'NiveauController',
            'niveaux' => $niveaux
        ]);
    }

     /* -----------------AJOUTER UN NOUVEAU NIVEAU ET EDITER DES NIVEAUX POUR LES MODIFIER  */        


    /**
        * @Route("/jeu/admin/niveau/new", name ="jeuAdminNiveauNew")
        * @Route("/jeu/admin/niveau/{id}/edit", name ="jeuAdminNiveauEdit")
        */
       public function formJeu(Niveau $niveau = null, Request $request, ObjectManager $manager)
        {
            if(!$niveau){
            $niveau = new Niveau();
            }

            $form = $this->createForm(NiveauType::class, $niveau);

            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()){
                $manager->persist($niveau);
                $manager->flush();

                return $this->redirectToRoute('jeuAdminNiveau');

            }

            return $this->render('jeuAdmin/jeuAdminNiveauNew.html.twig', [
                'controller_name' => 'NiveauController',
                'formNiveau' => $form->createView(),
                'editMode' => $niveau->getId() !==null
            ]);
        }

        /* -----------------SUPPRIMER UN NIVEAU  */ 
        /** 
    *
    * @Route("/jeu/admin/niveau/{id}/delete", name="jeuAdminNiveauDelete")
    *
    * @param Niveau $niveau
    * @param ObjectManager $manager
    * 
    * @return Response
    */
    public function niveauDelete(Niveau $niveau, ObjectManager $manager)
    {
        $manager->remove($niveau);
        $manager->flush();

        $this->addFlash(
            'success',
            "Le niveau <strong>{$niveau->getNiveau()}</strong> a été supprimé !"
        );
        
        return $this->RedirectToRoute('jeuAdminNiveau');
    }
}
