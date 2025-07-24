@extends('layouts.master')

@section('title', 'home')

@section('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endsection

@section('content')
    <div class="content-wrapper d-flex justify-content-center align-items-center">
        <!-- Edit Brand pages -->
        <div class="card card-primary w-50">
            <div class="card-header">
                <h3 class="card-title">Add New Unit</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('update.unit', $AllUnit->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        {{-- input  --}}
                        <label for="Unit_Name">Edit Unit</label>
                        <input type="input" class="form-control" id="Unit_Name" name="Unit_Name"
                            value="{{ $AllUnit->Unit_Name }}">

                        @if (session('error'))
                            <p class="text-danger">{{ session('error') }}</p>
                        @endif
                        
                        @error('Unit_Name')
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




@endsection
