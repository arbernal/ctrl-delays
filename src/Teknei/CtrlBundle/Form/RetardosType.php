<?php

namespace Teknei\CtrlBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;

class RetardosType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('horaLlega')
            ->add('idrecaSema')
            ->add( 'idusuario', EntityType::class, array(
            				'class' => 'TekneiCtrlBundle:Usuario',
            				'choice_label'  =>  'usuario' ,
            				'query_builder' => function (EntityRepository $er) {
            				return $er->createQueryBuilder('u')
            				->join('u.idesta', 'e')
            				->where('e.descComp =  \'ACTIVO\'');
            				}, 'label' => 'Usuario',
            				) )
            ->add('idhorario')
            ->add('idmultas')
            ->add('idtari')
        ;
            $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
            	$retardo = $event->getData();
            	$form = $event->getForm();
            
            	if (!$retardo || null === $retardo->getIdretardos()) {
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
            				'choice_label'  =>  'descComp' ,
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
            'data_class' => 'Teknei\CtrlBundle\Entity\Retardos'
        ));
    }
}
