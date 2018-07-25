<?php

namespace League\FactoryMuffin\Test;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="users")
 */
class User
{
    /**
     * @Id @Column(type="integer")
     * @GeneratedValue
     */
    private $id;
    /**
     * @Column(length=140)
     */
    private $name;

    /**
     * @Column(type="boolean")
     */
    private $gender;

    /**
     * @Column(length=140)
     */
    private $email;

    /**
     * @OneToMany(targetEntity="League\FactoryMuffin\Test\Cat", mappedBy="user", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $cats;

    public function __construct()
    {
        $this->cats = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getCats()
    {
        return $this->cats;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}
