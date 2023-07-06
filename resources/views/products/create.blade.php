@extends('layouts.admin')

@section('content-header', 'Products / Create Product')

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" id="product-form">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                    placeholder="Enter product name" value="{{ old('name') }}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                    id="description" placeholder="Enter short description">{{ old('description') }}</textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="image">Product Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image" id="image" onchange="previewImage(this)">
                            <label class="custom-file-label" for="image">Choose File</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div id="image-preview-container" class="mt-2">
                        <div id="image-placeholder" class="d-flex align-items-center justify-content-center" style="width: 500px; height: 300px; border: 1px solid #ccc;">
                            <i class="fas fa-image fa-3x"></i>
                            <span class="ml-2">No Image Chosen</span>
                        </div>
                    </div>
                </div>
            </div>
            <hr>

            <div class="form-row">
                <div class="form-group col">
                    <label for="barcode">Barcode</label>
                    <input type="text" name="barcode" class="form-control @error('barcode') is-invalid @enderror" id="barcode" placeholder="Enter barcode number" value="{{ old('barcode') }}">
                    @error('barcode')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group col">
                    <label for="price">Price</label>
                    <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Enter price" value="{{ old('price') }}">
                    @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group col">
                    <label for="quantity">Quantity</label>
                    <input type="text" name="quantity" class="form-control @error('quantity') is-invalid @enderror" id="quantity" placeholder="Quantity" value="{{ old('quantity', 1) }}">
                    @error('quantity')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group col">
                    <label for="status">Status</label>
                    <select name="status" class="form-control @error('status') is-invalid @enderror" id="status">
                        <option value="1" {{ old('status') === 1 ? 'selected' : ''}}>Active</option>
                        <option value="0" {{ old('status') === 0 ? 'selected' : ''}}>Inactive</option>
                    </select>
                    @error('status')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <button class="btn btn-secondary btn-block btn-lg" type="button" onclick="goToProductIndex()">Cancel</button>
                    </div>
                    <div class="col">
                        <button class="btn btn-success btn-block btn-lg" type="submit">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script>
    $(document).ready(function () {
        bsCustomFileInput.init();
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
$(document).ready(function() {
    $('#product-form').submit(function(event) {
        var form = this;
        var fields = ['name', 'barcode', 'price', 'quantity', 'status'];
        var isValid = true;

        fields.forEach(function(field) {
            var fieldValue = $('#' + field).val();
            if (!fieldValue) {
                isValid = false;
                $('#' + field).addClass('is-invalid');
            } else {
                $('#' + field).removeClass('is-invalid');
            }
        });

        if (!isValid) {
            event.preventDefault();
            swal("Fill up all the fields", "", "error");
        } else {
            event.preventDefault(); // Prevent the form from submitting immediately

            swal({
                title: "Save Information",
                text: "Are you sure you want to save the information?",
                icon: "warning",
                buttons: {
                    cancel: "No",
                    confirm: {
                        text: "Yes",
                        value: true,
                        visible: true,
                        className: "btn-primary",
                        closeModal: false
                    }
                }
            }).then(function(value) {
                if (value) {
                    var formSubmitButton = form.querySelector('[type="submit"]');
                    formSubmitButton.disabled = true; // Disable the submit button

                    swal({
                        title: "Saving...",
                        buttons: false,
                        closeOnClickOutside: false,
                        closeOnEsc: false,
                        content: {
                            element: "div",
                            attributes: {
                                className: "loading-bar"
                            }
                        }
                    });

                    form.submit(); // Submit the form
                } else {
                    swal("Information not saved", "", "info");
                }
            });
        }
    });
});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    function previewImage(input) {
        var imagePlaceholder = document.getElementById('image-placeholder');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                imagePlaceholder.style.backgroundImage = "url('" + e.target.result + "')";
                imagePlaceholder.style.backgroundSize = "cover";
                imagePlaceholder.innerHTML = '';
            }

            reader.readAsDataURL(input.files[0]);
        } else {
            imagePlaceholder.style.backgroundImage = 'none';
            imagePlaceholder.innerHTML = '<i class="fas fa-image fa-3x"></i><span class="ml-2">No Image Chosen</span>';
        }
    }
</script>

<script>
    function goToProductIndex() {
        window.location.href = "{{ route('products.index') }}";
    }
</script>

<style>
    .loading-bar {
  width: 100%;
  height: 5px;
  background-color: #f8f9fa;
  position: relative;
  overflow: hidden;
}

.loading-bar:before {
  content: "";
  display: block;
  position: absolute;
  width: 100%;
  height: 100%;
  background-color: #007bff;
  animation: loading-bar-animation 2s linear infinite;
}

@keyframes loading-bar-animation {
  0% {
    transform: translateX(-100%);
  }
  100% {
    transform: translateX(100%);
  }
}

</style>
@endsection
