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
                                    <td><input id="date=$date->format('d.m.Y')&meal=zmorge" name="" type="checkbox" /></td>
                                    <td><input id="date=$date->format('d.m.Y')&meal=zmittag" type="checkbox" /></td>
                                    <td><input id="date=$date->format('d.m.Y')&meal=znacht" type="checkbox" /></td>
                                    <td><input id="date=$date->format('d.m.Y')&meal=mitnae" type="checkbox" /></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="input-group" id="adv-search">
                        <input />
                        <button onclick="location.href='{{ route('add-profile-presence') }}'" type="button" class="btn btn-primary form-control mt-2">Anwesenheit Erfassen</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
