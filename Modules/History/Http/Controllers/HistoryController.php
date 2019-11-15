<?php namespace Modules\History\Http\Controllers;

use Modules\Core\Http\Controllers\BaseAdminController;
use Modules\History\Http\Requests\FormRequest;
use Modules\History\Repositories\HistoryInterface as Repository;

class HistoryController extends BaseAdminController {

    public function __construct(Repository $repository)
    {
        parent::__construct($repository);
    }

    public function store(FormRequest $request)
    {
        $data = $request->all();

        $model = $this->repository->create($data);

        \Notification::success(trans('core::global.new_record'));

        return $this->redirect($request, $model);
    }

    public function update($model,FormRequest $request)
    {
        $data = $request->all();

        $data['id'] = $model;

        $model = $this->repository->update($data);

        \Notification::success(trans('core::global.update_record'));

        return $this->redirect($request, $model);
    }

}
