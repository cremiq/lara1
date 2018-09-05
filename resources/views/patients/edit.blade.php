@extends('template')

@section('title')
    @if(isset($title))
        - {{ $title }}
    @endif
@endsection

@section('content')
<div class="container">
    <h2>Edycja pacjenta</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ action('PatientController@editStore') }}" method="POST" role="form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" value="{{ $patient->id }}">

        <div class="form-group">
            <label for="name">Imię i nazwisko</label>
            <input type="text" class="form-control" name="name" value="{{ $patient->name }}">
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" name="email" value="{{ $patient->email }}">
        </div>

        <div class="form-group">
            <label for="phone">Telefon</label>
            <input type="tel" class="form-control" name="phone" value="{{ $patient->phone }}">
        </div>

        <div class="form-group">
            <label for="address">Adres</label>
            <input type="text" class="form-control" name="address" value="{{ $patient->address }}">
        </div>

        <div class="form-group">
            <label for="pesel">PESEL</label>
            <input type="text" class="form-control" name="pesel" value="{{ $patient->pesel }}">
        </div>

        <input type="submit" value="Zmień" class="btn btn-primary">
    </form>
</div>
@endsection