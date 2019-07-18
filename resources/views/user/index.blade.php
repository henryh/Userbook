@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-4">
                            Phone book
                        </div>
                        <div class="col-8 text-right">
                            <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#search">&#128269;</button>
                            <a class="btn btn-sm btn-success" href="{{ route('user.index') }}">All users</a>
                            <a class="btn btn-sm btn-success" href="{{ route('user.favourites') }}">Favourite</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><a href="{{ route('user.action.sort', 'name') }}">Name</a></th>
                                <th><a href="{{ route('user.action.sort', 'email') }}">Email</a></th>
                                <th><a href="{{ route('user.action.sort', 'phone') }}">Phone</a></th>
                                <th class="text-right">Favourite</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th>{{ $user->name }}</th>
                                    <th>{{ $user->email }}</th>
                                    <td>{{ $user->phone }}</td>
                                    <td class="text-right">
                                        <a href="{{ route('user.action.favourite', $user->id) }}" class="btn btn-sm
                                            @if (!$user->favourites->isEmpty())
                                                btn-warning
                                            @else
                                                btn-outline-warning
                                            @endif
                                        " title="favourites">&#9733;</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        @if ($users->isEmpty()) No items @endif
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" role="dialog" id="search">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="get" action="{{ route('user.search') }}">
                    <div class="modal-header">
                        <h5 class="modal-title">Search</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" value="" name="search_text" class="form-control" placeholder="Enter text" autofocus>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection