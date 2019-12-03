<h4 class="block">Services and Pricing </h4>
<table class="table table-bordered table-striped">
    <tr>
        <th>Service</th>
        <th>Pricing</th>
    </tr>
    @foreach($model->categories as $category)
        @if($category->pivot->amount !='0.00')
            <tr>
                <td>
                    <small>{{get_category_parents($category->uri)}}</small> <br>
                    {{$category->category}}
                </td>
                <td>{{format_currency($category->pivot->amount)}}</td>
            </tr>
        @endif
    @endforeach
</table>