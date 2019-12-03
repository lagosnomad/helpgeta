<?php

namespace Modules\Cities\Forms;

use Kris\LaravelFormBuilder\Form;

class CitiesForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text')
            ->add('state_id', 'select', [
                'label'       => 'State',
                'empty_value' => '-- select state --',
                'choices'     => \States::select('all', false, 'name', 'id')
            ]);
    }
}
