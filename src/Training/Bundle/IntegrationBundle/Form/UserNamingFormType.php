<?php

namespace Training\Bundle\IntegrationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Training\Bundle\IntegrationBundle\Entity\UserNamingSettings;

class UserNamingFormType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class' => UserNamingSettings::class]);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('url', UrlType::class, [
            'label' => 'training.transport.form.url.label',
            'tooltip' => 'training.transport.form.url.tooltip',
            'required' => true,
        ]);
    }

    public function getBlockPrefix()
    {
        return 'training_transport_form_type';
    }
}
