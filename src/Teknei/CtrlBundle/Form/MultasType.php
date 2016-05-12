<?php

namespace Teknei\CtrlBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;

class MultasType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tiemTran', null,array('label' => 'TIEMPO TRASCURRIDO'))
            ->add('subtotal', null,array('label' => 'SUBTOTAL'))
            ->add('total', null,array('label' => 'TOTAL'))
            ->add('idrecaDesc', null,array('label' => 'RECARGo/DESCUENTO'))
            ->add('idestapago',null,array('label' => 'ESTATUS DE PAGO'))
            ->add('idesta', null,array('label' => 'ESTATUS'));
        
            $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
            	$multas = $event->getData();
            	$form = $event->getForm();
            
            	if (!$multas || null === $multas->getIdmultas()) {
            		$form ->add( 'idesta', EntityType::class, array(
            				'class' => 'TekneiCtrlBundle:Cata',
            				'choice_label'  =>  'descComp' ,
            				'query_builder' => function (EntityRepository $er) {
            				return $er->createQueryBuilder('u')
            				->where('u.descComp = \'ACTIVO\' ');
            				}, 'label' => 'ESTATUS',
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
            'data_class' => 'Teknei\CtrlBundle\Entity\Multas'
        ));
    }
}
