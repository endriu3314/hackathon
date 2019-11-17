@extends('layouts.app')

@section('css')
    <style type="text/css">
        a {
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <div class="card w-100">
        <div class="card-body row">
            <div class="col-8">
                <div class="form-group">
                    <label>Nume</label>
                    <input value="{{ $event->name }}" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label>Data</label>
                    <input value="{{ \Carbon\Carbon::parse($event->timestamp)->toFormattedDateString() }}" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label>Ora</label>
                    <input value="{{ \Carbon\Carbon::parse($event->timestamp)->toTimeString() }} @if($event->timezone == null) GMT @else {{ $event->timezone }} @endif" class="form-control" disabled>
                </div>
            </div>
            <div class="col-4">
                <div class="row">
                <h1>Attendance</h1>
                @if(\App\EventAttendance::where('event_id', $event->id)->where('user_id', Auth::id())->count())
                @if(\App\EventAttendance::where('event_id', $event->id)->where('user_id', Auth::id())->first()->status == 1)
                    <a href="" class="btn btn-success btn-block center-block disabled" disabled="">Participa</a>
                @else
                    <a href="{{ route('attendance', [$event->id, 1]) }}" class="btn btn-success btn-block center-block">Participa</a>
                @endif
                @if(\App\EventAttendance::where('event_id', $event->id)->where('user_id', Auth::id())->first()->status == 0)
                    <a href="" class="btn btn-danger btn-block center-block disabled" disabled="">Nu Participa</a>
                @else
                    <a href="{{ route('attendance', [$event->id, 0]) }}" class="btn btn-danger btn-block center-block">Nu Participa</a>
                @endif
                @else
                    <a href="{{ route('attendance', [$event->id, 1]) }}" class="btn btn-success btn-block center-block">Participa</a>
                    <a href="{{ route('attendance', [$event->id, 0]) }}" class="btn btn-danger btn-block center-block">Nu Participa</a>
                @endif
                </div>
                <div class="row">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nume</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attending as $item)
                                <tr>
                                    <td>{{ $item->user_id}}</td>
                                    <td>{{ \App\User::find($item->user_id)->name }}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
