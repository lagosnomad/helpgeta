<?php

namespace Modules\Categories\Forms;

use Kris\LaravelFormBuilder\Form;

class CategoriesForm extends Form {

    public function buildForm()
    {
        $this
            /*->add('is_hourly_based', 'checkbox', [
                'value'   => 1,
                'checked' => true
            ])*/
            ->add('category', 'text',[
                'label'=>'Service Name'
            ])
            ->add('parent_id', 'select', [
                'wrapper' => ['class' => 'form-group'],
                'label'       => 'Parent Service',
                'empty_value' => '-- select parent --',
                'choices'     => \Categories::select('all', false, 'category', 'id')
            ])
            ->add('is_hourly_based', 'choice', [
                'label' => 'Is Service Hourly Based ?',
                'choices' => [1 => 'Yes', 0 => 'No'],
                'wrapper' => ['class' => 'form-group'],
                'choice_options' => [
                    'wrapper' => ['class' => 'is-hourly-based-wrapper'],
                    'label_attr' => ['class' => 'label-class'],
                    'attr' => ['class'=>'toggle']
                ],
                'expanded' => true,
                'selected' => 0,
                'multiple' => false
            ])

            /*->add('is_hourly_based', 'select', [
                'choices' => [1 => 'Yes', 0 => 'No'],
                'attr' => ['class'=>'form-control'],
                'selected'=>0,
                'wrapper' => ['class' => 'form-group'],
            ])*/

            /*->add('amount', 'number',[
                'label'=>'Amount',
                'help_block' => [
                    'text' => 'Optional for services with sub services',
                    'tag' => 'p',
                    'attr' => ['class' => 'help-block']
                ]
            ])*/
            ->add('body', 'textarea',[
                'label'=>'Description',
                'wrapper' => ['class' => 'form-group'],
                'attr'=>['rows'=>3]
            ])
            ->add('status', 'select', [
                'choices' => [1 => 'live', 0 => 'draft'],
                'empty_value' => '- Select status -',
                'selected'=>1
            ]);
    }
}
