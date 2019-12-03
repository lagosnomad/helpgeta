@if(has_access('reports.edit'))
    {!! edit_btn(route('admin.reports.show',$id)) !!}
@endif
@if(has_access('reports.edit'))
    {!! edit_btn(route('admin.reports.edit',$id)) !!}
@endif
@if(has_access('reports.destroy'))
    {!! delete_btn(route('admin.reports.destroy',$id)) !!}
@endif