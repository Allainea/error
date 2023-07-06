@extends('layouts.admin')

@section('content-header', 'Product List')
@section('content-actions')
<a href="{{route('products.create')}}" class="btn btn-success"><i class="fas fa-plus"></i> Add New</a>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/products.css') }}">
@endsection
@section('content')
<div class="card product-list">
    <div class="card-body">
        <table class="table table-bordered table-hover custom-table">
            <thead class="thead-custom text-center custom-thead">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Barcode</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="custom-tbody">
                @foreach ($products as $product)
                <tr>
                    <td class="product-id">{{$product->id}}</td>
                    <td><img class="product-img img-thumbnail custom-image" src="{{ Storage::url($product->image) }}" alt=""></td>
                    <td class="product-name">{{$product->name}}</td>
                    <td class="product-barcode">{{$product->barcode}}</td>
                    <td class="product-price">{{config('settings.currency_symbol')}}{{$product->price}}</td>
                    <td class="product-quantity">{{$product->quantity}}</td>
                    <td class="product-status">
                        <span class="badge badge-{{ $product->status ? 'success' : 'danger' }}">
                            {{$product->status ? 'Active' : 'Inactive'}}
                        </span>
                    </td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="pagination justify-content-center" style="margin-top: 20px;">
            {{ $products->links() }}
        </div>

    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $(document).on('click', '.btn-delete', function () {
            $this = $(this);
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "Do you really want to delete this product?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No',
                reverseButtons: true
                }).then((result) => {
                if (result.value) {
                    $.post($this.data('url'), {_method: 'DELETE', _token: '{{csrf_token()}}'}, function (res) {
                        $this.closest('tr').fadeOut(500, function () {
                            $(this).remove();
                        })
                    })
                }
            })
        })
    })
</script>
@endsection
