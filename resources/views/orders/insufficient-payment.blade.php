@extends('layouts.app')

@section('content')
    <div class="modal">
        <div class="modal-content">
            <h2>Insufficient Payment Amount</h2>
            <p>Please enter a higher amount to proceed with the order.</p>
            <button onclick="closeModal()">OK</button>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function closeModal() {
            var modal = document.querySelector('.modal');
            modal.style.display = 'none';
        }
    </script>
@endsection
