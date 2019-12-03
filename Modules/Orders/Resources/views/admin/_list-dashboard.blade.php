<div class="portlet light">
    <div class="portlet-title">
        <div class="caption caption-md">
                        <span class="caption-subject theme-font-color bold">
                            Recent Requests
                        </span>
        </div>
        <div class="actions">
            <a href="{{route('admin.orders.index')}}" class="btn btn-circle red-sunglo btn-sm">
                <i class="fa fa-plus"></i> View All </a>
        </div>
    </div>
    <div class="portlet-body">
        @if($items = Orders::latest(5,['status']))
            <table class="table table-bordered indent-top-30">
                <tbody>
                <tr>
                    <th>Order #</th>
                    <th>Date</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                    <th></th>
                </tr>
                @foreach($items as $item)
                    <tr>
                        <td>{{$item->order_number}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>
                            {{$item->total}}
                        </td>
                        <td>{!! order_status_label($item->status->name,$item->status->color_class) !!}</td>
                        <td>{!! single_btn(route('admin.orders.show',$item->id)) !!}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-danger">
                No requests yet
            </div>
        @endif

    </div>
</div>