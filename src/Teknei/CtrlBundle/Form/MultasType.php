<?php

namespace Teknei\CtrlBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

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
            ->add('idrecaDesc', null,array('label' => 'RECARGADESC'))
            ->add('idestapago',null,array('label' => 'ESTATUS DE PAGO'))
            ->add('idesta', null,array('label' => 'ESTATUS'))
        ;
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
