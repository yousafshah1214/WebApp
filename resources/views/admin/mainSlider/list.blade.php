@extends('admin.layouts.master')

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

                    <table id="example0" class="table display">
                        <thead>
                        <tr>
                            <th>S.no</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Tag Line</th>
                            <th>Button Text</th>
                            <th>Button Link</th>
                            <th>Actions</th>
                        </tr>
                        </thead>

                        <tfoot>
                        <tr>
                            <th>S.no</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Tag Line</th>
                            <th>Button Text</th>
                            <th>Button Link</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>

                        <tbody>
                        <tr>
                            <td>1</td>
                            <td><img class="img-thumbnail" src="{{ public_path('build/adminAssets/img/example1.jpg') }}"></td>
                            <td>Title for Slider</td>
                            <td>Tag Line for silder</td>
                            <td>Learn More</td>
                            <td>{{ route('admin.search') }}</td>
                            <td><button class="btn btn-primary" href="{{ url('admin/main-slider/action/uniquekey') }}">Edit</button> <button class="btn btn-danger" href="{{ url('admin/main-slider/action/uniquekey') }}">Delete</button></td>
                        </tr>
                        </tbody>
                    </table>


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