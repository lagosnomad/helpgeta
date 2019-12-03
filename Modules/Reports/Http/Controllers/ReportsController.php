<?php namespace Modules\Reports\Http\Controllers;

use Modules\Core\Http\Controllers\BaseAdminController;
use Modules\Reports\Http\Requests\FormRequest;
use Modules\Reports\Repositories\ReportInterface as Repository;
use Modules\Reports\Entities\Report;

class ReportsController extends BaseAdminController {

    public function __construct(Repository $repository)
    {
        parent::__construct($repository);
    }

    public function index()
    {
        $title = trans('reports::global.group_name');
        $module = 'reports';

        $start_date = request('start_date') ? request('start_date') : \Carbon\Carbon::now()->format('Y-m-d');
        $end_date = request('end_date') ? request('end_date') : \Carbon\Carbon::now()->format('Y-m-d');

        $start = \Carbon\Carbon::createFromFormat('Y-m-d',$start_date);
        $end = \Carbon\Carbon::createFromFormat('Y-m-d',$end_date);

        if($start->greaterThan($end)){
            return redirect()->back()->withError('Start date cannot be greater than end date, please add a valid date');
        }

        $form = $this->form(config('reports.form'), [
            'method' => 'GET',
            'url' => route('admin.reports.index')
        ]);


        return view('reports::admin.index')
            ->with(compact('title', 'module','start_date','end_date','form'));
    }

}
