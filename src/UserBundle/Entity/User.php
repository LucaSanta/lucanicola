<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use FOS\UserBundle\Model\User as BaseUser;



/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255, nullable=true)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="cognome", type="string", length=255, nullable=true)
     */
    private $cognome;

    /**
     * @var int
     *
     * @ORM\Column(name="eta", type="integer", nullable=true)
     */
    private $eta;

    /**
     * @var string
     *
     * @ORM\Column(name="livello_scolastico", type="string", length=255, nullable=true)
     */
    private $livelloScolastico;

    /**
     * @var string
     *
     * @ORM\Column(name="info_personali", type="string", length=255, nullable=true)
     */
    private $infoPersonali;

        /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="citta")
     * @ORM\JoinColumn(name="id_citta", referencedColumnName="id")
     */
    private $idCitta;

    /**
     * @var string
     *
     * @ORM\Column(name="formazione", type="string", length=255, nullable=true)
     */
    private $formazione;


        /**
     * @var int
     *
      * @ORM\Column(name="prezzo", type="integer", nullable=true)
     */
    private $prezzo;

        /**
     * @var string
     *
     * @ORM\Column(name="immagine", type="text", nullable=true)
     */
    private $immagine;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="sala_image", fileNameProperty="immagine")
     *
     * @var File
     */
    private $imageFile;



        /**
    * @ORM\ManyToMany(targetEntity="Materie")
    * @ORM\JoinTable(name="user_materie",
    *   joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
    *   inverseJoinColumns={@ORM\JoinColumn(name="materie_id", referencedColumnName="id")}
    *   )
    */
    private $materie;


        /**
     * @ORM\OneToMany(targetEntity="Agenda", mappedBy="utente")
     */
    private $agenda;

    public function __construct()
    {
        parent::__construct();
        $this->agenda = new ArrayCollection();
        $this->gusti= new ArrayCollection();

    }


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
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     *
     * @return User
     */
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        return $this;
    }
    /**
     * @return File
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

          /**
       * Set immagine
       *
       * @param string $immagine
       *
       * @return User
       */
      public function setImmagine($immagine)
      {
          $this->immagine = $immagine;

          return $this;
      }

      /**
       * Get immagine
       *
       * @return string
       */
      public function getImmagine()
      {
          return $this->immagine;
      }


    /**
     * Set nome
     *
     * @param string $nome
     *
     * @return User
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

    /**
     * Set cognome
     *
     * @param string $cognome
     *
     * @return User
     */
    public function setCognome($cognome)
    {
        $this->cognome = $cognome;

        return $this;
    }

    /**
     * Get cognome
     *
     * @return string
     */
    public function getCognome()
    {
        return $this->cognome;
    }



    /**
     * Set eta
     *
     * @param integer $eta
     *
     * @return User
     */
    public function setEta($eta)
    {
        $this->eta = $eta;

        return $this;
    }

    /**
     * Get eta
     *
     * @return int
     */
    public function getEta()
    {
        return $this->eta;
    }





    /**
     * Set eta
     *
     * @param integer $prezzo
     *
     * @return User
     */
    public function setPrezzo($prezzo)
    {
        $this->prezzo = $prezzo;

        return $this;
    }

    /**
     * Get prezzo
     *
     * @return int
     */
    public function getPrezzo()
    {
        return $this->prezzo;
    }

    /**
     * Set livelloScolastico
     *
     * @param string $livelloScolastico
     *
     * @return User
     */
    public function setLivelloScolastico($livelloScolastico)
    {
        $this->livelloScolastico = $livelloScolastico;

        return $this;
    }

    /**
     * Get livelloScolastico
     *
     * @return string
     */
    public function getLivelloScolastico()
    {
        return $this->livelloScolastico;
    }

    /**
     * Set infoPersonali
     *
     * @param string $infoPersonali
     *
     * @return User
     */
    public function setInfoPersonali($infoPersonali)
    {
        $this->infoPersonali = $infoPersonali;

        return $this;
    }

    /**
     * Get infoPersonali
     *
     * @return string
     */
    public function getInfoPersonali()
    {
        return $this->infoPersonali;
    }

    /**
     * Set formazione
     *
     * @param string $formazione
     *
     * @return User
     */
    public function setFormazione($formazione)
    {
        $this->formazione = $formazione;

        return $this;
    }

    /**
     * Get formazione
     *
     * @return string
     */
    public function getFormazione()
    {
        return $this->formazione;
    }
     /**
     * Set idCitta
     *
     * @param integer $idCitta
     *
     * @return Gelateria
     */
    public function setIdCitta($idCitta)
    {
        $this->idCitta = $idCitta;

        return $this;
    }

    /**
     * Get idCitta
     *
     * @return int
     */
    public function getIdCitta()
    {
        return $this->idCitta;
    }



         public function setAgenda($agenda)
    {
        $this->agenda = $agenda;

        return $this;
    }

    /**
     * Get social
     *
     * @return string
     */
    public function getAgenda()
    {
        return $this->agenda;
    }

}

