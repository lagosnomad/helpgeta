<?php

namespace Modules\Artisans\Forms;

use Kris\LaravelFormBuilder\Form;

class ArtisansForm extends Form {

    public function buildForm()
    {
        $this
            ->add('business_name', 'text', [
                'label' => 'Business Name'
            ])
            ->add('bio', 'text', [
                'label' => 'Bio',
                'attr'=>['rows'=>3]
            ])
            ->add('bank_name', 'text', [
                'label' => 'Bank Name'
            ])
            ->add('account_number', 'text', [
                'label' => 'Account Number'
            ])
            ->add('account_name', 'text', [
                'label' => 'Account Name'
            ])
            ->add('guarantor_full_name', 'text', [
                'label' => 'Guarantor Full Name'
            ])
            ->add('guarantor_phone', 'text', [
                'label' => 'Guarantor Phone No.'
            ])
            ->add('guarantor_email', 'text', [
                'label' => 'Guarantor Email'
            ])
            ->add('image', 'file', [
                'label' => 'Logo'
            ])
            ->add('is_activated', 'choice', [
                'label'=>'Activate Service Provider',
                'choices' => [
                    0 => 'No',
                    1 => 'Yes'
                ],
                'expanded' => true,
                'multiple' => false
            ])
            ->add('is_verified', 'choice', [
                'label'=>'Verify Service Provider',
                'choices' => [
                    0 => 'No',
                    1 => 'Yes'
                ],
                'expanded' => true,
                'multiple' => false
            ]);

    }
}
