@if(has_access('coupons.show'))
    {!! edit_btn(route('admin.coupons.show',$id)) !!}
@endif
@if(has_access('coupons.edit'))
    {!! edit_btn(route('admin.coupons.edit',$id)) !!}
@endif
@if(has_access('coupons.destroy'))
    {!! delete_btn(route('admin.coupons.destroy',$id)) !!}
@endif