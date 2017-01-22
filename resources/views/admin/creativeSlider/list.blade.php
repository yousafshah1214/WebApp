@extends('layouts.admin')

@section('content')
<!-- Start Row -->
    <div class="row">

        <!-- Start Panel -->
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-title">
                    Main Slider
                </div>
                <div class="panel-body table-responsive">

                    @if($mainSliders->count() > 0)
                        <table id="example0" class="table display">
                            <thead>
                            <tr>
                                <th>S.no</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Tag Line</th>
                                <th>Button</th>
                                <th>Button Text</th>
                                <th>Button Link</th>
                                <th>Featured</th>
                                <th>Last Updated at</th>
                                <th>Actions</th>
                            </tr>
                            </thead>

                            <tfoot>
                            <tr>
                                <th>S.no</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Tag Line</th>
                                <th>Button</th>
                                <th>Button Text</th>
                                <th>Button Link</th>
                                <th>Featured</th>
                                <th>Last Updated at</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>

                            <tbody>
                            <?php $sno = 0; ?>
                            @foreach($mainSliders as $slider)
                                <tr>
                                    <td>{{ ++$sno }}</td>
                                    <td><img class="img-thumbnail" src="{{ asset($slider->image->directory.'/'.$slider->image->filename) }}"></td>
                                    <td>{{ $slider->title }}</td>
                                    <td>{{ $slider->tagline }}</td>
                                    <td>
                                        @if($slider->button)
                                            Yes
                                        @else
                                            No
                                        @endif
                                    </td>
                                    <td>{{ $slider->buttonText }}</td>
                                    <td>{{ $slider->buttonUrl }}</td>
                                    <td>
                                        @if($slider->featured)
                                            Yes
                                        @else
                                            No
                                        @endif
                                    </td>
                                    <td>
                                        @if(!is_null($slider->updated_at))
                                            {{ $slider->updated_at }}
                                        @else
                                            {{ $slider->created_at }}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.slider.main.edit',[$slider->uniqueId]) }}"><button class="btn btn-primary" >Edit</button></a>
                                        <a href="{{ route('admin.slider.main.destroy',[$slider->uniqueId]) }}"><button class="btn btn-danger">Delete</button></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="well"> No Main Sliders added to website. Please Add one to make your website more attractive. </div>
                    @endif

                </div>

            </div>
        </div>
        <!-- End Panel -->

    </div>
<!-- End Row -->
@endsection

@section('secondaryScript')
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
    <script>
            $('#example0').dataTable();
    </script>
@endsection