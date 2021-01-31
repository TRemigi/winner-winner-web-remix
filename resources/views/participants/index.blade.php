@extends('layouts.app')

@section('content')
    <participant-index :participants="{{ $participants }}"></participant-index>
@endsection