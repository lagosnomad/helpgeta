<?php

namespace Modules\Banks\Forms;

use Kris\LaravelFormBuilder\Form;

class BanksForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text');
    }
}
