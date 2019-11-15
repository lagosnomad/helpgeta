<?php

namespace Modules\Core\Http\Controllers;

use Illuminate\Routing\Controller;
use Kris\LaravelFormBuilder\FormBuilderTrait;
use Modules\Core\Traits\RedirectingTrait;
use Yajra\Datatables\Datatables;

abstract class BaseAdminController extends Controller
{
    use FormBuilderTrait,RedirectingTrait;

    protected $repository;

    public function __construct($repository = null)
    {
        $this->middleware('auth.admin');
        $this->middleware('permissions');
        $this->middleware('bindings');
        $this->repository = $repository;
    }

    public function index()
    {
        $module = $this->repository->getTable();
        //$module = str_replace('_','',$module);
        $title = trans($module . '::global.group_name');
        return view('core::admin.index')
            ->with(compact('title', 'module'));
    }

    protected function redirect($request, $model, $message = null)
    {
        $redirectUrl = $request->get('exit') ? $model->indexUrl() : $model->editUrl() ;
        if (!is_null($message)) {
            return redirect($redirectUrl)->withSuccess($message);
        }
        return redirect($redirectUrl);
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function dataTable()
    {
        $model = $this->repository->getForDatatable();

        $model_table = $this->repository->getTable();

        return Datatables::of($model)
            ->addColumn('action', $model_table . '::admin._table-action')
            ->escapeColumns(['action'])
            ->removeColumn('id')
            ->make();
    }

    public function destroy($model)
    {
        $this->repository->delete($model);
    }
}
