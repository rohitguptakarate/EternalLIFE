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
        <div class="container-fluid">
            <div class="row py-3">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add New Item</h3>
                        </div>
                        <form action="{{ route('store.Item') }}" method="post">
                            @csrf
                            <div class="card-body">
                                {{-- success msg --}}
                                @if (session('success'))
                                    <p class="text-success ">{{ session('success') }}</p>
                                @endif

                                {{-- error msg  --}}
                                @if (session('error'))
                                    <p class="text-danger">{{ session('error') }}</p>
                                @endif

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Enter Item Name" value="{{ old('name') }}">
                                            @error('name')
                                                <div class="error-msg text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input type="number" step="0.01" class="form-control" id="price"
                                                name="price" placeholder="Enter Price" value="{{ old('price') }}">
                                            @error('price')
                                                <div class="error-msg text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="category_id">Category</label>
                                            <select class="form-control" id="category_id" name="category_id">
                                                {{-- <option disabled selected>Select Category</option> --}}
                                                <option value="" disabled {{ old('category_id') ? '' : 'selected' }}>
                                                    Select Category
                                                </option>

                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                        {{ $category->Category_Name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <div class="error-msg text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="subcategory_id">Subcategory</label>
                                            <select class="form-control" id="subcategory_id" name="subcategory_id">
                                                <option value="" disabled selected>Select Subcategory</option>

                                            </select>

                                            @error('subcategory_id')
                                                <div class="error-msg text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="interstate">Interstate Tax</label>
                                            <select class="form-control" id="interstate" name="interstate_tax_id">
                                                <option value="" disabled
                                                    {{ old('interstate_tax_id') ? '' : 'selected' }}>
                                                    Select Interstate
                                                </option>
                                                @foreach ($taxes as $tax)
                                                    @if ($tax->tax_type == 'IGST')
                                                        <option value="{{ $tax->id }}"
                                                            {{ old('interstate_tax_id') == $tax->id ? 'selected' : '' }}>
                                                            {{ $tax->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>

                                            @error('interstate_tax_id')
                                                <div class="error-msg text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="intrastate">Intrastate Tax</label>
                                            <select class="form-control" id="intrastate" name="intrastate_tax_id">
                                                {{-- <option disabled selected>Select Intrastate</option> --}}
                                                <option value="" disabled
                                                    {{ old('intrastate_tax_id') ? '' : 'selected' }}>
                                                    Select Intrastate
                                                </option>
                                                @foreach ($taxes as $tax)
                                                    @if ($tax->tax_type == 'GST')
                                                        <option value="{{ $tax->id }}"
                                                            {{ old('interstate') == $tax->id ? 'selected' : '' }}>
                                                            {{ $tax->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>


                                            @error('intrastate_tax_id')
                                                <div class="error-msg text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter Description">{{ old('description') }}</textarea>
                                            @error('description')
                                                <div class="error-msg text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
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

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script>
        $(document).ready(function() {
            var oldCategoryId = "{{ old('category_id') }}";
            var oldSubcategoryId = "{{ old('subcategory_id') }}";

            if (oldCategoryId) {
                $('#category_id').val(oldCategoryId).trigger('change');

                // Load subcategories and select the old one
                $.ajax({
                    url: '/get-subcategories/' + oldCategoryId,
                    type: 'GET',
                    success: function(data) {
                        $('#subcategory_id').empty();
                        $('#subcategory_id').append(
                            '<option value="" selected disabled>Select Subcategory</option>');

                        $.each(data, function(key, value) {
                            $('#subcategory_id').append('<option value="' + value.id + '">' +
                                value.Sub_Category_Name + '</option>');
                        });

                        // Set selected subcategory
                        if (oldSubcategoryId) {
                            $('#subcategory_id').val(oldSubcategoryId);
                        }
                    },
                    error: function() {
                        alert('Error loading subcategories.');
                    }
                });
            }

            // Handle normal change
            $('#category_id').on('change', function() {
                var categoryId = $(this).val();
                $('#subcategory_id').html('<option>Loading...</option>');

                if (categoryId) {
                    $.ajax({
                        url: '/get-subcategories/' + categoryId,
                        type: 'GET',
                        success: function(data) {
                            $('#subcategory_id').empty();
                            $('#subcategory_id').append(
                                '<option disabled selected>Select Subcategory</option>');

                            $.each(data, function(key, value) {
                                $('#subcategory_id').append('<option value="' + value
                                    .id + '">' + value.Sub_Category_Name +
                                    '</option>');
                            });
                        },
                        error: function() {
                            alert('Error retrieving subcategories.');
                        }
                    });
                } else {
                    $('#subcategory_id').html(
                        '<option  selected>Select Subcategory</option>');
                }
            });
        });
    </script>


@endsection
