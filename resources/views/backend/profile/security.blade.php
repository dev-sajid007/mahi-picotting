@extends('layouts.backend.app')
@push('css')
    <!--For Breadcrumb-->
    <link href="{{asset("assets/backend/css/elements/breadcrumb.css")}}" rel="stylesheet" type="text/css" />
    <!--For Card-->
    <link href="{{asset("assets/backend/css/components/cards/card.css")}}" rel="stylesheet" type="text/css" />
    <!--For Data-Table-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .dropify-wrapper .dropify-message p{
            font-size: initial;
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
                                <li class="mb-2"><a href="{{route('app.dashboard')}}">Home</a>
                                </li>
                                <li class=" mb-2"><a href="{{route('app.dashboard')}}">Dashboard</a></li>
                                <li class="active mb-2"><a href="javscript:void(0);">Profile</a></li>
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
                                        <h6><i class="fas fa-user"></i> User Profile </h6>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <!--card header end-->
                            <div class="progress-order-body mt-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md4">
                                            @if(Session::has('message'))
                                                <p class="alert alert-danger">{{ Session::get('message') }}</p>
                                            @endif
                                        </div>
                                        <form method="POST" action="{{ route('app.profile.password.update') }}" >
                                            @csrf
                                            <div class="form-group row">
                                                <label for="current_password" class="col-md-4 col-form-label text-md-right">{{ __('Current Password') }}</label>

                                                <div class="col-md-6">
                                                    <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" >

                                                    @error('current_password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>

                                                <div class="col-md-6">
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                                <div class="col-md-6">
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                                                </div>
                                            </div>

                                            <div class="form-group row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="fas fa-arrow-circle-up"></i>
                                                        <span>Update</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>

        $(document).ready(function() {
            //Dropify Image Upload
            $('.dropify').dropify();
            //Select2
            $('.select2').select2();
        });
    </script>
@endpush
