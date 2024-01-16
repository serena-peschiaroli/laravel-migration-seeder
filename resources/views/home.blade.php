@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <h1> In partenza oggi:</h1>
        @foreach ($trains as $train)
            <div class="col">
                <div class="card">
                     <p class="card-text"> {{ $train->azienda}} </p>
                     <p class="card-text"> {{ $train->codice_treno}} </p>
                     <p class="card-text"> Partenza: {{ $train->orario_di_partenza }} </p>
                     <p class="card-text"> arrivo: {{ $train->data_di_arrivo }} ,{{ $train->orario_di_arrivo }} </p>
                </div>
            </div>
        @endforeach
       
    </div>
</div>
    
@endsection