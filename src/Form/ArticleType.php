<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\Category;
use DateTime;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre de votre article',
                'attr' => [
                    'class' => 'form-control-sm form-red',
                    'placeholder' => 'Titre par défaut'

                ],
                'constraints' => [
                    new Length([
                        'min' => 5,
                        'minMessage' => 'Votre titre n\'est pas assez long',
                        'max' => 255,
                        'maxMessage' => 'Votre titre ne doit pas dépasser 255 caractères',
                        'allowEmptyString' => false
                    ])
                ],
            ])

            ->add('content', TextareaType::class, [

                'data' => 'Contenu par défaut depuis le articleType'
            ])
            ->add('created_at', DateTimeType::class, [
                'label' => 'Créé le',
                'widget' => 'single_text',
                'html5' => false,
              'format' => 'dd/MM/yyyy HH:mm:ss'
            ])

            ->add('short_content')
            ->add('category', EntityType::class, [
                'class' => Category::class, // Quelle classe est reliée au champ category
                'choice_label' => 'title', //Quel champ de Category afficher dans le select
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
