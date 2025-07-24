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
        <div class="container-fluid">
            <div class="row py-3">
                <div class="col-md-4">
                    <!-- general form elements -->
                    <div class="card card-primary ">
                        <div class="card-header">
                            <h3 class="card-title">Add New Category</h3>
                        </div>



                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('add.Category') }}" method="post">
                            @csrf
                            <div class="card-body">

                                {{-- success msg --}}
                                @if (session('success'))
                                    <p class="text-success">{{ session('success') }}</p>
                                @endif

                                <div class="form-group">
                                    <label for="category">Name</label>
                                    <input type="input" class="form-control" id="category" name="Category_Name"
                                        placeholder="Enter Category Name" value="{{ old('Category_Name') }}">


                                    @if (session('error'))
                                        <p class="text-danger">{{ session('error') }}</p>
                                    @endif


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

                <div class="col-md-8">
                    {{-- card 2  --}}
                    <div class="card  card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Manage Category</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="manageCategory" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($AllCategoryData as $item)
                                        <tr>
                                            <td>{{ $item->Category_Name }}</td>
                                            <td> <a href="{{ route('edit.category.page', encrypt($item->id)) }}">Update</a>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
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

        // $(function() {
        //     $("#example1").DataTable({
        //         "responsive": true,
        //         "lengthChange": false,
        //         "autoWidth": false,
        //         // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        //     }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        //     $('#example2').DataTable({
        //         "paging": true,
        //         "lengthChange": false,
        //         "searching": false,
        //         "ordering": true,
        //         "info": true,
        //         "autoWidth": false,
        //         "responsive": true,
        //     });
        // });
    </script>
@endsection
