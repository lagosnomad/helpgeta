<?php

namespace Modules\Cities\Forms;

use Kris\LaravelFormBuilder\Form;

class CitiesForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text');
    }
}
