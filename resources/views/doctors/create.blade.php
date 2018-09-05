@extends('template')

@section('title')
    @if(isset($title))
        - {{ $title }}
    @endif
@endsection

@section('content')
<div class="container">
    <h2>Dodawanie lekarza</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ action('DoctorController@store') }}" method="POST" role="form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group">
            <label for="name">Imię i nazwisko</label>
            <input type="text" class="form-control" name="name">
        </div>

        <div class="form-group">
            @if ($errors->has('email'))
                <div class="alert alert-danger">{{ $errors->first('email') }}</div>
            @endif
            <label for="email">E-mail</label>
            <input type="email" class="form-control" name="email">
        </div>

        <div class="form-group">
            <label for="password">Hasło</label>
            <input type="password" class="form-control" name="password">
        </div>

        <div class="form-group">
            <label for="phone">Telefon</label>
            <input type="tel" class="form-control" name="phone">
        </div>

        <div class="form-group">
            <label for="address">Adres</label>
            <input type="text" class="form-control" name="address">
        </div>

        <div class="form-group">
            <label for="pesel">PESEL</label>
            <input type="text" class="form-control" name="pesel">
        </div>

        <div class="form-group">
            <label for="checkbox">Specjalizacja</label>
            @foreach ($specializations as $specialization)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="specializations[]" value="{{ $specialization->id }}"> 
                <label class="form-check-label" for="specializations[]">{{ $specialization->name }}</label>
            </div>
            @endforeach
            
        </div>

        <input type="submit" value="Dodaj" class="btn btn-primary">
    </form>
</div>
@endsection