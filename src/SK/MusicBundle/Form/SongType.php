<?php

namespace SK\MusicBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FormType;

use SK\MusicBundle\Form\AudioType;

class SongType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('credits')
            ->add('tags')
            ->add('listened')
            ->add('published')
           /* ->add('audio', EntityType::class, array(
                'class' => 'SK\MusicBundle\Entity\Audio',
                'choice_label' => 'audioFile'
            ))*/
            /*->add('audio', CollectionType::class, array(
                'entry_type' => FileType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'prototype' => true,
            ))*/
            ->add(
                $builder
                    ->create('audios', FormType::class, array('by_reference' => true))
                    ->add('Audio', AudioType::class)
            )
            ->add('submit', SubmitType::class);

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SK\MusicBundle\Entity\Song'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'sk_musicbundle_song';
    }


}
