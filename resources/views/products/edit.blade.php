@extends('layouts.admin')

@section('title', 'Edit Product')
@section('content-header', 'Edit Product')

@section('content')

<div class="card">
    <div class="card-body">

        <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                    placeholder="Name" value="{{ old('name', $product->name) }}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>


            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                    id="description"
                    placeholder="description">{{ old('description', $product->description) }}</textarea>
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
                    <div id="image-preview-container" class="mt-2" style="width: 500px; height: 300px; border: 1px solid #ccc; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                        @if ($product->image)
                            <img id="preview-image" class="img-thumbnail" src="{{ Storage::url($product->image) }}" alt="Product Image" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                        @else
                            <div id="placeholder-container" style="display: flex; flex-direction: column; align-items: center;">
                                <i class="fas fa-image fa-3x"></i>
                                <span class="ml-2">No Image Chosen</span>
                            </div>
                        @endif
                    </div>
                </div>



            </div>
            <hr>

            <div class="form-row">
                <div class="form-group col">
                    <label for="barcode">Barcode</label>
                    <input type="text" name="barcode" class="form-control @error('barcode') is-invalid @enderror" id="barcode" placeholder="barcode" value="{{ old('barcode', $product->barcode) }}">
                    @error('barcode')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group col">
                    <label for="price">Price</label>
                    <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="price" value="{{ old('price', $product->price) }}">
                    @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group col">
                    <label for="quantity">Quantity</label>
                    <input type="text" name="quantity" class="form-control @error('quantity') is-invalid @enderror" id="quantity" placeholder="Quantity" value="{{ old('quantity', $product->quantity) }}">
                    @error('quantity')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group col">
                    <label for="status">Status</label>
                    <select name="status" class="form-control @error('status') is-invalid @enderror" id="status">
                        <option value="1" {{ old('status', $product->status) === 1 ? 'selected' : ''}}>Active</option>
                        <option value="0" {{ old('status', $product->status) === 0 ? 'selected' : ''}}>Inactive</option>
                    </select>
                    @error('status')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <button class="btn btn-success btn-block btn-lg" type="submit">Save Changes</button>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary btn-block btn-lg">Cancel</a>
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

<script>
    function previewImage(input) {
        var imagePreview = document.getElementById('image-preview-container');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                var previewImage = document.createElement('img');
                previewImage.classList.add('img-thumbnail');

                previewImage.onload = function() {
                    var containerWidth = imagePreview.offsetWidth;
                    var containerHeight = imagePreview.offsetHeight;
                    var imageWidth = previewImage.width;
                    var imageHeight = previewImage.height;

                    var widthRatio = containerWidth / imageWidth;
                    var heightRatio = containerHeight / imageHeight;
                    var scaleFactor = Math.min(widthRatio, heightRatio);

                    var scaledWidth = Math.floor(imageWidth * scaleFactor);
                    var scaledHeight = Math.floor(imageHeight * scaleFactor);

                    previewImage.style.width = scaledWidth + 'px';
                    previewImage.style.height = scaledHeight + 'px';
                };

                previewImage.src = e.target.result;
                previewImage.alt = 'Product Image';

                while (imagePreview.firstChild) {
                    imagePreview.firstChild.remove();
                }

                imagePreview.appendChild(previewImage);
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            while (imagePreview.firstChild) {
                imagePreview.firstChild.remove();
            }

            var placeholderIcon = document.createElement('i');
            placeholderIcon.classList.add('fas', 'fa-image', 'fa-3x');

            var placeholderText = document.createElement('span');
            placeholderText.classList.add('ml-2');
            placeholderText.textContent = 'No Image Chosen';

            imagePreview.appendChild(placeholderIcon);
            imagePreview.appendChild(placeholderText);
        }
    }
</script>


@endsection
