@extends('layouts.app')

@section('content')
    <giveaway-show :giveaway="{{ $giveaway }}" :participants="{{ $participants }}"></giveaway-show>
@endsection
