@extends('template')

@section('title')
    @if(isset($title))
        - {{ $title }}
    @endif
@endsection

@section('content')
<div class="container">
    <h2>Wizyty</h2>
    <p><a href="{{ URL::to('wizyty/nowa')}}">Dodaj nową wizytę</a></p>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Lekarz</th>
          <th scope="col">Pacjent</th>
          <th scope="col">Data</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($visits as $visit)
            <tr>
            <th scope="row">{{ $visit->id }}</th>
              <td><a href="{{ URL::to('doktorzy/'.$visit->doctor->id)}}">{{ $visit->doctor->name }}</a></td>
              <td><a href="{{ URL::to('pacjenci/'.$visit->patient->id)}}">{{ $visit->patient->name }}</a></td>
              <td>{{ $visit->date }}</td>
            </tr>
        @endforeach
        
      </tbody>
    </table>
</div>
@endsection