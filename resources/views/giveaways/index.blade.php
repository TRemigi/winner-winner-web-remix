@extends('layouts.app')

@section('content')
<giveaway-index :giveaways="{{ $giveaways }}"></giveaway-index>
@endsection