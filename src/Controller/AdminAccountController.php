<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AdminAccountController extends AbstractController
{
    /**
     * @Route("jeu/admin/login", name="admin_login")
     */
    public function admin_login(AuthenticationUtils $utils)
    {
        $error = $utils->getLastAuthenticationError();
        $userEmail = $utils->getLastUserName();

        return $this->render('admin_account/admin_login.html.twig', [
            'controller_name' => 'AdminAccountController',
            'hasError' => $error !== null,
            'userEmail' => $userEmail,
        ]);

    }


     /**
     * route de déconnection à l'administration
     * 
     * @Route ("jeu/admin/logout", name="admin_logout")
     * 
     * @return void
     */
    public function admin_logout(){
        //...
    }
}
