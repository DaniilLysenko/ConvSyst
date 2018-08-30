<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(
 *     fields={"email"},
 *     message="This email already in used"
 * )
 * @UniqueEntity(
 *     fields={"username"},
 *     message="This username already in used"
 * )
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
     * @ORM\Column(type="string", length=100)
     * @Assert\Length(min = 5,max = 100, minMessage="Username should be more than {{ limit }} characters")
     * @Assert\NotBlank(message="Username can not be blank")
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email(message = "The email is not valid")
     * @Assert\NotBlank(message="Email can not be blank")
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=10)
     * @Assert\Choice({"man", "woman"}, message="Choice valid sex type")
     * @Assert\NotBlank(message="Sex type can not be blank")
     */
    private $sex;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min = 5,max = 20, minMessage="Password should be more than {{ limit }} characters")
     * @Assert\NotBlank(message="Password can not be blank")
     */
    private $password;

    /**
     * @ORM\Column(type="array")
     */
    private $roles;

    public function __construct()
    {
        $this->roles = array('ROLE_USER');
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

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

    public function getSex(): ?string
    {
        return $this->sex;
    }

    public function setSex(string $sex): self
    {
        $this->sex = $sex;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getRoles(): ?array
    {
        return $this->roles;
    }

    public function setRoles($role): ?string
    {
        $this->roles[] = $role;

        return $this;
    }

    public function getSalt()
    {
        return null;
    }

    public function eraseCredentials()
    {

    }
}
