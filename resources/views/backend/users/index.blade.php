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
                                <li class=" mb-2"><a href="javscript:void(0);">Components</a></li>
                                <li class="active mb-2"><a href="javscript:void(0);">User List</a></li>
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
                                        <h6><i class="fa fa-user"></i> User Management</h6>
                                    </div>
                                    <div class="col-md-6 pl-0 col-sm-6 col-12 text-right">
                                        <a href="{{route('app.users.create')}}"  class="btn-shadow mr-3 btn btn-dark">
                                            <i class="fa fa-plus-circle"></i> Create User
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <!--card header end-->
                            <div class="progress-order-body mt-3">

                                <table id="myTable" class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Joined At</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $key => $user)
                                        <tr>
                                            <td class="text-center" >{{$key+1}}</td>
                                            <td class="text-center" >
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left">
                                                            <img width="48" class="rounded-circle" src="/ImageUpload/UserImage/{{isset($user->image)?$user->image:'default.png'}}" alt="User Image">
                                                        </div>
                                                        <div class="widget-content-left flex2">
                                                            <div class="widget-heading">{{$user->name}}</div>
                                                            <div class="widget-subheading">
                                                                @if($user->role)
                                                                    <div class="badge badge-primary">{{$user->role->name}}</div>
                                                                @else
                                                                    <div class="badge badge-danger">No Role Found :)</div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </td>
                                            <td class="text-center">{{$user->email}}</td>
                                            <td class="text-center">
                                                @if($user->status == true)
                                                    <div class="badge badge-primary">Active</div>
                                                @else
                                                    <div class="badge badge-danger">Inactive</div>
                                                @endif
                                            </td>
                                            <td class="text-center" >{{$user->created_at->diffForHumans()}}</td>
                                            <td class="text-center">
                                                <a href="{{route('app.users.show',$user->id)}}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                                @if(Auth::user()->hasPermission('app.users.edit'))
                                                    <a href="{{route('app.users.edit',$user->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                                @endif
                                                @if(Auth::user()->hasPermission('app.users.delete'))
                                                    <a id="delete" href="{{route('app.users.delete',$user->id)}}" class="btn btn-danger"><i class="fa fa-trash-alt"></i></a>
                                                @endif
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
