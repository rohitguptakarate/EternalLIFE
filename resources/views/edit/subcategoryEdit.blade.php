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
            <!-- /.card-header -->
            <div class="card-header">
                <h3 class="card-title">Edit Sub Category</h3>
            </div>

            <!-- form start -->
            <form action="{{ route('update.sabCategory', $AllSubCategory->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="Sub_Category_Name">Sub Category Name</label>
                        <input type="input" class="form-control" id="Sub_Category_Name" name="Sub_Category_Name"
                            value="{{ $AllSubCategory->Sub_Category_Name }}">

                        @if (session('error'))
                            <p class="text-danger">{{ session('error') }}</p>
                        @endif

                        @error('Sub_Category_Name')
                            <div class="error-msg" style="color: red">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="Category_Name">Category Name</label>
                        <input type="input" class="form-control" id="Category_Name" name="Category_Name"
                            value="{{ $AllSubCategory->category->Category_Name }}">
                        @error('Category_Name')
                            <div class="error-msg" style="color: red">
                                {{ $message }}
                            </div>
                        @enderror
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
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>

    <script>
        $("#manageCategory").DataTable();
    </script>
@endsection
