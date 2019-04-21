<?php

namespace App\Form;

use App\Entity\Player;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 * Class RegistrationType.
 *
 * @category Symfony4
 * @package  App\Form
 * @author   Display Name <thomaslaure3@gmail.com>
 * @license  https://www.gnu.org/licenses/license-list.fr.html GPL
 * @link     https://symfony.com/
 */
class RegistrationType extends AbstractType
{
    /**
     * Construction du formulaire de création de joueur.
     *
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('email', EmailType::class)
            ->add('password', PasswordType::class)
            ->add('repeat_password', PasswordType::class)
            ->add('submit_button', SubmitType::class, array('label' => 'S\'enregistrer'));
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            array('data_class' => Player::class)
        ]);
    }
}