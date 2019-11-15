<?php namespace Modules\Users\Forms;

use Kris\LaravelFormBuilder\Form;

class AuthForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('email', 'text',[
                'attr'=>[
                    'class'=>'form-control form-control-solid placeholder-no-fix',
                    'placeholder'=>'Username',
                    'autocomplete'=>'off'
                ]
            ])
            ->add('password', 'password',[
                'attr'=>[
                    'class'=>'form-control form-control-solid placeholder-no-fix',
                    'placeholder'=>'Password',
                    'autocomplete'=>'off'
                ]
            ])
            ->add('login', 'submit',[
                'attr'=>[
                    'class'=>'btn dark uppercase btn-block'
                ]
            ]);
    }
}