

@if($errors->has('title'))
    <div class="form-group has-error">
        @else
            <div class="form-group">
                @endif
                <label class="col-sm-2 control-label form-label">Title</label>
                <div class="col-sm-10">
                    {!! Form::text('title',old('title'),array('class' =>  'form-control', 'placeholder'   =>  'Title For Built-in-Featured Post', 'id'  =>  'title' )) !!}
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
                                {!! Form::textarea('intro',old('intro'),array('class' =>  'form-control', 'placeholder'   =>  'Intro of Built-in-Featured Post' , 'id'  =>  'intro')) !!}
                                @if($errors->has('intro'))
                                    <span id="helpBlock2" class="help-block">{{ $errors->first('intro') }}</span>
                                @endif
                            </div>
                        </div>

                        @if($errors->has('icon'))
                            <div class="form-group has-error">
                                @else
                                    <div class="form-group">
                                        @endif
                                        <label for="image" class="col-sm-2 control-label">Icon</label>
                                        <div class="col-sm-10">
                                            {!! Form::select('icon', $icons, $icon, ['placeholder' => 'Pick a Icon...']) !!}
                                            @if($errors->has('icon'))
                                                <span id="helpBlock2" class="help-block">{{ $errors->first('icon') }}</span>
                                            @endif
                                            <span id="helpBlock2" class="help-block">Must Select an icon</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" id="submit" class="btn btn-default">{{ $submitButtonText }}</button>
                                        </div>
                                    </div>
