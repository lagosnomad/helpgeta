<?php namespace Modules\States\Http\Controllers;

use Modules\Core\Http\Controllers\BaseAdminController;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\States\Http\Requests\FormRequest;
use Modules\States\Repositories\StateInterface as Repository;
use Modules\States\Entities\State;

class StatesPublicController extends BasePublicController {

    public function __construct(Repository $repository)
    {
        parent::__construct($repository);
    }

    public function index()
    {

    }



}
