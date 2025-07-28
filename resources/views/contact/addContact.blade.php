@extends('layouts.master')

@section('title', 'Contact')

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
                            <h3 class="card-title">Add New Contact</h3>
                        </div>

                        <!-- form start -->
                        <form action="{{ route('add.contact') }}" method="post">
                            @csrf

                            <div class="card-body">
                                @if (session('success'))
                                    <p class="text-success">{{ session('success') }}</p>
                                @endif

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name " style="color: red">Name</label>
                                            <input type="input" class="form-control" id="name" name="name"
                                                placeholder="Enter Contact Name" value="{{ old('name') }}">
                                            @error('name')
                                                <div class="error-msg " style="color: red">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="input" class="form-control" id="email" name="email"
                                                placeholder="Enter Email" value="{{ old('email') }}">
                                            @error('email')
                                                <div class="error-msg" style="color: red">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="contact">Contact</label>
                                            <input type="input" class="form-control" id="contact" name="contact"
                                                placeholder="Enter Contact No" value="{{ old('contact') }}">
                                            @error('contact')
                                                <div class="error-msg" style="color: red">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="website">Website</label>
                                            <input type="input" class="form-control" id="website" name="website"
                                                placeholder="Enter Website" value="{{ old('website') }}">
                                            @error('website')
                                                <div class="error-msg" style="color: red">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    {{-- billing  --}}
                                    <div class="col-md-6">
                                        <p class="text-lg text-primary">Billing Address</p>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="billaddress">Address</label>
                                                    <input type="input" class="form-control" id="billaddress"
                                                        name="billaddress" placeholder="Enter Billing Address"
                                                        value="{{ old('billaddress') }}">
                                                    @error('billaddress')
                                                        <div class="error-msg" style="color: red">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>



                                            <div class="col-md-6">
                                                {{-- dropdown state --}}
                                                <div class="form-group">
                                                    <label for="billstate">State</label>
                                                    <select class="form-control w-100" id="billstate" name="billstate">
                                                        <option disabled {{ old('billstate') ? '' : 'selected' }}>Select
                                                            Billing
                                                            State</option>

                                                        @foreach ($states as $state)
                                                            <option value="{{ $state->id }}" {{-- billstate --}}
                                                                {{ old('state') == $state->id ? 'selected' : '' }}>
                                                                {{ $state->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                    @error('billstate')
                                                        <div class="error-msg" style="color: red">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror

                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="billcity">City</label>
                                                    <input type="input" class="form-control" id="billcity"
                                                        name="billcity" placeholder="Enter Billing City"
                                                        value="{{ old('billcity') }}">
                                                    @error('billcity')
                                                        <div class="error-msg" style="color: red">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="billpin">Pin</label>
                                                    <input type="input" class="form-control" id="billpin"
                                                        name="billpin" placeholder="Enter Billing Pin"
                                                        value="{{ old('billpin') }}">
                                                    @error('billpin')
                                                        <div class="error-msg" style="color: red">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- shipping  --}}
                                    <div class="col-md-6">
                                        <span class="text-lg text-primary">Shipping Address</span>
                                        <span class=" text-primary" id="copyBillingBtn"
                                            style="cursor: pointer; float:right">Copy Billing
                                            Address</span>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="shippaddress">Address</label>
                                                    <input type="input" class="form-control" id="shippaddress"
                                                        name="shippaddress" placeholder="Enter Shipping Address"
                                                        value="{{ old('shippaddress') }}">
                                                    @error('shippaddress')
                                                        <div class="error-msg" style="color: red">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                {{-- dropdown state --}}
                                                <div class="form-group">
                                                    <label for="shippstate">State</label>

                                                    <select class="form-control w-100" id="shippstate" name="shippstate">
                                                        <option disabled {{ old('shippstate') ? '' : 'selected' }}>
                                                            Select
                                                            Shipping
                                                            State</option>
                                                        @foreach ($states as $state)
                                                            <option value="{{ $state->id }}" {{-- $company->state --}}
                                                                {{ old('state') == $state->id ? 'selected' : '' }}>
                                                                {{ $state->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                    @error('shippstate')
                                                        <div class="error-msg" style="color: red">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror

                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="shippcity">City</label>
                                                    <input type="input" class="form-control" id="shippcity"
                                                        name="shippcity" placeholder="Enter Shipping City">
                                                    @error('shippcity')
                                                        <div class="error-msg" style="color: red">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="shipppin">Pin</label>
                                                    <input type="input" class="form-control" id="shipppin"
                                                        name="shipppin" placeholder="Enter Shipping Pin"
                                                        value="{{ old('shipppin') }}">
                                                    @error('shipppin')
                                                        <div class="error-msg" style="color: red">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <p class="text-lg text-primary">Other Information</p>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        {{-- dropdown  --}}
                                        <div class="form-group">
                                            <label for="gsttreatment " style="color: red">GST Treatment</label>
                                            {{-- <select class="form-control w-100" id="gsttreatment" name="gsttreatment">
                                                <option disabled {{ old('gsttreatment') ? '' : 'selected' }}>Select GST
                                                    Treatment</option>
                                                <option value="Registered-Regular">Registered Business-Regular</option>
                                                <option value="Registered-Composition">Registered Bussiness-Composition
                                                </option>
                                                <option value="Unregistered">Unregistered Bussiness</option>
                                                <option value="Cunsumer">Cunsumer</option>
                                                <option value="Overseas">Overseas</option>
                                                <option value="SZE">Special Economic Zone</option>
                                            </select> --}}
                                            <select class="form-control w-100" id="gsttreatment" name="gsttreatment">
                                                <option disabled
                                                    {{ old('gsttreatment', $contacts->gsttreatment ?? '') == '' ? 'selected' : '' }}>
                                                    Select GST Treatment
                                                </option>

                                                <option value="Registered-Regular"
                                                    {{ old('gsttreatment', $contacts->gsttreatment ?? '') == 'Registered-Regular' ? 'selected' : '' }}>
                                                    Registered Business-Regular
                                                </option>

                                                <option value="Registered-Composition"
                                                    {{ old('gsttreatment', $contacts->gsttreatment ?? '') == 'Registered-Composition' ? 'selected' : '' }}>
                                                    Registered Bussiness-Composition
                                                </option>

                                                <option value="Unregistered"
                                                    {{ old('gsttreatment', $contacts->gsttreatment ?? '') == 'Unregistered' ? 'selected' : '' }}>
                                                    Unregistered Bussiness
                                                </option>

                                                <option value="Cunsumer"
                                                    {{ old('gsttreatment', $contacts->gsttreatment ?? '') == 'Cunsumer' ? 'selected' : '' }}>
                                                    Cunsumer
                                                </option>

                                                <option value="Overseas"
                                                    {{ old('gsttreatment', $contacts->gsttreatment ?? '') == 'Overseas' ? 'selected' : '' }}>
                                                    Overseas
                                                </option>

                                                <option value="SZE"
                                                    {{ old('gsttreatment', $contacts->gsttreatment ?? '') == 'SZE' ? 'selected' : '' }}>
                                                    Special Economic Zone
                                                </option>
                                            </select>


                                            @error('gsttreatment')
                                                <div class="error-msg" style="color: red">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                    </div>
                                </div>

                                {{-- show this input box based on condition --}}
                                <div class="row " style="display: none" id="gstinbox">
                                    <div class="col-md-4">
                                        {{-- dropdown  --}}
                                        <div class="form-group">
                                            <label for="gstin" style="color: red">GSTIN</label>
                                            <input type="input" class="form-control" id="gstin" name="gstin"
                                                placeholder="Enter GSTIN" value="{{ old('gstin') }}">
                                            @error('gstin')
                                                <div class="error-msg" style="color: red">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                    </div>
                                </div>

                                <div class="row " style="display: none" id="panbox">
                                    <div class="col-md-4">
                                        {{-- dropdown  --}}
                                        <div class="form-group">
                                            <label for="pan">PAN</label>
                                            <input type="input" class="form-control" id="pan" name="pan"
                                                placeholder="Enter PAN" value="{{ old('pan') }}">
                                            @error('pan')
                                                <div class="error-msg" style="color: red">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-4">
                                        {{-- dropdown  --}}
                                        <div class="form-group">
                                            {{-- place = source  --}}
                                            <label for="sourceofsupply" style="color: red">Place of supply</label>

                                            <select class="form-control w-100" id="sourceofsupply" name="sourceofsupply">
                                                <option disabled {{ old('sourceofsupply') ? '' : 'selected' }}>Select
                                                    Place of supply
                                                </option>
                                                @foreach ($states as $state)
                                                    <option value="{{ $state->id }}" {{-- $company->state --}}
                                                        {{ old('state') == $state->id ? 'selected' : '' }}>
                                                        {{ $state->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            @error('sourceofsupply')
                                                <div class="error-msg" style="color: red">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                    </div>



                                    <!-- /.card-body -->

                                </div>
                            </div>



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
    <script src="js/showInputbox.js"></script>
    <script src="js/copyBillingAddress.js"></script>

    <script>
        $("#manageCategory").DataTable();

        $('.select2').select2();
    </script>
@endsection
