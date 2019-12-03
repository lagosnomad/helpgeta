@if(has_access('identifications.edit'))
    {!! edit_btn(route('admin.identifications.show',$id)) !!}
@endif
@if(has_access('identifications.edit'))
    {!! edit_btn(route('admin.identifications.edit',$id)) !!}
@endif
@if(has_access('identifications.destroy'))
    {!! delete_btn(route('admin.identifications.destroy',$id)) !!}
@endif