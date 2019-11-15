
{{--{!! single_btn(route('admin.categories.index',$id)) !!}--}}

@if(has_access('categories.edit'))
    {!! edit_btn(route('admin.categories.edit',$category_id)) !!}
@endif
@if(has_access('categories.destroy'))
    {!! delete_btn(route('admin.categories.destroy',$category_id)) !!}
@endif