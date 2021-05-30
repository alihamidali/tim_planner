<?php

namespace App\Form;

use App\Entity\Business;
use App\Entity\City;
use App\Entity\Country;
use App\Entity\Sector;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class BusinessRegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fullName', TextType::class, [
                'label' => 'Full Name',
                'invalid_message' => 'You entered an invalid fullName value',
                'error_bubbling' => true,
            ])
            ->add('userName', TextType::class, [
                'label' => 'Username',
                'invalid_message' => 'You entered an invalid userName value',
                'error_bubbling' => true,
            ])
            ->add('designation', TextType::class, [
                'label' => 'Designation',
                'invalid_message' => 'You entered an invalid designation value',
                'error_bubbling' => true,
            ])
            ->add('companyName', TextType::class, [
                'label' => 'Company Name',
                'invalid_message' => 'You entered an invalid companyName value',
                'error_bubbling' => true,
            ])
            ->add('companyWebsite', TextType::class, [
                'label' => 'Company Website',
                'invalid_message' => 'You entered an invalid companyWebsite value',
                'error_bubbling' => true,
            ])
            ->add('companyLogo', FileType::class, [
                'label' => 'Company Logo',
                'invalid_message' => 'You entered an invalid companyLogo value',
                'error_bubbling' => true,
            ])
            ->add('sector', EntityType::class, [
                'label' => 'Sector',
                'invalid_message' => 'You entered an invalid sector value',
                'error_bubbling' => true,
                'class' => Sector::class,
                'choice_label' => 'name',
                'placeholder' => 'Select Business Sector',
            ])
            ->add('address1', TextType::class, [
                'label' => 'Address 1',
                'invalid_message' => 'You entered an invalid address1 value',
                'error_bubbling' => true
            ])
            ->add('address2', TextType::class, [
                'label' => 'Address 2',
                'invalid_message' => 'You entered an invalid address2 value',
                'error_bubbling' => true
            ])
            ->add('address3', TextType::class, [
                'label' => 'Address 3',
                'invalid_message' => 'You entered an invalid address3 value',
                'error_bubbling' => true
            ])
            ->add('country', EntityType::class, [
                'label' => 'Country',
                'invalid_message' => 'You entered an invalid country value',
                'error_bubbling' => true,
                'class' => Country::class,
                'choice_label' => 'countryName',
                'placeholder' => 'Select Country',
                'property_path' => 'nationality'
            ])
            ->add('city', EntityType::class, [
                'label' => 'City',
                'invalid_message' => 'You entered an invalid city value',
                'error_bubbling' => true,
                'class' => City::class,
                'choice_label' => 'name',
                'placeholder' => 'Select City',
                'multiple' => true
            ])
            ->add('nationality', EntityType::class, [
                'label' => 'Nationality',
                'invalid_message' => 'You entered an invalid nationality value',
                'error_bubbling' => true,
                'class' => Country::class,
                'choice_label' => 'nationality',
                'placeholder' => 'Select Nationality',
                'property_path' => 'nationality'
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
            'data_class' => Business::class,
        ]);
    }
}