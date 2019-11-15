<?php

namespace Modules\Artisans\Entities;

use Modules\Core\Entities\Base;
use Modules\Core\Presenters\PresentableTrait;

class Artisan extends Base
{
    use PresentableTrait;

    protected $presenter = 'Modules\Artisans\Presenters\ModulePresenter';

    protected $fillable = [
        'business_name',
        'bank_name',
        'bank_account',
        'guarantor_full_name',
        'guarantor_phone',
        'guarantor_email',
        'days_available',
        'hours_available',
        'is_available',
        'user_id',
        'bio'
    ];

    public function user()
    {
        return $this->belongsTo(config('auth.providers.users.model'));
    }

    public function categories()
    {
        return $this->belongsToMany('Modules\Categories\Entities\Category');
    }

}
