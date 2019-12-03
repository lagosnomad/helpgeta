<?php

namespace Modules\Reports\Forms;

use Kris\LaravelFormBuilder\Form;

class ReportsForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('start_date', 'text',[
                'attr' => ['placeholder' => 'yyyy-mm-dd',
                           'class'=>'form-control required date-picker','autocomplete'=>false]
            ])
            ->add('end_date', 'text', [
                'attr' => ['placeholder' => 'yyyy-mm-dd',
                           'class'=>'form-control date-picker','autocomplete'=>false]
            ]);
    }
}
