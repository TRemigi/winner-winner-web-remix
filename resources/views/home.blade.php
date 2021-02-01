@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="col-12 d-flex justify-content-center">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        
                        Welcome, {{ Auth::user()->name }}
                    </div>
                    <div class="col-12 d-flex justify-content-center mt-3">
                        <button class="btn shadow btn-outline-primary" onclick="{ window.location = '/giveaways' }">Go to Giveaways</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
