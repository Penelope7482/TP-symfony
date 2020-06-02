<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\Category;
use Doctrine\DBAL\Types\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleQuickType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class,[
                'label'=> 'Titre de votre article',
                'data' => 'Titre par défaut',
                'attr' => [
                    'class' => 'form-control-sm'
                ]
            ])
            ->add('content')
            ->add('created_at')
            ->add('short_content')
            ->add('category', EntityType::class, [
                'class' => Category::class, // Quelle classe est reliée au champ category
                'choice_label' => 'title', //Quel champ de Category afficher dans le select
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
