<?php namespace Modules\Orders\Entities;

use Modules\Core\Entities\Base;
use Modules\Core\Presenters\PresentableTrait;
use Illuminate\Database\Eloquent\Builder;

class Order extends Base {

    use PresentableTrait;

    protected $presenter = 'Modules\Orders\Presenters\ModulePresenter';

    protected $fillable = [
        'order_number',
        'user_id',
        'artisan_id',
        'status_id',
        'tax',
        'total',
        'total_hours',
        'total_days',
        'subtotal',
        'notes',
        'address',
        'landmark',
        'state_id',
        'city_id',
        'phone'
    ];

   /* public function items()
    {
        return $this->hasMany('Modules\Orders\Entities\OrderItem', 'order_id');
    }*/

    public function item()
    {
        return $this->hasOne('Modules\Orders\Entities\OrderItem', 'order_id');
    }

    public function payment()
    {
        return $this->hasOne('Modules\Payments\Entities\Payment', 'order_id');
    }

    public function status(){
        return $this->belongsTo('Modules\Orders\Entities\OrderStatus','status_id');
    }

    public function user(){
        return $this->belongsTo(config('auth.providers.users.model'));
    }

    public function artisanUser(){
        return $this->belongsTo(config('auth.providers.users.model'),'artisan_id');
    }

    public function scopeOnline(Builder $query)
    {
        $user = current_user();
        return $query->where('artisan_id', $user->id)->orWhere('user_id',$user->id);
    }

    public function state()
    {
        return $this->belongsTo('Modules\States\Entities\State');
    }

    public function city()
    {
        return $this->belongsTo('Modules\Cities\Entities\City');
    }

    /*public function getTotalAttribute($value)
    {
        return format_currency($value);
    }*/

    public function getCreatedAtAttribute($value)
    {
        $date = new \DateTime($value);
        return $date->format('d M, Y h:i:s a');
    }




}