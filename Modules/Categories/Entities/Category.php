<?php

namespace Modules\Categories\Entities;

use Illuminate\Database\Eloquent\Builder;
use Modules\Core\Collections\NestableTrait;
use Modules\Core\Entities\Base;
use Modules\Core\Presenters\PresentableTrait;

class Category extends Base
{
    use PresentableTrait;
    use NestableTrait;

    protected $presenter = 'Modules\Categories\Presenters\ModulePresenter';

    protected $fillable = [
        'category',
        'slug',
        'icon',
        'status',
        'body',
        'is_hourly_based',
        'parent_id',
        'icon',
        'amount',
        'uri'
    ];

    protected $appends = ['url','image'];

    public $attachments = [
        'icon',
    ];

    protected $casts = [
        'amount' => 'float',
    ];

    public function artisans()
    {
        return $this->belongsToMany('Modules\Artisans\Entities\Artisan');
    }

    public function parent()
    {
        return $this->belongsTo('Modules\Categories\Entities\Category', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('Modules\Categories\Entities\Category', 'parent_id');
    }

    public function items()
    {
        return $this->children()->with('items');
    }

    public function itemsWithArtisansCount()
    {
        return $this->children()->withCount('artisans')->with('items');
    }

    public function scopeBase(Builder $query)
    {
        return $query->where('parent_id',0);
    }

    public function getUrlAttribute()
    {
        return $this->present()->url;
    }

    public function getImageAttribute()
    {
        return $this->present()->thumbSrc(120,120,[],'icon');
    }

}
