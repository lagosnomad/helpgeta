<?php namespace Modules\Testimonials\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Repositories\RepositoriesAbstract;

class EloquentTestimonial extends RepositoriesAbstract implements TestimonialInterface
{

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

}