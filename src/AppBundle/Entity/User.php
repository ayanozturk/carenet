<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity()
 * @ORM\Table(name="users", uniqueConstraints={@ORM\UniqueConstraint(name="email_idx", columns={"email"})})
 */
class User implements UserInterface
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @var int
     */
    protected $id;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     * @var string
     */
    protected $first_name;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     * @var string
     */
    protected $last_name;

    /**
     * @Assert\NotBlank()
     * @Assert\Email()
     * @ORM\Column(type="string")
     * @var string
     */
    protected $email;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     * @var string
     */
    protected $password;


    /**
     * @ORM\ManyToMany(targetEntity="Skill")
     * @var ArrayCollection|Skill[]
     */
    protected $skills;

    /**
     * @ORM\ManyToMany(targetEntity="Role")
     * @var Role[]|ArrayCollection
     */
    protected $user_roles = [];

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    protected $created;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    protected $updated;

    public function __construct()
    {
        $this->updated = new \DateTime();
        $this->user_roles = new ArrayCollection();
        $this->skills = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return User
     */
    public function setId($id): User
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param string $first_name
     * @return User
     */
    public function setFirstName(string $first_name): User
    {
        $this->first_name = $first_name;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param string $last_name
     * @return User
     */
    public function setLastName(string $last_name): User
    {
        $this->last_name = $last_name;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail(string $email): User
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return User
     */
    public function setPassword(string $password): User
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return Role[]|ArrayCollection
     */
    public function getUserRoles()
    {
        return $this->user_roles;
    }

    /**
     * @param Role[]|ArrayCollection $user_roles
     * @return User
     */
    public function setUserRoles($user_roles): User
    {
        $this->user_roles = $user_roles;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreated(): \DateTime
    {
        return $this->created;
    }

    /**
     * @param \DateTime $created
     * @return User
     */
    public function setCreated(\DateTime $created): User
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdated(): \DateTime
    {
        return $this->updated;
    }

    /**
     * @param \DateTime $updated
     * @return User
     */
    public function setUpdated(\DateTime $updated): User
    {
        $this->updated = $updated;
        return $this;
    }

    /**
     * Returns the roles granted to the user.
     *
     * <code>
     * public function getRoles()
     * {
     *     return array('ROLE_USER');
     * }
     * </code>
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return (Role|string)[] The user roles
     */
    public function getRoles()
    {
        return ['ROLE_USER'];
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        return $this->getEmail();
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        $this->password = null;
    }

    public function addSkill(Skill $skill): User
    {
        $this->skills->add($skill);

        return $this;
    }

    public function removeSkill(Skill $skill): User
    {
        $this->skills->removeElement($skill);

        return $this;
    }

    /**
     * @return ArrayCollection|Skill[]
     */
    public function getSkills()
    {
        return $this->skills;
    }
}
