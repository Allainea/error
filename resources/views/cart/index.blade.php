@extends('layouts.admin')

@section('content')
    <div id="cart">
        @if ($errors->has('error'))
            <div class="alert alert-danger">
                {{ $errors->first('error') }}
            </div>
        @endif
    </div>
@endsection

@section('title', 'Open POS')
