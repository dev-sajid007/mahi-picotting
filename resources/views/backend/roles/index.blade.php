@extends('layouts.backend.app')
@push('css')
    <!--For Breadcrumb-->
    <link href="{{asset("assets/backend/css/elements/miscellaneous.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{asset("assets/backend/css/elements/breadcrumb.css")}}" rel="stylesheet" type="text/css" />
    <!--For Card-->
    <link href="{{asset("assets/backend/css/scrollspyNav.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{asset("assets/backend/css/components/cards/card.css")}}" rel="stylesheet" type="text/css" />
    <!--For Data-Table-->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <style>
        .mt-3{
            margin-top: 28px!important;
        }
    </style>
@endpush
@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="breadcrumb-five">
                            <ul class="breadcrumb">
                                <li class="mb-2"><a href="javscript:void(0);">Home</a>
                                </li>
                                <li class="active mb-2"><a href="javscript:void(0);">Components</a></li>
                                <li class="mb-2"><a href="javscript:void(0);">UI Kit</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="card component-card_8 mt-4">
                    <div class="card-body">
                        <div class="progress-order">
                            <!--card header start-->
                            <div class="progress-order-header">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-12">
                                        <h6><i class="fas fa-user-tag"></i> Role Management </h6>
                                    </div>
                                    <div class="col-md-6 pl-0 col-sm-6 col-12 text-right">
                                        <a href="{{route('app.roles.create')}}"  class="btn-shadow mr-3 btn btn-dark">
                                            <i class="fa fa-plus-circle"></i> Create Role
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <!--card header end-->
                            <div class="progress-order-body mt-3">
                                <table id="myTable" class="table table-striped table-responsive-sm">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Permissions</th>
                                            <th class="text-center">Updated at</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($roles as $key => $role)
                                        <tr>
                                            <td class="text-center text-muted">{{$key+1}}</td>
                                            <td class="text-center">{{$role->name}}</td>
                                            <td class="text-center">
                                                @if($role->permissions->count() > 0)
                                                    <div class="badge badge-success">{{$role->permissions->count()}}</div>
                                                @else
                                                    <div class="badge badge-danger">No Permission Found :)</div>
                                                @endif
                                            </td>
                                            <td class="text-center">{{$role->updated_at->diffForHumans()}}</td>

                                            <td class="text-center">
                                                    <a href="{{route('app.roles.edit',$role->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                                    <a id="delete" href="{{route('app.roles.delete',$role->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
@endpush
