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
    <div class="content-wrapper d-flex justify-content-center align-items-center">
        <!-- Edit Brand pages -->
        <div class="card card-primary w-50 ">
            <div class="card-header">
                <h3 class="card-title">Edit Brand</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('upadte.brand', $Allbrand->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body ">
                    <div class="form-group ">
                        <label for="Brand_Name">Name</label>
                        <input type="input" class="form-control" id="Brand_Name" name="Brand_Name"
                            value="{{ $Allbrand->Brand_Name }}">



                        @error('Brand_Name')
                            <div class="error-msg" style="color: red">
                                {{ $message }}
                            </div>
                        @enderror

                        @if (session('error'))
                            <p class="text-danger ">{{ session('error') }}</p>
                        @endif


                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>

    </div>

@endsection

@section('scripts')

@endsection
