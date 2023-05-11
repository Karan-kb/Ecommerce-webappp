@extends('layouts.backend') @section('title','Tag') @section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tag Management</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Tag</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tag Details</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    

                    <tr>
                        <th>Title</th>
                        <td>{{$tag->title}}</td>
                    </tr>

                    <tr>
                        <th>Slug</th>
                        <td>{{$tag->slug}}</td>
                    </tr>
                    <tr>
                        <th>Created By</th>
                        <td>{{DB::table('users')->where('id', $tag->created_by)->value('name')}}</td>
                    </tr>

                    <tr>
                        <th>Updated By</th>
                        <td>{{DB::table('users')->where('id', $tag->updated_by)->value('name')}}</td>
                    </tr>

                    <tr>
                        <th>Deleted At</th>
                        <td>{{$tag->deleted_at}}</td>
                    </tr>

                    <tr>
                        <th>Created At</th>
                        <td>{{$tag->created_at}}</td>





                    </tr>

                </thead>
               
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->
@endsection