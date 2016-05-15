<?php

namespace UserBundle\Form\Type;

use UserBundle\Entity\User;
use UserBundle\Entity\Provincia;
use UserBundle\Entity\Materie;

use UserBundle\Entity\citta;

use UserBundle\Entity\Agenda;

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


class UserFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome', TextType::class, array('label' => false))
            ->add('cognome', TextType::class, array('label' => false))
            ->add('eta', IntegerType::class, array('label' => false))
            ->add('livelloScolastico', TextType::class, array('label' => false))
            ->add('infoPersonali', TextType::class, array('label' => false))
            ->add('prezzo', IntegerType::class, array('label' => false))
            ->add('formazione', TextType::class, array('label' => false), array('label' => false))
            ->add('imageFile', VichImageType::class,array('label' => false))
                        ->add('idCitta', EntityType::class, array(
              'class'=>'UserBundle:citta',
              'query_builder' => function (EntityRepository $er) {
                  return $er->createQueryBuilder('c')->orderBy('c.nome', 'ASC');
                } ) )
            ->add('save', SubmitType::class)

        ;
    }
}



