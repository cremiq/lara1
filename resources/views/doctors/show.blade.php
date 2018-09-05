@extends('template')

@section('title')
    @if(isset($title))
        - {{ $title }}
    @endif
@endsection

@section('content')

<div class="container">
    <h2>Lekarz: {{ $doctor->name }}</h2>
    <div class="card">
        <div class="card-header">
            Dane lekarza
        </div>
        <div class="card-body" style="padding:0">
            <table class="table table-hover">
                <tr>
                    <td>Imię i nazwisko:</td><td>{{ $doctor->name }}</td>
                </tr>
                <tr>
                    <td>Adres e-mail:</td><td>{{ $doctor->email }}</td>
                </tr>
                <tr>
                    <td>Telefon:</td><td>{{ $doctor->phone }}</td>
                </tr>
                <tr>
                    <td>Adres:</td><td>{{ $doctor->address }}</td>
                </tr>
                <tr>
                    <td>Status:</td><td>{{ $doctor->status }}</td>
                </tr>
                <tr>
                    <td>Specjalizacja:</td>
                    <td>
                        <ul>
                            @foreach ($doctor->specializations as $specialization)
                                <li>{{ $specialization->name }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
                
            </table>

            <p><a href="{{ URL::to('doktorzy/usun/'.$doctor->id)}}" onclick="return confirm('Czy na pewno usunąć? Operacja nieodwracalna!')">Usuń</a> |
                <a href="{{ URL::to('doktorzy/edytuj/'.$doctor->id)}}">Edytuj</a></p>
        </div>
    </div>
</div>


    

@endsection