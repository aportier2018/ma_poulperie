<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(
*       fields = {"email"},
*       message = "Cette adresse mail est dèjà utilisée ! Merci de la modifier."
 *     )
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Veuillez renseigner le nom de famille")
     */
    private $userNom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Veuillez renseigner le prénom")
     */
    private $userPrenom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email(message="Veuillez renseigner un email valide")
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *          min = 8,
     *          minMessage = "Votre mot de passe doit avoir au minimum 8 caractères ")
     */
    private $hash;

    /**
     * @Assert\EqualTo(
     *          propertyPath="hash",
     *          message="Les 2 mots de passe ne sont pas identiques!"
     * )
     *
     */
    public $confirmHash;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Role", mappedBy="users")
     */
    private $userRoles;

    public function __construct()
    {
        $this->userRoles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserNom(): ?string
    {
        return $this->userNom;
    }

    public function setUserNom(string $userNom): self
    {
        $this->userNom = $userNom;

        return $this;
    }

    public function getUserPrenom(): ?string
    {
        return $this->userPrenom;
    }

    public function setUserPrenom(string $userPrenom): self
    {
        $this->userPrenom = $userPrenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getHash(): ?string
    {
        return $this->hash;
    }

    public function setHash(string $hash): self
    {
        $this->hash = $hash;

        return $this;
    }

    public function getRoles(){

        $roles = $this->userRoles->map(
            function($role){
            return $role->getTitle();
            }
        )->toArray();

        $roles[]='ROLE_USER';

        return $roles;
    }

    public function getPassword(){
        return $this->hash;
    }

    public function getsalt(){}

    public function getUsername(){
        return $this->email;
    }

    public function eraseCredentials(){}

    /**
     * @return Collection|Role[]
     */
    public function getUserRoles(): Collection
    {
        return $this->userRoles;
    }

    public function addUserRole(Role $userRole): self
    {
        if (!$this->userRoles->contains($userRole)) {
            $this->userRoles[] = $userRole;
            $userRole->addUser($this);
        }

        return $this;
    }

    public function removeUserRole(Role $userRole): self
    {
        if ($this->userRoles->contains($userRole)) {
            $this->userRoles->removeElement($userRole);
            $userRole->removeUser($this);
        }

        return $this;
    }


}
