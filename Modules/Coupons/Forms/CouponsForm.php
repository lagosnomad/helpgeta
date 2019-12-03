<?php

namespace Modules\Coupons\Forms;

use Kris\LaravelFormBuilder\Form;

class CouponsForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('code', 'text',[
                'label'=>'Coupon Code',
                'attr'=>[
                    'class'=>'form-control','required'
                ]
            ])
            ->add('max_use', 'number',[
                'label'=>'Maximum Use',
                'attr'=>[
                    'class'=>'form-control','required'
                ]
            ])
            ->add('status', 'select', [
                'choices' => ['1' => 'Active', '0' => 'Inactive'],
                'selected'=>1
            ])
            ->add('limit_per_order', 'number',[
                'label'=>'Limit Per Order',
                'attr'=>[
                    'class'=>'form-control','required'
                ]
            ])

            ->add('start_date', 'text',[
                'label'=>'Enable On',
                'attr' => ['placeholder' => 'yyyy-mm-dd',
                           'class'=>'form-control required date-picker']
            ])
            ->add('end_date', 'text', [
                'label'=>'Disable On',
                'attr' => ['placeholder' => 'yyyy-mm-dd',
                           'class'=>'form-control required date-picker']
            ])
            ->add('reduction_type', 'select', [
                'label'=>'Reduction Type',
                'choices' => ['percent' => 'percent', 'fixed' => 'fixed'],
            ])
            ->add('reduction_amount', 'number',[
                'label'=>'Reduction Amount',
                'attr'=>[
                    'class'=>'form-control',
                    'required',
                    'placeholder'=>'enter % or amt.'
                ]
            ])
            /*->add('whole_order', 'select', [
                'choices' => [1 => 'Apply Coupon to Whole Order', 0 => 'Apply Coupon to Select Products'],
                'selected'=>1,
                'attr'=>['id'=>'whole_order']
            ])*/;
    }
}
