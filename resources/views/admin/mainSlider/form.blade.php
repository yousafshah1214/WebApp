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

    @if($errors->has('title'))
        <div class="form-group has-error">
    @else
        <div class="form-group">
    @endif
            <label class="col-sm-2 control-label form-label">Title</label>
            <div class="col-sm-10">
                {!! Form::text('title',old('title'),array('class' =>  'form-control', 'placeholder'   =>  'Title For Slider', 'id'  =>  'title' )) !!}
                @if($errors->has('title'))
                    <span id="helpBlock2" class="help-block">{{ $errors->first('title') }}</span>
                @endif
            </div>
        </div>

    @if($errors->has('tagline'))
        <div class="form-group has-error">
    @else
        <div class="form-group">
    @endif
            <label class="col-sm-2 control-label form-label">Tag Line</label>
            <div class="col-sm-10">
                {!! Form::text('tagline',old('tagline'),array('class' =>  'form-control', 'placeholder'   =>  'Tag Line for Slider' , 'id'  =>  'tagline')) !!}
                @if($errors->has('tagline'))
                    <span id="helpBlock2" class="help-block">{{ $errors->first('tagline') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="checkbox checkbox-primary col-sm-10 col-sm-offset-2">
                {!! Form::checkbox('button', true,old('button'),array('id'    =>  'checkbox102')) !!}
                <label for="checkbox102">
                    Check to enable button for this slider.
                </label>
            </div>
        </div>

        @if($errors->has('buttonText'))
            <div class="form-group has-error">
        @else
            <div class="form-group">
        @endif
            <label class="col-sm-2 control-label form-label">Button Text</label>
            <div class="col-sm-10">
                {!! Form::text('buttonText',old('buttonText'), array('id' => 'buttonText','class' => 'form-control', 'placeholder' => "Text to be shown on button in slider")) !!}
            @if($errors->has('buttonText'))
                <span id="helpBlock2" class="help-block">{{ $errors->first('buttonText') }}</span>
            @endif
            </div>
        </div>

        @if($errors->has('buttonUrl'))
            <div class="form-group has-error">
        @else
            <div class="form-group">
        @endif
            <label class="col-sm-2 control-label form-label">URL</label>
            <div class="col-sm-10">
                    {!! Form::text('buttonUrl',old('buttonUrl'), array('id' => 'buttonUrl','class' => 'form-control', 'placeholder' => "Button Redirecting Url" )) !!}
                @if($errors->has('buttonUrl'))
                    <span id="helpBlock2" class="help-block">{{ $errors->first('buttonUrl') }}</span>
                @endif
            </div>
        </div>

        @if($errors->has('featured'))
            <div class="form-group has-error">
        @else
            <div class="form-group">
        @endif
            <div class="checkbox checkbox-primary col-sm-10 col-sm-offset-2">
                {!! Form::checkbox('featured', true, old('featured'),array('id'   =>  'checkboxFeatured')) !!}
                <label for="checkboxFeatured">
                    Featured
                    @if($errors->has('featured'))
                        <span id="helpBlock2" class="help-block">{{ $errors->first('featured') }}</span>
                    @endif
                </label>
            </div>
        </div>

        @if($errors->has('image'))
            <div class="form-group has-error">
        @else
            <div class="form-group">
        @endif
            <label for="image" class="col-sm-2 control-label">Image</label>
            <div class="col-sm-10">
                {!! Form::file('image',array('class' => 'form-control', 'id' => 'image', 'placeholder'   =>  'Upload Image')) !!}
                @if($errors->has('image'))
                    <span id="helpBlock2" class="help-block">{{ $errors->first('image') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" id="submit" class="btn btn-default">Create New Slider</button>
            </div>
        </div>

    {!! Form::close() !!}

</div>
