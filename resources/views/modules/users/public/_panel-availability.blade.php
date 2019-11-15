<div class="panel">
    <div class="panel-heading">
        Availability
    </div>
    <div class="panel-body">
        <div class="field">
            {!! Form::checkbox('artisan[is_available]',true,true,['class'=>'switch ','id'=>'toggleAvailable']) !!}
            <label for="toggleAvailable">Available to accept requests</label>
        </div>
        <hr>
        <div class="days-selectior">
            @foreach(get_days() as $day)
                <div class="columns is-narrow">
                    <div class="column is-2">
                        <div class="field">
                            {!! Form::checkbox('artisan[days_available][]',strtolower($day),false,['class'=>'is-checkradio','id'=>'dayCheckbox'.$loop->index]) !!}
                            <label for="dayCheckbox{{$loop->index}}">{{$day}}</label>
                        </div>
                    </div>
                    <div class="column is-4">
                        <div class="field has-addons">
                            <p class="control has-icon-left">
                                <a class="button is-static is-small">
                                    <span class="icon"><i class="fa fa-clock-o"></i></span></a>
                            </p>
                            <p class="control">
                                <input class="input is-small" type="text" placeholder="From">
                            </p>

                            <p class="control">
                                <input class="input is-small" type="text" placeholder="To">
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>