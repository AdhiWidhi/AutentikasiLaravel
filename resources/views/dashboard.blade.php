@extends('layouts.app')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card shadow">
            <div class="card-body">
                <h1>Hy {{ Auth::user()->name }}</h1>
                <hr>
                <p>How are you ?</p>
            </div>
        </div>
    </div>
</div>

@endsection
