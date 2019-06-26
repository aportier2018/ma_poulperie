<?php

namespace App\Controller;

use App\Entity\Duree;
use App\Form\DureeType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DureeController extends AbstractController
{
    /**
     * @Route("/jeu/admin/duree", name="jeuAdminDuree")
     */
    public function duree()
    {
        $repo = $this->getDoctrine()->getRepository(Duree::class);

        $durees = $repo->findAll();

        return $this->render('jeuAdmin/jeuAdminDuree.html.twig', [
            'controller_name' => 'DureeController',
            'durees' => $durees
        ]);
    }

     /* -----------------AJOUTER UN NOUVEAU JEU ET EDITER DES JEUX POUR LES MODIFIER  */        


    /**
        * @Route("/jeu/admin/duree/new", name ="jeuAdminDureeNew")
        * @Route("/jeu/admin/duree/{id}/edit", name ="jeuAdminDureeEdit")
        */
       public function formJeu(Duree $duree = null, Request $request, ObjectManager $manager)
        {
            if(!$duree){
            $duree = new Duree();
            }

            $form = $this->createForm(DureeType::class, $duree);

            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()){
                $manager->persist($duree);
                $manager->flush();

                return $this->redirectToRoute('jeuAdminDuree');

            }

            return $this->render('jeuAdmin/jeuAdminDureeNew.html.twig', [
                'controller_name' => 'DureeController',
                'formDuree' => $form->createView(),
                'editMode' => $duree->getId() !==null,
            ]);
        }
}
