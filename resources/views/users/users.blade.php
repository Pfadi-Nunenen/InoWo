@extends('layouts.app')

@section('content')
    <div class="col-12">
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-header">
                    <form method="POST" action="." accept-charset="UTF-8" role="form" class="needs-validation">
                        @csrf

                        <div class="input-group" id="adv-search">
                            <input id="search" class="form-control" placeholder="Suche" autofocus name="search" type="text" />
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary form-control">
                                    <span class="fa fa-search"></span>
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="input-group" id="adv-search">
                        <button onclick="location.href='{{ route('add-users') }}'" type="button" class="btn btn-primary form-control mt-2">Neuer Benutzer</button>
                    </div>
                </div>
            </div>

            <div class="clearfix p-3"></div>

            <div class="card">
                <div class="card-header">
                    <h5 class="float-left">Benutzer</h5>

                    <a href="{{  route('overwatch') }}" class="float-right">Zurück zu Overwatch</a>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <th>Name</th>
                        <th>E-Mail</th>
                        <th>Rolle</th>
                        <th>Optionen</th>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>
                                    @if($user->scout_name)
                                        {{ $user->first_name . " " . $user->last_name }} {{ $user->scout_name ? " / " . $user->scout_name : "" }}
                                    @else
                                        {{ $user->first_name }} {{ $user->last_name }}
                                    @endif
                                </td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <td>
                                    {{ $user->getRoleNames()->first() }}
                                </td>
                                <td>
                                    <button onclick="location.href='{{ route('edit-users',$user->id) }}'" class="btn btn-danger ml-2"><span class="fa fa-edit"></span></button>
                                    <button onclick="location.href='{{ route('destroy-users',$user->id) }}'" class="btn btn-danger ml-2"><span class="fa fa-remove"></span></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
