<?php 

namespace SK\MusicBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

use SK\MusicBundle\Form\AudioType;

class SongAdmin extends AbstractAdmin 
{


		protected function configureFormFields(FormMapper $formMapper)
		{

				$formMapper
            ->add('title')
            ->add('credits')
            ->add('tags')
            ->add('listened')
            ->add('published')
            ->add('audios', CollectionType::class, array(
            		'entry_type' => AudioType::class,
        				'allow_add'    => true,
            ))
            /*->add(
                $builder
                    ->create('audios', FormType::class, array('by_reference' => true))
                    ->add('Audio', AudioType::class)
            )*/;

		}

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
        	->add('name');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
        	->addIdentifier('name');
    }


}