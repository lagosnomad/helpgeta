<h4 class="block">Basic</h4>
<table class="table table-bordered table-striped">
    <tr>
        <td style="width:30%"><strong>Activated?</strong></td>
        <td>{!! artisan_status_label($model->is_activated) !!}</td>
    </tr>
    <tr>
        <td><strong>Verified?</strong></td>
        <td>{!! artisan_status_label($model->is_verified) !!}</td>
    </tr>
    <tr>
        <td><strong>Email Address</strong></td>
        <td>{{$model->user->email}}</td>
    </tr>
    <tr>
        <td><strong>Phone Number</strong></td>
        <td>{{$model->user->phone}}</td>
    </tr>
    <tr>
        <td><strong>Address</strong></td>
        <td>
            @if($model->user->address != '')
                {{$model->user->address}}  <br>
                {{$model->user->city->name or ''}}, {{$model->user->state->name or ''}}
            @endif
        </td>
    </tr>
    <tr>
        <td><strong>Short Bio</strong></td>
        <td>
            {{$model->bio}}
        </td>
    </tr>
</table>