<div class="panel">
    <div class="panel-heading">
        Services Offered
    </div>
    <div class="panel-body">
        @if($categories = Categories::all([],true))
            @foreach($categories->chunk(4) as $categories_chunk)
                <div class="columns">
                    @foreach($categories_chunk as $category)
                        <div class="column is-3">
                            <div class="field">
                                @if($model->has('artisan')->count() && $model->artisan->categories()->count())
                                    {!! Form::checkbox('artisan[categories][]',$category->id, $model->artisan->categories()->where('categories.id',$category->id)->count() ? true : false, ['class'=>'is-checkradio','id'=>'categoryCheckbox'.$loop->parent->index.'-'.$loop->index]) !!}
                                @else
                                    {!! Form::checkbox('artisan[categories][]',$category->id,false,['class'=>'is-checkradio','id'=>'categoryCheckbox'.$loop->parent->index.'-'.$loop->index]) !!}
                                @endif
                                <label for="categoryCheckbox{{$loop->parent->index.'-'.$loop->index}}">{{$category->category}}</label>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        @endif
    </div>
</div>