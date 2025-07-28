{{-- {{ contacts }} --}}
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
                            <h3 class="card-title">Edit Contact</h3>
                        </div>

                        <!-- form start -->
                        <form action="{{ route('update.contact', encrypt($contacts->id)) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                @if (session('success'))
                                    <p class="text-success">{{ session('success') }}</p>
                                @endif

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name " style="color: red">Name</label>
                                            <input type="input" class="form-control" id="name" name="name"
                                                value="{{ $contacts->name }}">


                                            @error('name')
                                                <div class="error-msg" style="color: red">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="input" class="form-control" id="email" name="email"
                                                value="{{ $contacts->email }}">
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
                                                value="{{ $contacts->contact }}">
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
                                                value="{{ $contacts->website }}">
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
                                                        name="billaddress" value="{{ $contacts->billaddress }}">

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
                                                        <option disabled
                                                            {{ old('billstate', $contacts->billstate) ? '' : 'selected' }}>
                                                            Select
                                                            Billing
                                                            State</option>

                                                        @foreach ($states as $state)
                                                            <option value="{{ $state->id }}"
                                                                {{ old('state', $contacts->billstate) == $state->id ? 'selected' : '' }}>
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
                                                        name="billcity" value="{{ $contacts->billcity }}">
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
                                                        name="billpin" value="{{ $contacts->billpin }}">
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
                                        <span class=" text-primary " style="cursor: pointer; float:right"
                                            id="copyBillingBtn">Copy
                                            Billing
                                            Address</span>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="shippaddress">Address</label>
                                                    <input type="input" class="form-control" id="shippaddress"
                                                        name="shippaddress" value="{{ $contacts->shippaddress }}">
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
                                                        <option disabled
                                                            {{ old('shippstate', $contacts->shippstate) ? '' : 'selected' }}>
                                                            Select
                                                            Shipping
                                                            State</option>
                                                        @foreach ($states as $state)
                                                            <option value="{{ $state->id }}" {{-- $company->state --}}
                                                                {{ old('state', $contacts->shippstate) == $state->id ? 'selected' : '' }}>
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
                                                        name="shippcity" value="{{ $contacts->shippcity }}">

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
                                                        name="shipppin" value="{{ $contacts->shipppin }}">

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

                                        {{-- Dropdown --}}
                                        <div class="form-group">
                                            <label for="gsttreatment" style="color: red">GST Treatment</label>

                                            <select class="form-control w-100" id="gsttreatment" name="gsttreatment">
                                                <option disabled
                                                    {{ old('gsttreatment', $contacts->gsttreatment) ? '' : 'selected' }}>
                                                    Select GST Treatment
                                                </option>

                                                <option value="Registered-Regular"
                                                    {{ old('gsttreatment', $contacts->gsttreatment) == 'Registered-Regular' ? 'selected' : '' }}>
                                                    Registered Business-Regular
                                                </option>

                                                <option value="Registered-Composition"
                                                    {{ old('gsttreatment', $contacts->gsttreatment) == 'Registered-Composition' ? 'selected' : '' }}>
                                                    Registered Business-Composition
                                                </option>

                                                <option value="Unregistered"
                                                    {{ old('gsttreatment', $contacts->gsttreatment) == 'Unregistered' ? 'selected' : '' }}>
                                                    Unregistered Business
                                                </option>

                                                <option value="Cunsumer"
                                                    {{ old('gsttreatment', $contacts->gsttreatment) == 'Cunsumer' ? 'selected' : '' }}>
                                                    Consumer
                                                </option>

                                                <option value="Overseas"
                                                    {{ old('gsttreatment', $contacts->gsttreatment) == 'Overseas' ? 'selected' : '' }}>
                                                    Overseas
                                                </option>

                                                <option value="SZE"
                                                    {{ old('gsttreatment', $contacts->gsttreatment) == 'SZE' ? 'selected' : '' }}>
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
                                <div class="row" id="gstinbox" style="display: none; color:red">
                                    <div class="col-md-4">
                                        {{-- dropdown  --}}
                                        <div class="form-group">
                                            <label for="gstin">GSTIN</label>
                                            <input type="input" class="form-control" id="gstin" name="gstin"
                                                value="{{ $contacts->gstin }}">
                                            @error('gstin')
                                                <div class="error-msg" style="color: red">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                    </div>
                                </div>

                                <div class="row " id="panbox" style="display: none">
                                    <div class="col-md-4">
                                        {{-- dropdown  --}}
                                        <div class="form-group">
                                            <label for="pan">PAN</label>
                                            <input type="input" class="form-control" id="pan" name="pan"
                                                value="{{ $contacts->pan }}">
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
                                            <label for="sourceofsupply" style="color: red">Place of supply</label>
                                            {{-- source = place  --}}
                                            <select class="form-control w-100" id="sourceofsupply" name="sourceofsupply">

                                                @foreach ($states as $state)
                                                    <option value="{{ $state->id, $contacts->sourceofsupply }}"
                                                        {{-- $company->state --}}
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
    {{-- <script src="js/showInputbox.js"></script> --}}
    <script src="js/copyBillingAddress.js"></script>

    <script src="/js/updatePage.js"></script>
    <script>
        $("#manageCategory").DataTable();

        $('.select2').select2();
    </script>
@endsection
