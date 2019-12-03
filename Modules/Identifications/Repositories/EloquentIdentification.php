<?php namespace Modules\Identifications\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Repositories\RepositoriesAbstract;

class EloquentIdentification extends RepositoriesAbstract implements IdentificationInterface
{

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

}