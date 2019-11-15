<?php

namespace Modules\Categories\Http\Controllers;

use Modules\Core\Http\Controllers\BaseAdminController;
use Modules\Categories\Http\Requests\FormRequest;
use Modules\Categories\Repositories\CategoryInterface as Repository;
use Modules\Categories\Entities\Category;
use Yajra\Datatables\Datatables;

class CategoriesController extends BaseAdminController
{
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
            'url' => route('admin.' . $module . '.store')
            ]
        );
        return view('core::admin.create')
            ->with(compact('module', 'form'));
    }

    public function edit(Category $model)
    {
        $module = $model->getTable();
        $form = $this->form(
            config($module . '.form'),
            [
            'method' => 'PUT',
            'url' => route('admin.' . $module . '.update', $model),
            'model' => $model
            ]
        )->modify('is_hourly_based', 'choice', [
            'selected' => $model->is_hourly_based
        ]);

        return view('core::admin.edit')
            ->with(compact('model', 'module', 'form', 'id'));
    }

    public function store(FormRequest $request)
    {
        $data = $request->all();

        $model = $this->repository->create($data);

        return $this->redirect($request, $model, trans('core::global.new_record'));
    }

    public function update(Category $model, FormRequest $request)
    {
        $data = $request->all();

        $data['id'] = $model->id;

        $data['parent_id'] = $data['parent_id'] == '' ? 0 : $data['parent_id'];

        $model = $this->repository->update($data);

        return $this->redirect($request, $model, trans('core::global.update_record'));
    }

    public function dataTable()
    {
        $model = $this->repository->getForDatatable();

        $model_table = $this->repository->getTable();

        return Datatables::of($model)
            ->editColumn('is_hourly_based', function ($row) {
                if ($row->is_hourly_based == 1) {
                    return '<label class="label label-info">Yes</label>';
                } else {
                    return '<label class="label label-warning">No</label>';
                }
            })
            ->editColumn('status', function ($row) {
                $html = '';
                $html .= status_label($row->status);

                return $html;
            })
            ->editColumn('parent_title', function ($row) {
                if (!$row->parent_title) {
                    return 'n/a';
                } else {
                    return $row->parent_title;
                }
            })
            ->addColumn('action', $model_table . '::admin._table-action')
            ->escapeColumns(['action'])
            ->removeColumn('category_id')
            ->make();
    }
}
