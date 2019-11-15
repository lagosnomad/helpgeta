<?php

namespace Modules\Artisans\Observers;

class SlugObserver
{
    public function creating($model)
    {
        $name = $model->user->id.' '.$model->user->present()->fullname;
        $slug = $model->slug?: str_slug($name);

        // slug = null if empty string
        $model->slug = $slug ?: null;

    }
}
