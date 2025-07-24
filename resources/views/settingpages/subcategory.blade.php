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
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row py-3">
                <div class="col-md-4">
                    <!-- general form elements -->
                    <div class="card card-primary ">
                        <div class="card-header">
                            <h3 class="card-title">Add New Sub Category</h3>
                        </div>

                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('add.Sub.Category') }}" method="post">
                            @csrf
                            <div class="card-body">
                                {{-- success msg --}}
                                @if (session('success'))
                                    <p class="text-success">{{ session('success') }}</p>
                                @endif
                                {{-- dropdown  --}}
                                <div class="form-group">
                                    <label for="Category_id_Name">Category</label>

                                    <select class="form-control w-100" id="category_id" name="category_id">
                                        <option value="" disabled {{ old('category_id') ? '' : 'selected' }}>
                                            Select Category
                                        </option>

                                        @foreach ($AllCategoryData as $Categoryitems)
                                            <option value="{{ $Categoryitems->id }}"
                                                {{ old('category_id') == $Categoryitems->id ? 'selected' : '' }}>
                                                {{ $Categoryitems->Category_Name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('category_id')
                                        <div class="error-msg" style="color: red">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="Sub_Category_Name">Sub Category Name</label>
                                    <input type="input" class="form-control" id="Sub_Category_Name"
                                        name="Sub_Category_Name" placeholder="Enter Sub Category Name"
                                        value="{{ old('Sub_Category_Name') }}">
                                    @error('Sub_Category_Name')
                                        <div class="error-msg" style="color: red">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                    {{-- danger msg --}}
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
                                        <th>Sub Category</th>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($SubCategoryCollection as $subCategoryitem)
                                        <tr>
                                            <td>
                                                {{ $subCategoryitem->Sub_Category_Name }}
                                            </td>


                                            <td>
                                                {{ $subCategoryitem->category->Category_Name }}
                                            </td>


                                            <td>
                                                <a
                                                    href="{{ route('edit.subcategory.page', encrypt($subCategoryitem->id)) }}">Update</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <thead>
                                    <tr>
                                        <th>Sub Category</th>
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
    <!-- Select2 -->
    <script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>

    <script>
        $("#manageCategory").DataTable();
        // select2 for the input search 
        $('.select2').select2()

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
