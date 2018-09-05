@extends('template')

@section('title')
    @if(isset($title))
        - {{ $title }}
    @endif
@endsection

@section('content')
<div class="container">
    <h2>Pacjenci</h2>
    <p><a href="{{ URL::to('pacjenci/nowy')}}">Dodaj pacjenta</a></p>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Imię i nazwisko</th>
          <th scope="col">E-mail</th>
          <th scope="col">Telefon</th>
          <th scope="col">Wizyty</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($patients as $patient)
            <tr>
            <th scope="row">{{ $patient->id }}</th>
              <td><a href="{{ URL::to('pacjenci/'.$patient->id)}}">{{ $patient->name }}</a></td>
              <td>{{ $patient->email }}</td>
              <td>{{ $patient->phone }}</td>
              <td>
                <ul>
                  @foreach ($patient->patientsVisits as $patientVisit)
                    <li><a href="{{ URL::to('/wizyty') }}">{{ $patientVisit->date }}</a></li>
                  @endforeach
                </ul>
              </td>
              <td>
                <a href="{{ URL::to('pacjenci/usun/'.$patient->id) }}" onclick="return confirm('Czy na pewno usunąć? Operacja nieodwracalna!')">Usuń</a> | 
                <a href="{{ URL::to('pacjenci/edytuj/'.$patient->id) }}">Edytuj</a>
              </td>
            </tr>
        @endforeach
        
      </tbody>
    </table>
</div>
@endsection