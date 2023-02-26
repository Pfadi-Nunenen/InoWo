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
                <h5>Anwesenheit & Essen</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th>Mahlzeit</th>
                            <th>Z'Morge</th>
                            <th>Z'Mittag</th>
                            <th>Z'Nacht</th>
                            <th>Mitnäh</th>
                        </tr>
                        @foreach($meals as $day => $mealType)
                            <tr>
                                <td>
                                    {{ $day }}
                                </td>

                                @if($mealType[1] == 1)
                                    <td>
                                        <i class="fa fa-check fa-2x icon-green" aria-hidden="true"></i>
                                    </td>
                                @else
                                    <td>
                                        <i class="fa fa-times fa-2x icon-red" aria-hidden="true"></i>
                                    </td>
                                @endif

                                @if($mealType[2] == 1)
                                    <td>
                                        <i class="fa fa-check fa-2x icon-green" aria-hidden="true"></i>
                                    </td>
                                @else
                                    <td>
                                        <i class="fa fa-times fa-2x icon-red" aria-hidden="true"></i>
                                    </td>
                                @endif

                                @if($mealType[3] == 1)
                                    <td>
                                        <i class="fa fa-check fa-2x icon-green" aria-hidden="true"></i>
                                    </td>
                                @else
                                    <td>
                                        <i class="fa fa-times fa-2x icon-red" aria-hidden="true"></i>
                                    </td>
                                @endif

                                @if($mealType[4] == 1)
                                    <td>
                                        <i class="fa fa-check fa-2x icon-green" aria-hidden="true"></i>
                                    </td>
                                @else
                                    <td>
                                        <i class="fa fa-times fa-2x icon-red" aria-hidden="true"></i>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="input-group" id="adv-search">
                    <button onclick="location.href='{{ route('add-profile-presence') }}'" type="button" class="btn btn-primary form-control mt-2">Anwesenheit Erfassen</button>
                </div>
            </div>
        </div>

        <div class="clearfix p-3"></div>

        <div class="card">
            <div class="card-header">
                <h5>Belege & Einkäufe</h5>
            </div>
            <div class="card-body">

            </div>
        </div>
    </div>
@endsection
