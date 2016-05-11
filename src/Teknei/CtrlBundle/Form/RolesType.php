<?php

namespace Teknei\CtrlBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class RolesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombre',null,array('label' => 'Rol'));
            
            $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
            	$rol = $event->getData();
            	$form = $event->getForm();
            
            	if (!$rol || null === $rol->getIdroles()) {
            		$form ->add( 'idesta', EntityType::class, array(
							    'class' => 'TekneiCtrlBundle:Cata',
            					'choice_label'  =>  'desComp' ,
							    'query_builder' => function (EntityRepository $er) {
							        return $er->createQueryBuilder('u')
							             ->where('u.idcata = 1');
							    }, 
							) );
            	}
            	else {
            		$form ->add( 'idesta' , EntityType :: class , array (
            				'class' => 'TekneiCtrlBundle:Cata' ,
            				'choice_label'  =>  'desComp' ,
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
            'data_class' => 'Teknei\CtrlBundle\Entity\Roles'
        ));
    }
}
