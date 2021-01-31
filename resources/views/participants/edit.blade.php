@extends('layouts.app')

@section('content')
    <participant-edit :giveaway="{{ $giveaway }}" :participant="{{ $participant }}"></participant-edit>
@endsection