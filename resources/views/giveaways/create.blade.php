@extends('layouts.app')

@section('content')
<giveaway-create :user="{{ $user }}"></giveaway-create>
@endsection