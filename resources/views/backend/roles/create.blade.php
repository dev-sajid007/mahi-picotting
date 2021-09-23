@extends('layouts.backend.app')
@push('css')
    <!--For Breadcrumb-->
    <link href="{{asset("assets/backend/css/elements/miscellaneous.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{asset("assets/backend/css/elements/breadcrumb.css")}}" rel="stylesheet" type="text/css" />
    <!--For Card-->
    <link href="{{asset("assets/backend/css/scrollspyNav.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{asset("assets/backend/css/components/cards/card.css")}}" rel="stylesheet" type="text/css" />

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
                                <li class="mb-2"><a href="{{route('app.dashboard')}}">Dashboard</a></li>
                                <li class="active mb-2"><a href="{{route('app.roles.create')}}">Create Role</a></li>
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
                                        <h6>Create Role</h6>
                                    </div>
                                    <div class="col-md-6 pl-0 col-sm-6 col-12 text-right">
                                        <a href="{{route('app.roles.index')}}"  class="btn-shadow mr-3 btn btn-danger">
                                            <i class="fa fa-arrow-left"></i> Back to list
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <!--card header end-->
                            <div class="progress-order-body mt-3">

                                <form method="POST" action="{{isset($role)? route('app.roles.update',$role->id): route('app.roles.store')}}">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name">Role Name</label>
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $role->name ?? old('name') }}"  autofocus>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>

                                        <div class="text-center">
                                            <h4 class="pb-2"><b>Manage Permission for Role</b></h4>
                                            @error('permissions')
                                            <p class="p-2">
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            </p>
                                            @enderror
                                        </div>

                                        @forelse($modules->chunk(2) as $key => $chunks)
                                            <div class="form-row">
                                                @foreach($chunks as  $key=>$module)
                                                    <div class="col" style="border: 1px solid #efefef;padding: 10px">
                                                        <h5>Module: <span style="color: #3F6AD8">{{$module->name}}</span></h5>

                                                        @foreach($module->permissions as $key => $permission)
                                                            <div class="mb-3 ml-4">
                                                                <div class="custom-control custom-checkbox mr-sm-2">
                                                                    <input type="checkbox" class="custom-control-input"
                                                                           id="permission-{{ $permission->id }}"
                                                                           name="permissions[]"
                                                                           value="{{$permission->id}}"
                                                                    @isset($role)
                                                                        @foreach($role->permissions as $rPermission)
                                                                            {{$permission->id == $rPermission->id ? 'checked' : ''}}
                                                                            @endforeach
                                                                        @endisset
                                                                    >
                                                                    <label class="custom-control-label" for="permission-{{ $permission->id }}">{{$permission->name}}</label>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endforeach
                                            </div>
                                        @empty
                                            <div class="row">
                                                <div class="col text-center">
                                                    <strong>No Module Found</strong>
                                                </div>
                                            </div>
                                        @endforelse
                                        <button type="submit" class="btn btn-primary" style="margin-top: 10px">
                                            @isset($role)
                                                <i class="fas fa-arrow-circle-up"></i>
                                                Update
                                            @else
                                                <i class="fa fa-plus-circle"></i>
                                                Create
                                            @endisset
                                        </button>
                                    </div>
                                </form>
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
