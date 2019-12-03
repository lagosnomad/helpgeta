@if(has_access('cities.show'))
    {!! edit_btn(route('admin.cities.show',$id)) !!}
@endif
@if(has_access('cities.edit'))
    {!! edit_btn(route('admin.cities.edit',$id)) !!}
@endif
@if(has_access('cities.destroy'))
    {!! delete_btn(route('admin.cities.destroy',$id)) !!}
@endif