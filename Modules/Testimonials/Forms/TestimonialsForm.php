<?php

namespace Modules\Testimonials\Forms;

use Kris\LaravelFormBuilder\Form;

class TestimonialsForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', 'text')
            ->add('image', 'file')
            ->add('status', 'select', [
                'choices' => [1 => 'live', 0 => 'draft'],
                'empty_value' => '- Select status -',
                'selected'=>1
            ])
            ->add('body', 'textarea');
    }
}
