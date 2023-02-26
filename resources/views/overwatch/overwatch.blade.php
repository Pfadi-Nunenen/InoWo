@extends('layouts.app')

@section('content')
    <div class="col-12">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        <button class="btn btn-primary col-10 offset-1" onclick="location.href='{{ route('profile') }}'">Meine Anwesenheiten erfassen</button>

        <div class="mb-3"></div>

        <div class="card col-md-10 offset-md-1">
            <div class="card-header">
                <h5>Heute ({{ today() }})</h5>
            </div>
            <div class="card-body">
                <h5>Z'Morge</h5>
                <p>Anzahl Personen: {{ 5 }}</p>

                <h5>Z'Mittag</h5>
                <p>Anzahl Personen: {{ 5 }}</p>

                <h5>Z'Nacht</h5>
                <p>Anzahl Personen: {{ 5 }}</p>
            </div>
        </div>

        <br />

        <div class="card col-md-10 offset-md-1">
            <div class="card-header">
                <h5>Morgen ({{ today() }})</h5>
            </div>
            <div class="card-body">
                <h5>Z'Morge</h5>
                <p>Anzahl Personen: {{ 5 }}</p>

                <h5>Z'Mittag</h5>
                <p>Anzahl Personen: {{ 5 }}</p>

                <h5>Z'Nacht</h5>
                <p>Anzahl Personen: {{ 5 }}</p>
            </div>
        </div>
    </div>
@endsection
