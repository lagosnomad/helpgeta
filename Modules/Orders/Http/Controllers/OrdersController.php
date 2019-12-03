<?php namespace Modules\Orders\Http\Controllers;

use Modules\Core\Http\Controllers\BaseAdminController;
use Modules\Orders\Http\Requests\FormRequest;
use Modules\Orders\Repositories\OrderInterface as Repository;
use Modules\Orders\Entities\Order;
use Yajra\DataTables\Facades\DataTables;

class OrdersController extends BaseAdminController {

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
        $form = $this->form(config($module.'.form'), [
            'method' => 'POST',
            'url' => route('admin.'.$module.'.store')
        ]);
        return view('core::admin.create')
            ->with(compact('module','form'));
    }

    public function edit(Order $model)
        {
            $module = $model->getTable();
            $form = $this->form(config($module.'.form'), [
                'method' => 'PUT',
                'url' => route('admin.'.$module.'.update',$model),
                'model'=>$model
            ]);
            return view('core::admin.edit')
                ->with(compact('model','module','form','id'));
        }

    public function store(FormRequest $request)
    {
        $data = $request->all();

        $model = $this->repository->create($data);

        return $this->redirect($request, $model, trans('core::global.new_record'));
    }

    public function update(Order $model,FormRequest $request)
    {
        $data = $request->all();

        $data['id'] = $model->id;

        $model = $this->repository->update($data);

        return $this->redirect($request, $model, trans('core::global.update_record'));
    }

    public function show($model)
    {
        return view('orders::admin.show')->with(compact('model'));
    }

    public function dataTable($artisan_user_id = NULL)
    {
        $model = $this->repository->getDatatable($artisan_user_id);

        $model_table = $this->repository->getTable();

        return Datatables::of($model)
            ->addColumn('status_name', function ($row) {
                return order_status_label($row->status_name,$row->status_class);
            })
            ->addColumn('action', $model_table . '::admin._table-action')
            ->escapeColumns(['action'])
            ->removeColumn('id')
            ->make(true);
    }

}
