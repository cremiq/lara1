@extends('template')

@section('title')
    @if(isset($title))
        - {{ $title }}
    @endif
@endsection

@section('content')
<div class="container">
    <h2>Specjalizacje</h2>
    <p><a href="{{ URL::to('specjalizacje/nowa')}}">Dodaj nową specjalizację</a></p>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nazwa specjalizacji</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($specializations as $specialization)
            <tr>
            <th scope="row">{{ $specialization->id }}</th>
            <td><a href="{{ URL::to('doktorzy/specjalizacje/'. $specialization->id)}}">{{ $specialization->name }}</a></td>
            </tr>
        @endforeach
        
      </tbody>
    </table>
</div>
@endsection