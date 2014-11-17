<?php

namespace Minsal\PenutBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NotaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ciclo')
            ->add('notaFinal')
            ->add('idAlumno')
            ->add('idMateria')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Minsal\PenutBundle\Entity\Nota'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'minsal_penutbundle_nota';
    }
}
