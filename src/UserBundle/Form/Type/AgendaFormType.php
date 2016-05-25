<?php
namespace UserBundle\Form\Type;
use UserBundle\Entity\User;
use UserBundle\Entity\Provincia;
use UserBundle\Entity\Materie;
use UserBundle\Entity\citta;
use UserBundle\Entity\Agende;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Doctrine\ORM\EntityRepository;
class AgendaFormType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
		->add('lunediInizio', IntegerType::class)
		->add('lunediFine', IntegerType::class)
		->add('martediInizio', IntegerType::class)
		->add('martediFine', IntegerType::class)
		->add('mercolediInizio', IntegerType::class)
		->add('mercolediFine', IntegerType::class)
		->add('giovediInizio', IntegerType::class)
		->add('giovediFine', IntegerType::class)
		->add('venerdiInizio', IntegerType::class)
		->add('venerdiFine', IntegerType::class)
		->add('sabatoInizio', IntegerType::class)
		->add('sabatoFine', IntegerType::class)
		->add('domenicaInizio', IntegerType::class)
		->add('domenicaFine', IntegerType::class)
		->add('user', IntegerType::class)

		->add('save', SubmitType::class)
		;
	}
}
