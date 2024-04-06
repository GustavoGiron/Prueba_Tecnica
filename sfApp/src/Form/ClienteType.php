<?php

namespace App\Form;

use App\Entity\Cliente;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ClienteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombre', null, ['label' => 'Ingrese Su Nombre '])
            ->add('apellido', null, ['label' => 'Ingrese Su Apellido '])
            ->add('razon_social', null, ['label' => 'O Ingrese Nombre de la Identidad '])
            ->add('municipio')
            ->add('departamento')
            ->add('numeroid', null, ['label' => 'Número de Identificación '])
            ->add('tipo_documento',ChoiceType::class, [
                'label' => 'Seleccione el Documento de identificacion',
                'choices' => [
                    'DPI' => 'd',
                    'Pasaporte' => 'p'
                ],
            ])
            ->add('contra' , PasswordType::class)
            ->add('Registrar', SubmitType::class, ['label' => 'Registrar Cliente'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cliente::class,
        ]);
    }
}
