<?php

namespace Minsal\PenutBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AlumnoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('carnet')
            ->add('nombreAlumno')
            ->add('apellidoAlumno')
            ->add('edadAlumno')
            ->add('sexoAlumno')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Minsal\PenutBundle\Entity\Alumno'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'minsal_penutbundle_alumno';
    }
}
