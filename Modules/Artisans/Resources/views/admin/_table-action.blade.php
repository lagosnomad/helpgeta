
{{--{!! single_btn(route('admin.artisans.index',$id)) !!}--}}

@if(has_access('artisans.edit'))
    {!! edit_btn(route('admin.artisans.edit',$id)) !!}
@endif
@if(has_access('artisans.destroy'))
    {!! delete_btn(route('admin.artisans.destroy',$id)) !!}
@endif