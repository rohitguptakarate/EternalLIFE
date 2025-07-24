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
                            <h3 class="card-title">Add New Brand</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('add.Brand') }}" method="post" class="add-brand">
                            @csrf
                            <div class="card-body">
                                {{-- success msg --}}
                                @if (session('success'))
                                    <p class="text-success ">{{ session('success') }}</p>
                                @endif
                                <div class="form-group">
                                    <label for="Brand_Name">Name</label>
                                    <input type="input" class="form-control" id="Brand_Name" name="Brand_Name"
                                        placeholder="Enter Brand Name" value="{{ old('Brand_Name') }}">


                                    @if (session('error'))
                                        <p class="text-danger ">{{ session('error') }}</p>
                                    @endif

                                    @error('Brand_Name')
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
                            <h3 class="card-title">Manage Brand</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="manageCategory" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Brand</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allBrandData as $brand)
                                        <tr>
                                            <td>{{ $brand->Brand_Name }}</td>
                                            <td>
                                                {{-- this is use for encrypt  --}}
                                                <a href="{{ route('edit.brand.page', encrypt($brand->id)) }}">Update</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
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

    <script src="{{ asset('js/sweetsAlert.js ') }}"></script>



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
