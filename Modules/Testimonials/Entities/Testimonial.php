<?php namespace Modules\Testimonials\Entities;

use Modules\Core\Entities\Base;
use Modules\Core\Presenters\PresentableTrait;

class Testimonial extends Base {

    use PresentableTrait;

    protected $presenter = 'Modules\Testimonials\Presenters\ModulePresenter';

    protected $appends = ['avatar'];

    protected $guarded = ['_token','exit'];

    public $attachments = [
        'image',
    ];

    public function getAvatarAttribute()
    {
        return $this->present()->thumbSrc(100,100);
    }
}