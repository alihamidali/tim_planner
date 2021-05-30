<?php

namespace App\Form;

use App\Entity\Business;
use App\Entity\City;
use App\Entity\Country;
use App\Entity\Cuisines;
use App\Entity\Sector;
use App\Entity\Traveller;
use App\Entity\TravellerCategory;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class TravelRegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class, [
                'label' => 'First Name',
                'invalid_message' => 'You entered an invalid first name value',
                'error_bubbling' => true,
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Last Name',
                'invalid_message' => 'You entered an invalid last name value',
                'error_bubbling' => true,
            ])
            ->add('userName', TextType::class, [
                'label' => 'Username',
                'invalid_message' => 'You entered an invalid user name value',
                'error_bubbling' => true,
            ])
            ->add('dateOfBirth', DateType::class, [
                'label' => 'Date of Birth',
                'widget' => 'single_text',
                'invalid_message' => 'You entered an invalid date of birth value',
                'error_bubbling' => true,
            ])
            ->add('nationality', EntityType::class, [
                'label' => 'Nationality',
                'invalid_message' => 'You entered an invalid nationality value',
                'error_bubbling' => true,
                'class' => Country::class,
                'choice_label' => 'nationality',
                'placeholder' => 'Select Nationality',
            ])
            ->add('gender', ChoiceType::class, [
                'invalid_message' => 'You entered an invalid gender value',
                'error_bubbling' => true,
                'choices' => [
                    'Male' => 'male',
                    'Female' => 'female'
                ],
                'expanded' => true
            ])
            ->add('photo', FileType::class, [
                'label' => 'Profile Photo',
                'invalid_message' => 'You entered an invalid photo value',
                'error_bubbling' => true,
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email Address',
                'invalid_message' => 'You entered an invalid email value',
                'error_bubbling' => true,
            ])
            ->add('phoneNo', TelType::class, [
                'label' => 'Phone Number',
                'invalid_message' => 'You entered an invalid phoneNo value',
                'error_bubbling' => true,
            ])
            ->add('mobileNo', TelType::class, [
                'label' => 'Mobile Number',
                'invalid_message' => 'You entered an invalid mobileNo value',
                'error_bubbling' => true,
            ])
            ->add('travellerCategory', EntityType::class, [
                'class' => TravellerCategory::class,
                'choice_label' => 'name',
                'invalid_message' => 'You entered an invalid travel category value',
                'error_bubbling' => true,
                'expanded' => true,
            ])
            ->add('city', EntityType::class, [
                'class' => City::class,
                'choice_label' => 'name',
                'invalid_message' => 'You entered an invalid city value',
                'error_bubbling' => true,
                'multiple' => true,
                'placeholder' => '',
            ])
            ->add('favoriteHangoutPlace', EntityType::class, [
                'class' => Sector::class,
                'choice_label' => 'name',
                'invalid_message' => 'You entered an invalid favorite hangout place value',
                'error_bubbling' => true,
                'placeholder' => '',
            ])
            ->add('favoriteCuisine', ChoiceType::class, [
                'label' => 'Favorite Cuisine',
                'choices' => Cuisines::ALL_CUISINES,
                'invalid_message' => 'You entered an invalid favorite cuisines value',
                'error_bubbling' => true,
                'placeholder' => '',
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'label' => 'Password',
                'error_bubbling' => true,
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Register',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Traveller::class,
        ]);
    }
}
