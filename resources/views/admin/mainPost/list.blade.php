@extends('layouts.admin')

@section('content')
        <!-- Start Row -->
<div class="row">

    <!-- Start Panel -->
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-title">
                Main Posts
            </div>
            <div class="panel-body table-responsive">

                @if($mainPosts->count() > 0)
                    <table id="example0" class="table display">
                        <thead>
                        <tr>
                            <th>S.no</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Intro</th>
                            <th>Active</th>
                            <th>Last Updated at</th>
                            <th>Actions</th>
                        </tr>
                        </thead>

                        <tfoot>
                        <tr>
                            <th>S.no</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Intro</th>
                            <th>Active</th>
                            <th>Last Updated at</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>

                        <tbody>
                        <?php $sno = 0; ?>
                        @foreach($mainPosts as $post)
                            <tr>
                                <td>{{ ++$sno }}</td>
                                <td><img class="img-thumbnail" src="{{ asset($post->image->directory.'/'.$post->image->filename) }}"></td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->intro }}</td>
                                <td>
                                    @if($post->active)
                                        Yes
                                    @else
                                        No
                                    @endif
                                </td>
                                <td>
                                    @if(!is_null($post->updated_at))
                                        {{ $post->updated_at }}
                                    @else
                                        {{ $post->created_at }}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route("admin.homepage.main-post.edit",[$post->uniqueId]) }}"><button class="btn btn-primary" >Edit</button></a>
                                    <a href="{{ route("admin.homepage.main-post.destroy",[$post->uniqueId]) }}"><button class="btn btn-danger">Delete</button></a>
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