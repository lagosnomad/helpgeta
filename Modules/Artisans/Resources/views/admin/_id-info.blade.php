<h4 class="block">Means of Identification </h4>
<table class="table table-bordered table-striped">
    <tr>
        <td style="width:30%"><strong>Identification Type</strong></td>
        <td>{{$model->identification->title or 'N/A'}}</td>
    </tr>
    <tr>
        <td><strong>Uploaded Document</strong></td>
        <td>
            @if($model->identification_file !='')
                <a href="{{asset('uploads/identifications/'.$model->identification_file)}}" class="btn btn-primary" target="_blank"> <i class="fa fa-download"></i> View Document</a>
            @else
                No document uploaded yet
            @endif
        </td>
    </tr>

</table>