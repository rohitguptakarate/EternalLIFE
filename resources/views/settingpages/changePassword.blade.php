@extends('layouts.master')

@section('title', 'home')

@section('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">

        <div class="container-fluid d-flex justify-content-center align-items-center" style="min-height: 80vh;">
            <div class="login-box">
                <div class="card card-outline card-primary">
                    <div class="card-header text-center">
                        {{-- <a href="#" class="h1"><b>Eternal</b>LIFE</a> --}}
                        <p class="font-weight-bold text-muted">Change Password</p>
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="text-danger">{{ session('error') }}</div>
                        @endif

                        @if (session('success'))
                            <p class="text-success ">{{ session('success') }}</p>
                        @endif

                        <form action="{{ route('update.password') }}" method="post">
                            @csrf

                            <div class="mb-3">
                                <div class="input-group">
                                    <input type="password" class="form-control" placeholder="Old Password"
                                        name="oldPassword" id="oldPassword">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            {{-- <span class="fas fa-lock"></span> --}}
                                            <span class="fas fa-eye" id="toggleOldPassword" style="cursor: pointer;"></span>
                                        </div>

                                    </div>
                                </div>

                                @error('oldPassword')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>


                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Change Password"
                                    name="changePassword" id="changePassword">

                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        {{-- <span class="fas fa-lock"></span> --}}
                                        <span class="fas fa-eye" id="toggleChangePassword" style="cursor: pointer;"></span>
                                    </div>
                                </div>
                                @error('changePassword')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Confirm Password"
                                    name="confirmPassword" id="confirmPassword">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        {{-- <span class="fas fa-lock"></span> --}}
                                        <span class="fas fa-eye" id="toggleConfirmPassword" style="cursor: pointer;"></span>
                                    </div>
                                </div>
                                @error('confirmPassword')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-block">Change password</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>


                    </div>
                    <!-- /.login-card-body -->
                </div>
            </div>
            <!-- /.login-box -->
        </div>
    </div>

@endsection

@section('scripts')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('js/sweetsAlert.js ') }}"></script>
    <script src="{{ asset('js/showPassword.js') }}"></script>



    <script>
        $("#manageCategory").DataTable();
    </script>


@endsection
