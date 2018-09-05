@extends('template')

@section('title')
    @if(isset($title))
        - {{ $title }}
    @endif
@endsection

@section('content')
<div class="container">
    <h2>Edycja lekarza</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ action('DoctorController@editStore') }}" method="POST" role="form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" value="{{ $doctor->id }}">

        <div class="form-group">
            <label for="name">Imię i nazwisko</label>
            <input type="text" class="form-control" name="name" value="{{ $doctor->name }}">
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" name="email" value="{{ $doctor->email }}">
        </div>

        <div class="form-group">
            <label for="phone">Telefon</label>
            <input type="tel" class="form-control" name="phone" value="{{ $doctor->phone }}">
        </div>

        <div class="form-group">
            <label for="address">Adres</label>
            <input type="text" class="form-control" name="address" value="{{ $doctor->address }}">
        </div>

        <div class="form-group">
            <label for="pesel">PESEL</label>
            <input type="text" class="form-control" name="pesel" value="{{ $doctor->pesel }}">
        </div>

        <div class="form-group">
            <label for="checkbox">Specjalizacja:</label>
            @foreach ($specializations as $specialization)
            <div class="form-check">
                @if ($doctor->specializations->contains($specialization))
                    <input class="form-check-input" type="checkbox" name="specializations[]" value="{{ $specialization->id }}" checked> 
                @else
                    <input class="form-check-input" type="checkbox" name="specializations[]" value="{{ $specialization->id }}"> 
                @endif
                
                <label class="form-check-label" for="specializations[]">{{ $specialization->name }}</label>
            </div>
            @endforeach
        </div>

        <div class="form-group">
            <label for="pesel">Status:</label>
            @if ($doctor->status == "Active")
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="inlineRadio1" class="form-control" name="status" value="Active" checked="checked">
                    <label class="form-check-label" for="inlineRadio1">Aktywny</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="inlineRadio2" class="form-control" name="status" value="Inactive">
                    <label class="form-check-label" for="inlineRadio2">Nieaktywny</label>
                </div>
            @else
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="inlineRadio1" class="form-control" name="status" value="Active">
                    <label class="form-check-label" for="inlineRadio1">Aktywny</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="inlineRadio2" class="form-control" name="status" value="Inactive" checked="checked">
                    <label class="form-check-label" for="inlineRadio2">Nieaktywny</label>
                </div>
            @endif
        </div>

        <input type="submit" value="Zmień" class="btn btn-primary">
    </form>
</div>
@endsection