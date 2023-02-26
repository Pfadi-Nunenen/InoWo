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

                <a href="{{  route('profile') }}" class="float-end">Zurück zum Profil</a>
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

                            @foreach($meals as $day => $mealType)
                                <tr>
                                    <td>
                                        {{ $day }}
                                    </td>

                                    @if($mealType[1] == 1)
                                        <td>
                                            <input class="form-check-input" name="zmorge[{{ $day }}]" type="checkbox" checked />
                                        </td>
                                    @else
                                        <td>
                                            <input class="form-check-input" name="zmorge[{{ $day }}]" type="checkbox" />
                                        </td>
                                    @endif

                                    @if($mealType[2] == 1)
                                        <td>
                                            <input class="form-check-input" name="zmittag[{{ $day }}]" type="checkbox" checked />
                                        </td>
                                    @else
                                        <td>
                                            <input class="form-check-input" name="zmittag[{{ $day }}]" type="checkbox" />
                                        </td>
                                    @endif

                                    @if($mealType[3] == 1)
                                        <td>
                                            <input class="form-check-input" name="znacht[{{ $day }}]" type="checkbox" checked />
                                        </td>
                                    @else
                                        <td>
                                            <input class="form-check-input" name="znacht[{{ $day }}]" type="checkbox" />
                                        </td>
                                    @endif

                                    @if($mealType[4] == 1)
                                        <td>
                                            <input class="form-check-input" name="mitnae[{{ $day }}]" type="checkbox" checked />
                                        </td>
                                    @else
                                        <td>
                                            <input class="form-check-input" name="mitnae[{{ $day }}]" type="checkbox" />
                                        </td>
                                    @endif
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
