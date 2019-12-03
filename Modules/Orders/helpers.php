<?php

function generate_order_no(){
    $rand = substr(md5(rand()), 0, 8);
    //str_replace('.', '-', microtime(true)).$this->cart->id;
    return $rand;
}

function single_order_collection($model){
    $item = new stdClass;
    $item->order_number = $model->order_number;
    $item->status = $model->status;
    $item->created_at = $model->created_at;
    $item->total_hours = $model->total_hours;
    $item->total_days = $model->total_days;
    $item->total = $model->total;
    $item->user = [
        'id'=>$model->user->id,
        'username'=>$model->user->username,
        'email'=>$model->user->email,
        'name'=>$model->user->present()->fullname
    ];
    $item->notes = empty($model->notes) ? 'n/a' : $model->notes;

    $artisan_array = [
        'id'=>$model->artisanUser->id,
        'avatar'=>$model->artisanUser->present()->thumbSrc(64,64,[],'avatar'),
        'name'=>$model->artisanUser->present()->fullname,
        'username'=>$model->artisanUser->username
    ];
    if(isset($model->artisanUser->artisan->identification)){
        $artisan = $model->artisanUser->artisan;
        $artisan_array['idTitle'] = $artisan->identification->title;
        $artisan_array['idFile'] = asset('uploads/identifications/'.$artisan->identification_file);
    }

    $item->artisan = $artisan_array;

    $item->item = $model->item;
    $item->item_dates = $model->item->dates;
    $item->phone = $model->phone;
    $item->location = $model->present()->location;
    return json_encode($item);
}

function order_status_label($status,$class){
    //$color_class = is_null($class) ? $status->color_class : $class;
    return '<label class="label '.$class.'">'.$status.'</label>';
}
