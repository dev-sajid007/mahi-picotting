@extends('layouts.backend.app')
@push('css')
    <!--For Breadcrumb-->
    <link href="{{asset("assets/backend/css/elements/breadcrumb.css")}}" rel="stylesheet" type="text/css" />
    <!--For Card-->
    <link href="{{asset("assets/backend/css/components/cards/card.css")}}" rel="stylesheet" type="text/css" />
    <!--For Data-Table-->

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
                                        <h6>View User</h6>
                                    </div>
                                    <div class="col-md-6 pl-0 col-sm-6 col-12 text-right">
                                        <a href="{{route('app.users.index')}}"  class="btn-shadow mr-3 btn btn-danger">
                                            <i class="fa fa-arrow-left"></i> Back to list
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <!--card header end-->
                            <div class="progress-order-body mt-3">
                                <div class="row">

                                    <div class="col-md-3">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body">
                                                <img width="220" class="img-thumbnail"  src="/ImageUpload/UserImage/{{isset($user)? $user->image:'default.png'}}" alt="User Image">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-9">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body">
                                                <table class="table table-bordered">
                                                    <tbody>
                                                    <tr>
                                                        <th>Name:</th>
                                                        <td>{{$user->name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Email:</th>
                                                        <td>{{$user->email}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Role:</th>
                                                        <td><div class="badge badge-primary">{{$user->role->name}}</div></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Status:</th>
                                                        <td>
                                                            @if($user->status == true)
                                                                <div class="badge badge-primary">Active</div>
                                                            @else
                                                                <div class="badge badge-danger">Inctive</div>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Modified At:</th>
                                                        <td>{{$user->updated_at->diffForHumans()}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Joined At:</th>
                                                        <td>{{$user->created_at->diffForHumans()}}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

@endpush
