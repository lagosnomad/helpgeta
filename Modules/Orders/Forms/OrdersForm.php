<?php

namespace Modules\Orders\Forms;

use Kris\LaravelFormBuilder\Form;

class OrdersForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text');
    }
}
