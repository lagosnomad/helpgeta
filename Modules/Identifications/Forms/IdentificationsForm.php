<?php

namespace Modules\Identifications\Forms;

use Kris\LaravelFormBuilder\Form;

class IdentificationsForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text');
    }
}
