@extends('template')

@section('title')
    @if(isset($title))
        - {{ $title }}
    @endif
@endsection

@section('content')
<div class="container">
    <h2>Lekarze</h2>
    <p><a href="{{ URL::to('doktorzy/nowy')}}">Dodaj Lekarza</a></p>

    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Imię i nazwisko</th>
          <th scope="col">E-mail</th>
          <th scope="col">Status</th>
          <th scope="col">Specjalizacje</th>
          <th scope="col">Operacje</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($doctors as $doctor)
            <tr>
            <th scope="row">{{ $doctor->id }}</th>
              <td><a href="{{ URL::to('doktorzy/'.$doctor->id)}}">{{ $doctor->name }}</a></td>
              <td>{{ $doctor->email }}</td>
              <td>{{ $doctor->status }}</td>
              <td>
                <ul>
                  @foreach ($doctor->specializations as $specialization)
                    <li>{{ $specialization->name }}</li>
                  @endforeach
                </ul>
              </td>
              <td>
                <a href="{{ URL::to('doktorzy/usun/'.$doctor->id)}}" onclick="return confirm('Czy na pewno usunąć? Operacja nieodwracalna!')">Usuń</a> |
                <a href="{{ URL::to('doktorzy/edytuj/'.$doctor->id)}}">Edytuj</a>
              </td>
            </tr>
        @endforeach
        
      </tbody>
    </table>

    @foreach ($stats as $stat)
        @if ($stat->status == 'Active')
          Lekarze dostępni: {{ $stat->user_count }} <br>
        @endif
        @if ($stat->status == 'Inactive')
          Lekarze niedostępni: {{ $stat->user_count }} <br>
        @endif
    @endforeach
</div>
@endsection