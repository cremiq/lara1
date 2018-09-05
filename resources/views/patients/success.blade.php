@extends('template')

@section('title')
    @if(isset($title))
        - {{ $title }}
    @endif
@endsection

@section('content')
<div class="container">
    <h3>Rejestracja zakończona sukcesem!</h3>
</div>
@endsection