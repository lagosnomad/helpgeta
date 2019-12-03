@if(has_access('orders.edit'))
    {!! single_btn(route('admin.orders.show',$id)) !!}
@endif
{{--@if(has_access('orders.edit'))
    {!! edit_btn(route('admin.orders.edit',$id)) !!}
@endif--}}
{{--
@if(has_access('orders.destroy'))
    {!! delete_btn(route('ajax.orders.destroy',$id)) !!}
@endif--}}
