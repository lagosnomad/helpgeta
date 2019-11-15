<?php

namespace Modules\Artisans\Http\Controllers;

use Modules\Core\Http\Controllers\BaseAdminController;
use Modules\Artisans\Http\Requests\FormRequest;
use Modules\Artisans\Repositories\ArtisanInterface as Repository;
use Modules\Artisans\Entities\Artisan;
use Yajra\DataTables\Facades\DataTables;

class ArtisansController extends BaseAdminController {

    public function __construct(Repository $repository)
    {
        parent::__construct($repository);
    }

    public function index()
    {
        $module = $this->repository->getTable();
        $title = trans($module . '::global.group_name');

        return view('core::admin.index')
            ->with(compact('title', 'module'));
    }

    public function create()
    {
        $module = $this->repository->getTable();
        $form = $this->form(
            config($module . '.form'),
            [
                'method' => 'POST',
                'url'    => route('admin.' . $module . '.store')
            ]
        );
        $user_form = $this->form(config('users.form'));

        return view('core::admin.create')
            ->with(compact('module', 'form', 'user_form'));
    }

    public function edit(Artisan $model)
    {
        $module = $model->getTable();
        $form = $this->form(
            config($module . '.form'),
            [
                'method' => 'PUT',
                'url'    => route('admin.' . $module . '.update', $model),
                'model'  => $model
            ]
        );

        $user_form = $this->form(config('users.form'));

        return view('core::admin.edit')
            ->with(compact('model', 'module', 'form', 'id','user_form'));
    }

    public function store(FormRequest $request)
    {
        $data = $request->all();

        $model = $this->repository->create($data);

        return $this->redirect($request, $model, trans('core::global.new_record'));
    }

    public function update(Artisan $model, FormRequest $request)
    {
        $data = $request->all();

        $data['id'] = $model->id;

        $model = $this->repository->update($data);

        return $this->redirect($request, $model, trans('core::global.update_record'));
    }

    public function dataTable()
    {
        $model = $this->repository->getForDatatable();

        $model_table = $this->repository->getTable();

        return Datatables::eloquent($model)
            ->editColumn('user', function ($row) {
                return $row->present()->businessName;
            })
            /*->editColumn('status', function ($row) {
                $html = '';
                $html .= status_label($row->status);

                return $html;
            })*/
            ->addColumn('action', $model_table . '::admin._table-action')
            ->order(function ($query) {
                $query->orderBy('id', 'desc');
            })
            ->escapeColumns(['action'])
            ->removeColumn('id')
            ->make();
    }
}
