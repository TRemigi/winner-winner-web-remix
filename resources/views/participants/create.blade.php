@extends('layouts.app')

@section('content')
    <participant-create :giveaway="{{ $giveaway }}"></participant-create>
@endsection