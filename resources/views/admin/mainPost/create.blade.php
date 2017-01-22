@extends('layouts.admin')

@section('content')
    <div class="row">

        <div class="col-md-12 col-lg-6 col-lg-offset-3">
            <div class="panel panel-default">
                <div class="panel-title">
                    Create New Main Slider
                    <ul class="panel-tools">
                        <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
                        <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
                        {{--<li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>--}}
                    </ul>
                </div>

                <div class="panel-body" style="display: block;">

                    {!! Form::open(array('url'   =>  route('admin.slider.main.store'), 'class'   =>  'form-horizontal', 'files' =>  true )) !!}

                    @include('admin.mainSlider.form',["submitButtonText" => "Create New Slider"])

                    {!! Form::close() !!}

                </div>
            </div>
        </div>

    </div>
@endsection

@section('secondaryScript')

@endsection