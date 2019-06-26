<?php

namespace App\Controller;

use App\Entity\Jeu;
use App\Form\JeuType;

use Doctrine\Common\Persistence\ObjectManager;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class JeuController extends AbstractController
{

    /* ------------------AFFICHER LA LISTE DE TOUS LES JEUX   */

    /**
     * @Route("/jeuUser/jeuUserList", name="jeuUserList")
     */
    public function jeuUserList()
    {
        $repo = $this->getDoctrine()->getRepository(Jeu::class);

        $jeux = $repo->findAll();

        return $this->render('jeuUser/jeuUserList.html.twig', [
            'controller_name' => 'JeuController',
            'jeux' => $jeux
        ]);
    }


   

/* ---------------------AFFICHER LA DESCRIPTION D'UN JEU   */       

       /**
        * @Route("/jeuUser/jeuUserList/{id}", name="jeuUserDescription")
        */
       public function jeuUserDescription($id)
       {
           $repo = $this -> getDoctrine() -> getRepository(Jeu::class);
           $jeu = $repo -> find($id);
    
           return $this->render('jeuUser/jeuUserDescription.html.twig', [
               'controller_name' => 'JeuController',
               'jeu' => $jeu
           ]);
       }
   }
    

