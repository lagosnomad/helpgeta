<?php namespace Modules\Users\Composers;

use Kris\LaravelFormBuilder\FormBuilderTrait;

class loginFormViewComposer
{
    use FormBuilderTrait;

    public function compose($view)
    {
        $view->form = $this->form('Users\Forms\AuthForm', [
            'method' => 'POST',
            'route' => 'login.post'
        ]);
    }
}
