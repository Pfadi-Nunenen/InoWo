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

                <a href="{{  route('overwatch') }}" class="float-end">Zurück zum Profil</a>
            </div>
            <div class="card-body">
                <form action="{{ route('save-profile-presence') }}" method="POST">
                    @csrf

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
                                    <td><input name="zmorge[{{$date->format('d.m.Y')}}]" type="checkbox" /></td>
                                    <td><input name="zmittag[{{$date->format('d.m.Y')}}]" type="checkbox" /></td>
                                    <td><input name="znacht[{{$date->format('d.m.Y')}}]" type="checkbox" /></td>
                                    <td><input name="mitnae[{{$date->format('d.m.Y')}}]" type="checkbox" /></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="input-group" id="adv-search">
                        <input class="btn btn-primary form-control mt-2" type="submit" value="Speichern" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
