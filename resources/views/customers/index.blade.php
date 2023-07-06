@extends('layouts.admin')

@section('content-header', 'Customer Management')
@section('content-actions')
    <a href="{{route('customers.create')}}" class="btn btn-success"><i class="fas fa-plus"></i> Add New Customer</a>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead class="thead-custom" style="background-color: #001C30; text-align: center; color:aliceblue;">                <tr>
                    <th>ID</th>
                    <th>Avatar</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Date Added</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody style="text-align: center; background-color: #F7FFE5;">
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{$customer->id}}</td>
                        <td>
                            <img width="40px" class="img-thumbnail" src="{{$customer->getAvatarUrl()}}" alt="">
                        </td>
                        <td>{{$customer->first_name}} {{$customer->last_name}}</td>
                        <td>{{$customer->phone}}</td>
                        <td>{{$customer->address}}</td>
                        <td>{{$customer->created_at}}</td>
                        <td>
                            <a href="{{ route('customers.edit', $customer) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $customers->render() }}
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
                    text: "Do you really want to delete this customer?",
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
