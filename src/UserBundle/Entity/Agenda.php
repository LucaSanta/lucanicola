<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Agenda
 *
 * @ORM\Table(name="agenda")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\AgendaRepository")
 */
class Agenda
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="giorno", type="string", length=255, nullable=true)
     */
    private $giorno;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ora_inizio", type="time", nullable=true)
     */
    private $oraInizio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ora_fine", type="time", nullable=true)
     */
    private $oraFine;


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
     * Set giorno
     *
     * @param string $giorno
     *
     * @return Agenda
     */
    public function setGiorno($giorno)
    {
        $this->giorno = $giorno;

        return $this;
    }

    /**
     * Get giorno
     *
     * @return string
     */
    public function getGiorno()
    {
        return $this->giorno;
    }

    /**
     * Set oraInizio
     *
     * @param \DateTime $oraInizio
     *
     * @return Agenda
     */
    public function setOraInizio($oraInizio)
    {
        $this->oraInizio = $oraInizio;

        return $this;
    }

    /**
     * Get oraInizio
     *
     * @return \DateTime
     */
    public function getOraInizio()
    {
        return $this->oraInizio;
    }

    /**
     * Set oraFine
     *
     * @param \DateTime $oraFine
     *
     * @return Agenda
     */
    public function setOraFine($oraFine)
    {
        $this->oraFine = $oraFine;

        return $this;
    }

    /**
     * Get oraFine
     *
     * @return \DateTime
     */
    public function getOraFine()
    {
        return $this->oraFine;
    }
}

