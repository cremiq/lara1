@extends('template')

@section('title')
    @if(isset($title))
        - {{ $title }}
    @endif
@endsection

@section('content')

<div class="container">
    <h2>Pacjent: {{ $patient->name }}</h2>
    <div class="card">
        <div class="card-header">
            Dane pacjenta
        </div>
        <div class="card-body" style="padding:0">
            <table class="table table-hover">
                <tr>
                    <td>Imię i nazwisko:</td><td>{{ $patient->name }}</td>
                </tr>
                <tr>
                    <td>Adres e-mail:</td><td>{{ $patient->email }}</td>
                </tr>
                <tr>
                    <td>Telefon:</td><td>{{ $patient->phone }}</td>
                </tr>
                <tr>
                    <td>Adres:</td><td>{{ $patient->address }}</td>
                </tr>
                <tr>
                    <td>Pesel:</td><td>{{ $patient->pesel }}</td>
                </tr>
                
            </table>
        </div>
    </div>
</div>


    

@endsection