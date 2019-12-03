@if(has_access('banks.edit'))
    {!! edit_btn(route('admin.banks.show',$id)) !!}
@endif
@if(has_access('banks.edit'))
    {!! edit_btn(route('admin.banks.edit',$id)) !!}
@endif
@if(has_access('banks.destroy'))
    {!! delete_btn(route('admin.banks.destroy',$id)) !!}
@endif