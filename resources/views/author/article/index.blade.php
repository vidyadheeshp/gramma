@extends('admin.layouts.master')
@section('title', $title)
@section('content')

<!-- Start Content-->
<div class="container-fluid">
    
    <!-- start page title -->
    <!-- Include page breadcrumb -->
    @include('admin.inc.breadcrumb')
    <!-- end page title --> 


    <div class="row">
        <div class="col-12">
            <!-- Add modal button -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add New</button>
            <!-- Include Add modal -->
            @include('author.'.$url.'.create')

            <a href="{{ URL::route('author.'.$url.'.index') }}" class="btn btn-info">Refresh</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12 row">
            <div class="card col-md-3">
                <div class="card-header text-white" style="background-color : #00AA9E">
                    <i class="fa fa-edit"></i>
                </div>

                <div class="card-body">
                  <h4 class="header-title">Proof Reading And Editing</h4>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#service1addModal">Proceed</button>
                    <!-- Include Service 1 Add modal -->
                    @include('author.'.$url.'.service1')
                </div>
            </div>
            <div class="card  col-md-3">
                <div class="card-header text-white" style="background-color : #00AA9E">
                    <i class="far fa-clone"></i>
                </div>

                <div class="card-body">
                  <h4 class="header-title">Paraphrasing and ReWritting</h4>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#service2addModal">Proceed</button>
                    <!-- Include Service 2 Add modal -->
                    @include('author.'.$url.'.service2')
                </div>
            </div>
            <div class="card col-md-3">
                <div class="card-header text-white" style="background-color : #00AA9E">
                    <i class="fas fa-pen"></i>
                </div>

                <div class="card-body">
                  <h4 class="header-title">Content Writting Service</h4>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#service3addModal">Proceed</button>
                    <!-- Include Service 3 Add modal -->
                    @include('author.'.$url.'.service3')
                </div>
            </div>
            <div class="card col-md-3" >
                <div class="card-header text-white" style="background-color : #00AA9E">
                    <i class="fa fa-language" aria-hidden="true"></i>
                </div>

                <div class="card-body">
                  <h4 class="header-title">Translation Service</h4>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#service3addModal">Proceed</button>
                    <!-- Include Service 3 Add modal -->
                    @include('author.'.$url.'.service4')
                </div>
            </div>
        </div>    
        <div class="clearfix"></div>    
        <div class="col-12">  
            <div class="card">
                <div class="card-header">
                    <!-- Include Flash Messages -->
                    @include('admin.inc.message')
                </div>

                <div class="card-body">
                  <h4 class="header-title">{{ $title }} List</h4>

                  <!-- Data Table Start -->
                  <div class="table-responsive">
                    <table id="basic-datatable" class="table table-striped table-hover nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <!--th>Category</th-->
                                <!--th>Submit Status</th-->
                                <th>Review Status</th>
                                <!--th>Status</th-->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach( $rows as $key => $row )
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $row->title }}</td>
                                <!--td>{{ $row->category->title }}</td-->
                                <!--td>
                                    @if( $row->upload_status == 1 )
                                    <span class="badge badge-default badge-pill">New Upload</span>
                                    @elseif( $row->upload_status == 2 )
                                    <span class="badge badge-default badge-pill">Resubmit</span>
                                    @endif
                                </td-->
                                <td>
                                    <!-- 1 : New Request , 2: Work in Progress, 3: Pending Acceptance 4: Closed-->
                                    @if( $row->review_status == 1 )
                                    <span class="badge badge-success badge-pill">New Request</span>
                                    @elseif( $row->review_status == 2 )
                                    <span class="badge badge-primary badge-pill">Work in Progress</span>
                                    @elseif( $row->review_status == 3 )
                                    <span class="badge badge-warning badge-pill">Pending Acceptance</span>
                                    @else
                                    <span class="badge badge-danger badge-pill">Closed</span>
                                    @endif
                                </td>
                                <!--td>
                                    @if( $row->status == 1 )
                                    <span class="badge badge-success badge-pill">Active</span>
                                    @else
                                    <span class="badge badge-danger badge-pill">Inactive</span>
                                    @endif
                                </td-->
                                <td>
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#showModal-{{ $row->id }}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <!-- Include Show modal -->
                                    @include('author.'.$url.'.show')

                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal-{{ $row->id }}">
                                        <i class="far fa-edit"></i>
                                    </button>
                                    <!-- Include Edit modal -->
                                    @include('author.'.$url.'.edit')

                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal-{{ $row->id }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                    <!-- Include Delete modal -->
                                    @include('admin.inc.delete')
                                </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                  </div>
                  <!-- Data Table End -->

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->

    
</div> <!-- container -->
<!-- End Content-->

@endsection