<?php

namespace App\DataFixtures;

use App\Entity\Jeu;
use App\Entity\Role;
use App\Entity\User;
use App\Entity\Duree;

use App\Entity\Niveau;
use Doctrine\Bundle\FixturesBundle\Fixture;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class JeuFixtures extends Fixture
{
    private $encoder;
    public function __construct(UserPasswordEncoderInterface $encoder){
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');
        // gestion des roles

        $adminRole = new Role();
        $adminRole->setTitle('ROLE_ADMIN');
        $manager->persist($adminRole);

        $adminUser = new User();
        $adminUser->setUserNom('Portier')
                  ->setUserPrenom('Anne')
                  ->setEmail('anne@portier.fr')
                  ->setHash($this->encoder->encodePassword($adminUser, 'password'))
                  ->addUserRole($adminRole);
        $manager->persist($adminUser);
        
        

        //gestion des utilisateurs
        $users = [];
        for($i = 1; $i < 5; $i++){
            $user = new User();
            $hash = $this->encoder->encodePassword($user, 'password');
            $user->setUserNom($faker ->firstname)
                 ->setUserPrenom($faker->lastname)
                 ->setEmail($faker->email)
                 ->setHash($hash);

        $manager->persist($user);
        $users[] = $user; 
        }
        
        // gestion des jeux
        for($j = 1; $j < 3; $j++){
            $duree = new Duree();
            $duree->setDuree($faker->word())
                    ->setDescription($faker->sentence());

            $manager->persist($duree);

            for($k = 1; $k < 4; $k++){
                $niveau = new Niveau();
                $niveau->setNiveau($faker->word())
                        ->setDescription($faker->sentence());
                        
                $manager->persist($niveau);
    
                for($i = 1; $i < 6; $i++ ){
                    $jeu = new Jeu();
                    $jeu->setNom($faker->word())
                        ->setJaquette($faker->imageUrl($width = 100, $height = 100))
                        ->setCritere($faker->sentence())
                        ->setResume($faker->text())
                        ->setAgemin(mt_rand(7, 18))
                        ->setAgemax(mt_rand(10, 77))
                        ->setRegle($faker->paragraph(2))
                        ->setNbjoueurmin(mt_rand(1, 4))
                        ->setNbjoueurmax(mt_rand(1, 4))
                        ->setDuree($duree)
                        ->setNiveau($niveau);
    
                    $manager->persist($jeu);
    
                }
            } 
        }

        $manager->flush();
    } 
}
