@extends('layouts.master')

@section('title', 'Items')

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
        <div class="container-fluid py-3">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="card-title">Items</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="manageItem" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>

                                <th>Description</th>
                                <th>Category</th>
                                <th>Subcategory</th>

                                <th>Interstate Tax</th>
                                <th>Intrastate Tax</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->price }}</td>

                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->category->Category_Name ?? '' }}</td>
                                    <td>{{ $item->subcategory->Sub_Category_Name ?? '' }}</td>

                                    <td>{{ $item->interstateTax->name ?? '' }}</td>
                                    <td>{{ $item->intrastateTax->name ?? '' }}</td>
                                    <td><a href="{{ route('edit.Items', encrypt($item->id)) }}">update</a></td>
                                </tr>
                            @endforeach
                        </tbody>


                    </table>
                </div>
                <!-- /.card-body -->
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
    <script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="js/showInputbox.js"></script>
    <script src="js/copyBillingAddress.js"></script>

    <script>
        $("#manageItem").DataTable();

        $('.select2').select2();
    </script>
@endsection
