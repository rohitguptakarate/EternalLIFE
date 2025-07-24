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
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary ">
                        <div class="card-header ">
                            <h3 class="card-title">Manage Company Information</h3>
                        </div>

                        <!-- form start -->

                        <form action="{{ route('update.company', $company->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                @if (session('success'))
                                    <p class="text-success">{{ session('success') }}</p>
                                @endif
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="organization_name">Organization Name</label>
                                            <input type="input" class="form-control" id="organization_name"
                                                name="organization_name" value="{{ $company->organization_name }}">
                                            @error('organization_name')
                                                <div class="error-msg" style="color: red">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="contact">Contact</label>
                                            <input type="input" class="form-control" id="contact" name="contact"
                                                value="{{ $company->contact }}">
                                            @error('contact')
                                                <div class="error-msg" style="color: red">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="input" class="form-control" id="email" name="email"
                                                value="{{ $company->email }}">
                                            @error('email')
                                                <div class="error-msg" style="color: red">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="gst_in">GST IN</label>
                                            <input type="input" class="form-control" id="gst_in" name="gst_in"
                                                value="{{ $company->gst_in }}">
                                            @error('gst_in')
                                                <div class="error-msg" style="color: red">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="pan">PAN</label>
                                            <input type="input" class="form-control" id="pan" name="pan"
                                                value="{{ $company->pan }}">
                                            @error('pan')
                                                <div class="error-msg" style="color: red">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="office_address">Office Address</label>
                                            <input type="input" class="form-control" id="office_address"
                                                name="office_address" value="{{ $company->office_address }}">
                                            @error('office_address')
                                                <div class="error-msg" style="color: red">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <input type="input" class="form-control" id="city" name="city"
                                                value="{{ $company->city }}">
                                            @error('city')
                                                <div class="error-msg" style="color: red">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        {{-- dropdown  --}}
                                        <div class="form-group">
                                            <label for="state">State</label>

                                            <select class="form-control w-100" id="state" name="state">
                                                <option disabled {{ old('state') ? '' : 'selected' }}>Select State</option>


                                                @foreach ($states as $state)
                                                    <option value="{{ $state->id }}"
                                                        {{ old('state', $company->state) == $state->id ? 'selected' : '' }}>
                                                        {{ $state->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('state')
                                                <div class="error-msg" style="color: red">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="pin_code">Pin Code</label>
                                            <input type="input" class="form-control" id="pin_code" name="pin_code"
                                                value="{{ $company->pin_code }}">

                                            @error('pin_code')
                                                <div class="error-msg" style="color: red">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <p>Bank Information</p>
                                <hr>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="account_name">A/C Name</label>
                                            <input type="input" class="form-control" id="account_name"
                                                name="account_name" value="{{ $company->account_name }}">

                                            @error('account_name')
                                                <div class="error-msg" style="color: red">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="account_number">A/C No</label>
                                            <input type="input" class="form-control" id="account_number"
                                                placeholder="Account No" name="account_number"
                                                value="{{ $company->account_number }}">

                                            @error('account_number')
                                                <div class="error-msg" style="color: red">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="ifsc">IFSC</label>
                                            <input type="input" class="form-control" id="ifsc" placeholder="IFSC"
                                                name="ifsc" value="{{ $company->ifsc }}">

                                            @error('ifsc')
                                                <div class="error-msg" style="color: red">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="bank_name">Bank Name</label>
                                            <input type="input" class="form-control" id="bank_name" name="bank_name"
                                                value="{{ $company->bank_name }}">

                                            @error('bank_name')
                                                <div class="error-msg" style="color: red">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="branch_name">Branch Name</label>
                                            <input type="input" class="form-control" id="branch_name"
                                                name="branch_name" value="{{ $company->branch_name }}">
                                            @error('branch_name')
                                                <div class="error-msg" style="color: red">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>



                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
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
    <script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>

    <script>
        $("#manageCategory").DataTable();

        $('.select2').select2();

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
