@if (session()->has('success'))
    <alert type="is-success">
        {{session('success')}}
    </alert>
@endif

@if (session()->has('error'))
    <alert type="is-danger">
        {{session('error')}}
    </alert>
@endif

@if (count($errors) > 0)
    <alert type="is-danger">
        @foreach($errors->all() as $errors)
            {{$errors}} <br>
        @endforeach
    </alert>
@endif