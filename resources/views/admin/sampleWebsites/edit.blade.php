@extends('layouts.admin')

@section('content')
    <div class="row">

        <div class="col-md-12 col-lg-6 col-lg-offset-3">
            <div class="panel panel-default">
                <div class="panel-title">
                    Edit Main Slider
                    <ul class="panel-tools">
                        <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
                        <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
                        {{--<li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>--}}
                    </ul>
                </div>

                <div class="panel-body" style="display: block;">

                    {!! Form::model($sampleWebsite,array('method' => 'PATCH','route'   =>  ['admin.homepage.website.sample.update',$sampleWebsite->uniqueId], 'class'   =>  'form-horizontal', 'files' =>  true )) !!}

                        @include('admin.sampleWebsites.form',["submitButtonText" => "Update Sample Website Post"])

                    {!! Form::close() !!}

                </div>
            </div>
        </div>

    </div>
@endsection

@section('secondaryScript')

@endsection