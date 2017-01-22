

    @if($errors->has('title'))
        <div class="form-group has-error">
    @else
        <div class="form-group">
    @endif
            <label class="col-sm-2 control-label form-label">Title</label>
            <div class="col-sm-10">
                {!! Form::text('title',old('title'),array('class' =>  'form-control', 'placeholder'   =>  'Title for Image', 'id'  =>  'title' )) !!}
                @if($errors->has('title'))
                    <span id="helpBlock2" class="help-block">{{ $errors->first('title') }}</span>
                @endif
            </div>
        </div>

    @if($errors->has('intro'))
        <div class="form-group has-error">
    @else
        <div class="form-group">
    @endif
            <label class="col-sm-2 control-label form-label">Tag Line</label>
            <div class="col-sm-10">
                {!! Form::text('intro',old('intro'),array('class' =>  'form-control', 'placeholder'   =>  'Description/Intro for Image' , 'id'  =>  'tagline')) !!}
                @if($errors->has('intro'))
                    <span id="helpBlock2" class="help-block">{{ $errors->first('intro') }}</span>
                @endif
            </div>
        </div>

        @if($errors->has('active'))
            <div class="form-group has-error">
        @else
            <div class="form-group">
        @endif
            <div class="checkbox checkbox-primary col-sm-10 col-sm-offset-2">
                {!! Form::checkbox('active', true, old('active'),array('id'   =>  'checkboxFeatured')) !!}
                <label for="checkboxFeatured">
                    Featured
                    @if($errors->has('active'))
                        <span id="helpBlock2" class="help-block">{{ $errors->first('active') }}</span>
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
                <button type="submit" id="submit" class="btn btn-default">{{ $submitButtonText }}</button>
            </div>
        </div>
