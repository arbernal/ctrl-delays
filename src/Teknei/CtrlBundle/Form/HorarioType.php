<?php

namespace Teknei\CtrlBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;

class HorarioType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dia') 
            ->add('hora')
            
        ;
    $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
            	$horario = $event->getData();
            	$form = $event->getForm();
            
            	if (!$horario || null === $horario->getIdhorario()) {
            		$form ->add( 'idesta', EntityType::class, array(
            				'class' => 'TekneiCtrlBundle:Cata',
            				'choice_label'  =>  'descComp' ,
            				'query_builder' => function (EntityRepository $er) {
            				return $er->createQueryBuilder('u')
            				->where('u.descComp = \'ACTIVO\' ');
            				}, 'label' => 'Estatus',
            				) );
            	}
            else {
            		$form ->add( 'idesta' , EntityType :: class , array (
            				'class' => 'TekneiCtrlBundle:Cata' ,
            				'choice_label'  =>  'descComp' ,
            				'query_builder' => function (EntityRepository $er) {
            				return $er->createQueryBuilder('u')
            				->where('u.descCort = \'ES_CA\' ');
            				}, 'label' => 'Estatus',
            		));
            	}
            }); 
            
            }
    
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Teknei\CtrlBundle\Entity\Horario'
        ));
    }
}
