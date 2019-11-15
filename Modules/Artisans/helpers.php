<?php

function modify_artisan_collection($model){
    $model->business_name = ($model->business_name != '') ? $model->business_name : $model->user->present()->fullname;
    $model->category_list = $model->present()->categoriesList;
    $model->avatar = $model->user->present()->thumbSrc(64,64,[],'avatar');
    $model->url = $model->present()->url;
}

function single_artisan_collection($model){
    $item = new stdClass;
    $item->business_name = ($model->business_name != '') ? $model->business_name : $model->user->present()->fullname;
    $item->category_list = $model->present()->categoriesList;
    $item->avatar = $model->user->present()->thumbSrc(64,64,[],'avatar');
    $item->url = $model->present()->url;
    return json_encode($item);
}