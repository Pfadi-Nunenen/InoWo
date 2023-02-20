@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h5 class="float-start">Profil</h5>

                <a href="{{  route('overwatch') }}" class="float-end">Zurück zu Overwatch</a>
            </div>
            <div class="card-body">
                Pfadiname: {{ $user->scout_name ?? '' }} <br />
                Name: {{ $user->first_name }} {{ $user->last_name }} <br />
                E-Mail: {{ $user->email }}
            </div>
        </div>

        <div class="clearfix p-3"></div>

        <div class="card">
            <div class="card-header">
                <h5 class="float-start">Anwesenheit & Essen</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th>Z'Morge</th>
                            <th>Z'Mittag</th>
                            <th>Z'Nacht</th>
                            <th>Mitnäh</th>
                        </tr>
                        <tr>
                            <th>Mahlzeit</th>
                            @foreach($period as $date)
                                <th>{{ $date->format('d.m.Y') }} ({{ $date->locale('de')->dayName }})</th>
                            @endforeach
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="clearfix p-3"></div>

        <div class="card">
            <div class="card-header">
                <h5 class="float-start">Belege & Einkäufe</h5>
            </div>
            <div class="card-body">

            </div>
        </div>
    </div>
@endsection
