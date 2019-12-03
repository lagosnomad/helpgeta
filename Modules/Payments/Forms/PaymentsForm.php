<?php

namespace Modules\Payments\Forms;

use Kris\LaravelFormBuilder\Form;

class PaymentsForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text');
    }
}
