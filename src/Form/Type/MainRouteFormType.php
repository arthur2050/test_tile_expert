<?php
/**
 * @author    Arthur Patsanovskiy <arthur2050@mail.ru>
 * @copyright Copyright (c) 2024, Darvin Digital
 * @link      https://darvindigital.ru/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Form\Type;


use App\Entity\Model\MainRouteParameters;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MainRouteFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('factory', TextType::class, [
            'data' => 'cobsa'
        ])
                ->add('collection', TextType::class, [
                    'data' => 'manual'
                ])
                ->add('article', TextType::class, [
                    'data' => 'manu7530bcbm-manualbaltic7-5x30'
                ])
                ->add('button', SubmitType::class)
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
           'data_class' => MainRouteParameters::class,
            'method'    => 'GET'
        ]);
    }
}
