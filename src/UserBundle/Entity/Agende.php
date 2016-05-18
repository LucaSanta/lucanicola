<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use UserBundle\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use FOS\UserBundle\Model\User as BaseUser;

/**
* Agende
*
* @ORM\Table(name="agende")
* @ORM\Entity(repositoryClass="UserBundle\Repository\AgendeRepository")
*/
class Agende
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
 * @var int
 *
 * @ORM\Column(name="lunediInizio", type="integer", nullable=true)
 */
private $lunediInizio;

/**
 * @var int
 *
 * @ORM\Column(name="lunediFine", type="integer", nullable=true)
 */
private $lunediFine;

/**
 * @var int
 *
 * @ORM\Column(name="martediInizio", type="integer", nullable=true)
 */
private $martediInizio;

/**
 * @var int
 *
 * @ORM\Column(name="martediFine", type="integer", nullable=true)
 */
private $martediFine;

/**
 * @var int
 *
 * @ORM\Column(name="mercolediInizio", type="integer", nullable=true)
 */
private $mercolediInizio;

/**
 * @var int
 *
 * @ORM\Column(name="mercolediFine", type="integer", nullable=true)
 */
private $mercolediFine;

/**
 * @var int
 *
 * @ORM\Column(name="giovediInizio", type="integer", nullable=true)
 */
private $giovediInizio;

/**
 * @var int
 *
 * @ORM\Column(name="giovediFine", type="integer", nullable=true)
 */
private $giovediFine;

/**
 * @var int
 *
 * @ORM\Column(name="venerdiInizio", type="integer", nullable=true)
 */
private $venerdiInizio;

/**
 * @var int
 *
 * @ORM\Column(name="venerdiFine", type="integer", nullable=true)
 */
private $venerdiFine;

/**
 * @var int
 *
 * @ORM\Column(name="sabatoInizio", type="integer", nullable=true)
 */
private $sabatoInizio;

/**
 * @var int
 *
 * @ORM\Column(name="sabatoFine", type="integer", nullable=true)
 */
private $sabatoFine;

/**
 * @var int
 *
 * @ORM\Column(name="domenicaInizio", type="integer", nullable=true)
 */
private $domenicaInizio;

/**
 * @var int
 *
 * @ORM\Column(name="domenicaFine", type="integer", nullable=true)
 */
private $domenicaFine;


/**
* @var int
* @ORM\OneToOne(targetEntity="User", inversedBy="agende")
* @ORM\JoinColumn(name="user_id", referencedColumnName="id")
*/
private $user;


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
 * Set lunediInizio
 *
 * @param integer $lunediInizio
 *
 * @return Agende
 */
public function setLunediInizio($lunediInizio)
{
    $this->lunediInizio = $lunediInizio;

    return $this;
}

/**
 * Get lunediInizio
 *
 * @return int
 */
public function getLunediInizio()
{
    return $this->lunediInizio;
}

/**
 * Set lunediFine
 *
 * @param integer $lunediFine
 *
 * @return Agende
 */
public function setLunediFine($lunediFine)
{
    $this->lunediFine = $lunediFine;

    return $this;
}

/**
 * Get lunediFine
 *
 * @return int
 */
public function getLunediFine()
{
    return $this->lunediFine;
}

/**
 * Set martediInizio
 *
 * @param integer $martediInizio
 *
 * @return Agende
 */
public function setMartediInizio($martediInizio)
{
    $this->martediInizio = $martediInizio;

    return $this;
}

/**
 * Get martediInizio
 *
 * @return int
 */
public function getMartediInizio()
{
    return $this->martediInizio;
}

/**
 * Set martediFine
 *
 * @param integer $martediFine
 *
 * @return Agende
 */
public function setMartediFine($martediFine)
{
    $this->martediFine = $martediFine;

    return $this;
}

/**
 * Get martediFine
 *
 * @return int
 */
public function getMartediFine()
{
    return $this->martediFine;
}

/**
 * Set mercolediInizio
 *
 * @param integer $mercolediInizio
 *
 * @return Agende
 */
public function setMercolediInizio($mercolediInizio)
{
    $this->mercolediInizio = $mercolediInizio;

    return $this;
}

/**
 * Get mercolediInizio
 *
 * @return int
 */
public function getMercolediInizio()
{
    return $this->mercolediInizio;
}

/**
 * Set mercolediFine
 *
 * @param integer $mercolediFine
 *
 * @return Agende
 */
public function setMercolediFine($mercolediFine)
{
    $this->mercolediFine = $mercolediFine;

    return $this;
}

/**
 * Get mercolediFine
 *
 * @return int
 */
public function getMercolediFine()
{
    return $this->mercolediFine;
}

/**
 * Set giovediInizio
 *
 * @param integer $giovediInizio
 *
 * @return Agende
 */
public function setGiovediInizio($giovediInizio)
{
    $this->giovediInizio = $giovediInizio;

    return $this;
}

/**
 * Get giovediInizio
 *
 * @return int
 */
public function getGiovediInizio()
{
    return $this->giovediInizio;
}

/**
 * Set giovediFine
 *
 * @param integer $giovediFine
 *
 * @return Agende
 */
public function setGiovediFine($giovediFine)
{
    $this->giovediFine = $giovediFine;

    return $this;
}

/**
 * Get giovediFine
 *
 * @return int
 */
public function getGiovediFine()
{
    return $this->giovediFine;
}

/**
 * Set venerdiInizio
 *
 * @param integer $venerdiInizio
 *
 * @return Agende
 */
public function setVenerdiInizio($venerdiInizio)
{
    $this->venerdiInizio = $venerdiInizio;

    return $this;
}

/**
 * Get venerdiInizio
 *
 * @return int
 */
public function getVenerdiInizio()
{
    return $this->venerdiInizio;
}

/**
 * Set venerdiFine
 *
 * @param integer $venerdiFine
 *
 * @return Agende
 */
public function setVenerdiFine($venerdiFine)
{
    $this->venerdiFine = $venerdiFine;

    return $this;
}

/**
 * Get venerdiFine
 *
 * @return int
 */
public function getVenerdiFine()
{
    return $this->venerdiFine;
}

/**
 * Set sabatoInizio
 *
 * @param integer $sabatoInizio
 *
 * @return Agende
 */
public function setSabatoInizio($sabatoInizio)
{
    $this->sabatoInizio = $sabatoInizio;

    return $this;
}

/**
 * Get sabatoInizio
 *
 * @return int
 */
public function getSabatoInizio()
{
    return $this->sabatoInizio;
}

/**
 * Set sabatoFine
 *
 * @param integer $sabatoFine
 *
 * @return Agende
 */
public function setSabatoFine($sabatoFine)
{
    $this->sabatoFine = $sabatoFine;

    return $this;
}

/**
 * Get sabatoFine
 *
 * @return int
 */
public function getSabatoFine()
{
    return $this->sabatoFine;
}

/**
 * Set domenicaInizio
 *
 * @param integer $domenicaInizio
 *
 * @return Agende
 */
public function setDomenicaInizio($domenicaInizio)
{
    $this->domenicaInizio = $domenicaInizio;

    return $this;
}

/**
 * Get domenicaInizio
 *
 * @return int
 */
public function getDomenicaInizio()
{
    return $this->domenicaInizio;
}

/**
 * Set domenicaFine
 *
 * @param integer $domenicaFine
 *
 * @return Agende
 */
public function setDomenicaFine($domenicaFine)
{
    $this->domenicaFine = $domenicaFine;

    return $this;
}

/**
 * Get domenicaFine
 *
 * @return int
 */
public function getDomenicaFine()
{
    return $this->domenicaFine;
}

/**
 * Set utente
 *
 * @param integer $utente
 *
 * @return Agende
 */
public function setUtente($utente)
{
    $this->utenteutente = $utente;

    return $this;
}

/**
 * Get utente
 *
 * @return int
 */
public function getUtente()
{
    return $this->utente;
}
}

