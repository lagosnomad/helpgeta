<?php namespace Modules\Testimonials\Presenters;

use Modules\Core\Presenters\Presenter;

class ModulePresenter  extends Presenter
{

    /**
     * Get title
     *
     * @return string
     */
    public function title()
    {
        return '';
    }

    public function imgNotFound($file = 'uploads/avatar.png')
    {
        return $file;
    }
}