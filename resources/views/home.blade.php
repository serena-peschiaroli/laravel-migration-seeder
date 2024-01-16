@extends('layouts.app')

@section('content')

<div class="container">
    <h1> In partenza oggi:</h1>
    <div class="row row-cols-3 gy-4 justify-content-center">
        @foreach ($trains as $train)
            <div class="col d-flex align-items-stretch">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">{{ $train->azienda}}, # {{ $train->codice_treno}} </h6>
                        <ul class="list-unstyled">
                            
                            <li class="list-group-item"> Partenza da: {{ $train->stazione_di_partenza }}</li>
                            <li class="list-group-item">Ore: {{ $train->orario_di_partenza }}</li>
                            <li class="list-group-item">Arrivo: {{ $train->stazione_di_arrivo }}, ora: {{ $train->orario_di_arrivo }}</li>
                            <li class="list-group-item">Cancellato: @if($train->e_cancellato) TRENO CANCELLATO @else Nessuna Cancellazione @endif</li>
                            @if (!$train->e_cancellato)
                                <li class="list-group-item">In orario: @if($train->in_orario) Sì @else RITARDO @endif</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
    
@endsection
