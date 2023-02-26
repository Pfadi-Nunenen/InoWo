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
                <h5>Anmeldungen pro Tag</h5>
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
                                <td>
                                    {{ $mealType[1] }}
                                </td>
                                <td>
                                    {{ $mealType[2] }}
                                </td>
                                <td>
                                    {{ $mealType[3] }}
                                </td>
                                <td>
                                    {{ $mealType[4] }}
                                </td>
                            </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
