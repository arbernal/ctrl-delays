<?php

namespace Teknei\CtrlBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;


class UsuarioType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        
            ->add('usuario', null,array('label' => 'Nombre','attr' => array('style' => 'text-transform:uppercase','onkeyup' => 'javascript:this.value=this.value.toUpperCase()') ))
            ->add('contrasena', null,array('label' => 'Password'))
            ->add( 'idroles', EntityType::class, array(
            				'class' => 'TekneiCtrlBundle:Roles',
            				'choice_label'  =>  'nombre' ,
            				'query_builder' => function (EntityRepository $er) {
            				return $er->createQueryBuilder('u')
            				->join('u.idesta', 'e')
            				->where('e.descComp = \'ACTIVO\' ');
            				}, 'label' => 'Rol',
            				) );
            $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
            	$usuario = $event->getData();
            	$form = $event->getForm();
            
            	if (!$usuario || null === $usuario->getIdusuario()) {
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
            'data_class' => 'Teknei\CtrlBundle\Entity\Usuario'
        ));
    }
}
