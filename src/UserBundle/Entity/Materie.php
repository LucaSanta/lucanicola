<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use UserBundle\Entity\User;


/**
 * Materie
 *
 * @ORM\Table(name="materie")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\MaterieRepository")
 */
class Materie
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

     public function __construct()
    {
        $this->id = new ArrayCollection();
    }

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255, nullable=true)
     */
    private $nome;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nome
     *
     * @param string $nome
     *
     * @return Materie
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }


}

