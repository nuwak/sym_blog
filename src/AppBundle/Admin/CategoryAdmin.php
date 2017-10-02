<?php
namespace AppBundle\Admin;

use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Stfalcon\Bundle\TinymceBundle\Twig\Extension\StfalconTinymceExtension;
use Symfony\Component\Validator\Constraints\DateTime;

class CategoryAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', 'text', ['help' => 'Название категории'])
            ->add('description', CKEditorType::class)
//            ->add('description', 'textarea', array(
//                'attr' => array(
//                    'class' => 'tinymce',
////                    'data-theme' => 'bbcode', // Skip it if you want to use default theme
////                    'tinymce'=>'{"theme":"simple"}'
//                )))
            ->add('createdAt', 'datetime', array( 'data' => new \DateTime()))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('description')
            ->add('createdAt')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->addIdentifier('description')
            ->addIdentifier('createdAt')
        ;
    }
}