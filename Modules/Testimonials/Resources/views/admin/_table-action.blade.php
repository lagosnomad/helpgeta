{{--@if(has_access('testimonials.edit'))
    {!! edit_btn(route('admin.testimonials.show',$id)) !!}
@endif--}}
@if(has_access('testimonials.edit'))
    {!! edit_btn(route('admin.testimonials.edit',$id)) !!}
@endif
@if(has_access('testimonials.destroy'))
    {!! delete_btn(route('admin.testimonials.destroy',$id)) !!}
@endif