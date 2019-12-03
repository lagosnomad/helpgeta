<?php

namespace Modules\Artisans\Entities;

use Illuminate\Database\Eloquent\Builder;
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
        'slug',
        'bio',
        'identification_file',
        'identification_id',
        'is_activated',
        'is_verified'
    ];

    public function user()
    {
        return $this->belongsTo(config('auth.providers.users.model'));
    }

    public function categories()
    {
        return $this->belongsToMany('Modules\Categories\Entities\Category','artisan_category')
            ->withPivot(['amount'])
            ->withTimestamps();
    }

    public function identification()
    {
        return $this->belongsTo('Modules\Identifications\Entities\Identification');
    }

    public function scopeOnline(Builder $query)
    {
        return $query->where('is_activated', 1);
    }

}
