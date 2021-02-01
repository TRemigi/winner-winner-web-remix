@extends('layouts.app')

@section('content')
<giveaway-edit :giveaway="{{ $giveaway }}" :user="{{ $user }}"></giveaway-edit>
@endsection