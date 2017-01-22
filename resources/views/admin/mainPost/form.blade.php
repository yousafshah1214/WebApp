

    @if($errors->has('title'))
        <div class="form-group has-error">
    @else
        <div class="form-group">
    @endif
            <label class="col-sm-2 control-label form-label">Title</label>
            <div class="col-sm-10">
                {!! Form::text('title',old('title'),array('class' =>  'form-control', 'placeholder'   =>  'Title For Main Post of Homepage', 'id'  =>  'title' )) !!}
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
            <label class="col-sm-2 control-label form-label">Intro</label>
            <div class="col-sm-10">
                {!! Form::text('intro',old('intro'),array('class' =>  'form-control', 'placeholder'   =>  'Intro of Main Post' , 'id'  =>  'intro')) !!}
                @if($errors->has('intro'))
                    <span id="helpBlock2" class="help-block">{{ $errors->first('intro') }}</span>
                @endif
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
                <span id="helpBlock2" class="help-block">Upload New Image If you want previous Image to be change. Its not reversible!</span>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" id="submit" class="btn btn-default">{{ $submitButtonText }}</button>
            </div>
        </div>
