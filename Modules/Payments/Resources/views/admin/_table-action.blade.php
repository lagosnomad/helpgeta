@if(has_access('payments.edit'))
    {!! edit_btn(route('admin.payments.show',$id)) !!}
@endif
@if(has_access('payments.edit'))
    {!! edit_btn(route('admin.payments.edit',$id)) !!}
@endif
@if(has_access('payments.destroy'))
    {!! delete_btn(route('admin.payments.destroy',$id)) !!}
@endif