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
                            <h3 class="card-title">Edit Item</h3>
                        </div>
                        <form action="{{ route('update.Items', encrypt($items->id)) }}" method="post">
                            @csrf
                            <div class="card-body">
                                {{-- success msg --}}
                                @if (session('success'))
                                    <p class="text-success ">{{ session('success') }}</p>
                                @endif
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ $items->name }}">
                                            @error('name')
                                                <div class="error-msg text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input type="number" step="0.01" class="form-control" id="price"
                                                name="price" value="{{ $items->price }}">
                                            @error('price')
                                                <div class="error-msg text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="category_id">Category</label>
                                            <select class="form-control" id="category_id" name="category_id">
                                                <option disabled selected>Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ old('category_id', $items->category_id ?? '') == $category->id ? 'selected' : '' }}>
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
                                                <option value="select">Select Subcategory</option>

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
                                                <option disabled selected>Select Interstate</option>
                                                @foreach ($taxes as $tax)
                                                    @if ($tax->tax_type == 'IGST')
                                                        <option value="{{ $tax->id }}" {{-- here only change  --}}
                                                            {{ old('interstate_tax_id', $items->interstate_tax_id ?? '') == $tax->id ? 'selected' : '' }}>
                                                            {{ $tax->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>

                                            @error('interstate')
                                                <div class="error-msg text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="intrastate">Intrastate Tax</label>
                                            <select class="form-control" id="intrastate" name="intrastate_tax_id">
                                                <option disabled selected>Select Intrastate</option>
                                                @foreach ($taxes as $tax)
                                                    @if ($tax->tax_type == 'GST')
                                                        <option value="{{ $tax->id }}"
                                                            {{ old('interstate', $items->intrastate_tax_id ?? '') == $tax->id ? 'selected' : '' }}>
                                                            {{ $tax->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>



                                            @error('intrastate')
                                                <div class="error-msg text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" id="description" name="description" rows="3">{{ $items->description }}</textarea>
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


    {{-- here to change Jquery --}}
    <script>
        $(document).ready(function() {
            var selectedCategoryId = "{{ old('category_id', $items->category_id ?? '') }}";
            var selectedSubcategoryId = "{{ old('subcategory_id', $items->subcategory_id ?? '') }}";

            if (selectedCategoryId) {
                $.ajax({
                    url: '/get-subcategories/' + selectedCategoryId,
                    type: 'GET',
                    success: function(data) {
                        $('#subcategory_id').empty().append(
                            '<option disabled selected>Select Subcategory</option>');
                        $.each(data, function(key, value) {
                            $('#subcategory_id').append('<option value="' + value.id + '">' +
                                value.Sub_Category_Name + '</option>');
                        });

                        // Preselect the subcategory
                        $('#subcategory_id').val(selectedSubcategoryId);
                    }
                });
            }

            $('#category_id').on('change', function() {

                var categoryId = $(this).val();
                $('#subcategory_id').html('<option>Loading...</option>');

                $.ajax({
                    url: '/get-subcategories/' + categoryId,
                    type: 'GET',
                    success: function(data) {
                        $('#subcategory_id').empty().append(
                            '<option disabled selected>Select Subcategory</option>');
                        $.each(data, function(key, value) {
                            $('#subcategory_id').append('<option value="' + value.id +
                                '">' + value.Sub_Category_Name + '</option>');
                        });
                    }
                });
            });
        });
    </script>


@endsection
