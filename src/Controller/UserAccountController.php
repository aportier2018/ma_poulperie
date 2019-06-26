<?php

namespace App\Controller;

use App\Entity\User;

use App\Form\InscriptionType;

use Doctrine\Common\Persistence\ObjectManager;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserAccountController extends AbstractController
{
    /**
    * Permet d'afficher et de gérer le formulaire de connexion del'utilisateur

     * @Route("/jeu/user/login", name="user_login")
     *
     * @return Response
     */
    public function user_login(AuthenticationUtils $utils)
    {
        $error = $utils->getLastAuthenticationError();
        $userEmail = $utils->getLastUserName();

        return $this->render('user_account/user_login.html.twig', [
            'controller_name' => 'UserAccountController',
            'hasError' => $error !== null,
            'userEmail' => $userEmail,
        ]);
    }


    /**
     * Permet à l'utilisateur de se déconnecter
     *
     * @Route("/jeu/user/logout", name="user_logout")
     *
     * @return void
     */
    public function user_logout()
    {
        //...Rien  //
    }

    /**
     *Permet à un utilisateur de s'inscrire  
     *
     * @Route("jeu/user/inscription", name="user_inscription" )
     *
     * @return Response 
     */

     public function user_inscription(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder){
            $user = new User();

            $form = $this->createForm(InscriptionType::class, $user);

            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()){
                $hash = $encoder->encodePassword($user, $user->getHash());
                $user->setHash($hash);

                $manager->persist($user);
                $manager->flush();

                $this->addFlash(
                    'success',
                    "votre compte a été créé. Vous pouvez vous connecter !"
                );

                return $this->redirectToRoute('user_login');
            }

            return $this->render('user_account/user_inscription.html.twig', [
                'formInscription' =>$form->createView()
            ]);

     }


}
