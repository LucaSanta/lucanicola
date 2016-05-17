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
            ->add('nome', TextType::class)
            ->add('cognome', TextType::class)
            ->add('eta', IntegerType::class)
            ->add('livelloScolastico', TextType::class)
            ->add('infoPersonali', TextType::class)
            ->add('prezzo', IntegerType::class)
            ->add('formazione', TextType::class)
            ->add('imageFile', VichImageType::class)
            ->add('idCitta', EntityType::class, array(
              'class'=>'UserBundle:citta',
              'query_builder' => function (EntityRepository $er) {
               return $er->createQueryBuilder('c')->orderBy('c.nome', 'ASC');
                } ) )
             ->add('materie', EntityType::class, array(
              'class'=>'UserBundle:Materie',
              'choice_label'=>'nome',
              'multiple'=>true,
              'expanded'=>true))
            ->add('save', SubmitType::class)

        ;
    }
}



