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
                <h5 class="float-start">Anwesenheit & Essen</h5>
            </div>
            <div class="card-body">
                <form>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <tr>
                                <th>Mahlzeit</th>
                                <th>Z'Morge</th>
                                <th>Z'Mittag</th>
                                <th>Z'Nacht</th>
                                <th>Mitnäh</th>
                            </tr>

                            @foreach($period as $date)
                                <tr>
                                    <td>{{ $date->format('d.m.Y') }} ({{ $date->locale('de')->dayName }})</td>
                                    <td><input type="checkbox" /></td>
                                    <td><input type="checkbox" /></td>
                                    <td><input type="checkbox" /></td>
                                    <td><input type="checkbox" /></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="input-group" id="adv-search">
                        <button onclick="location.href='{{ route('add-profile-presence') }}'" type="button" class="btn btn-primary form-control mt-2">Anwesenheit Erfassen</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
