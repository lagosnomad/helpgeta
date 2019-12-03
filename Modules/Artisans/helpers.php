<?php

function modify_artisan_collection($model){
    $model->business_name =  $model->user->present()->fullname;
    $model->category_list = $model->present()->categoriesList;
    $model->avatar = $model->user->present()->thumbSrc(64,64,[],'avatar');
    $model->url = $model->present()->url;
    $model->location = $model->present()->location;
}

function single_artisan_collection($model){
    $item = new stdClass;
    $item->business_name = $model->user->present()->fullname;
    $item->category_list = $model->present()->categoriesList;
    $item->categories = $model->categories;
    $item->avatar = $model->user->present()->thumbSrc(64,64,[],'avatar');
    $item->url = $model->present()->url;
    $item->location = $model->present()->location;
    $item->user_id = $model->user->id;
    $item->user_email = $model->user->email;
    $item->is_verified = $model->is_verified;
    $item->user_phone = $model->user->phone;
    return json_encode($item);
}

function get_category_parents($uri){
    $uri = explode('/',$uri);
    array_pop($uri);
    return implode('/',$uri);
}

function artisan_status_label($status){
    if($status ==1){
        return '<label class="label label-success">YES</label>';
    }else{
        return '<label class="label label-danger">No</label>';
    }
}