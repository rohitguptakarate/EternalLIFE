@extends('layouts.master')

@section('title', 'contact')

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
                    <h3 class="card-title">Manage Contact</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="manageContact" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <!-- Basic Info -->
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                {{-- <th>Website</th> --}}

                                <!-- Billing Address -->
                                {{-- <th>Billing Address</th>
                                <th>Billing State</th>
                                <th>Billing City</th>
                                <th>Billing PIN</th> --}}

                                <!-- Shipping Address -->
                                {{-- <th>Shipping Address</th>
                                <th>Shipping State</th>
                                <th>Shipping City</th>
                                <th>Shipping PIN</th> --}}

                                <!-- Other Info -->
                                <th>GST Treatment</th>
                                {{-- <th>GSTIN</th>
                                <th>PAN</th>
                                <th>Source of Supply</th> --}}

                                <!-- Optional: Actions -->
                                <th>Actions</th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($contactDetails as $contact)
                                <tr>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->contact }}</td>
                                    {{-- <td>{{ $contact->website }}</td> --}}

                                    {{-- <td>{{ $contact->billaddress }}</td>
                                    <td>{{ $contact->billingState?->name ?? 'N/A' }}</td>
                                    <td>{{ $contact->billcity }}</td>
                                    <td>{{ $contact->billpin }}</td> --}}

                                    {{-- <td>{{ $contact->shippaddress }}</td>
                                    <td>{{ $contact->shippingState?->name ?? 'N/A' }}</td>
                                    <td>{{ $contact->shippcity }}</td>
                                    <td>{{ $contact->shipppin }}</td> --}}

                                    <td>{{ $contact->gsttreatment }}</td>
                                    {{-- <td>{{ $contact->gstin }}</td>
                                    <td>{{ $contact->pan }}</td>
                                    <td>{{ $contact->sourceOfSupplyState?->name ?? 'N/A' }}</td> --}}
                                    <td><a href="{{ route('show.update.contact', encrypt($contact->id)) }}">update</a></td>
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



    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- DataTables  & Plugins -->

    <script src="{{ asset('adminlte/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <script>
        // $("#manageContact").DataTable();
        $('.select2').select2();
    </script>

    <script>
        $(function() {
            $("#manageContact").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#manageContact_wrapper .col-md-6:eq(0)');

        });
    </script>
@endsection
