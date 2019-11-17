@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="body table-responsive">
                        <table class="table table-hover">
							<thead>
					            <tr>
					                <th>#</th>
					                <th>{{ __('events.index.table.name') }}</th>
					                <th>{{ __('events.index.table.date') }}</th>
					                <th>{{ __('events.index.table.time') }}</th>
					                <th>{{ __('events.index.table.options') }}</th>
					            </tr>
					        </thead>
					        <tbody>
                                @foreach ($events as $event)
                                    <tr>
                                        <td>{{ $event->id }}</td>
                                        <td>{{ $event->name }}</td>
                                        <td>{{ $event->date }}</td>
                                        <td>{{ $event->time }}</td>
                                        <td>
                                                @if(\App\EventAttendance::where('event_id', $event->id)->where('user_id', Auth::id())->count())
                                                @if(\App\EventAttendance::where('event_id', $event->id)->where('user_id', Auth::id())->first()->status == 1)
                                                    <a href="" class="btn btn-success disabled" disabled="">{{ __('events.show.attending') }}</a>
                                                @else
                                                    <a href="{{ route('attendance', [$event->id, 1]) }}" class="btn btn-success">{{ __('events.show.attending') }}</a>
                                                @endif
                                                @if(\App\EventAttendance::where('event_id', $event->id)->where('user_id', Auth::id())->first()->status == 0)
                                                    <a href="" class="btn btn-danger disabled" disabled="">{{ __('events.show.not_attending') }}</a>
                                                @else
                                                    <a href="{{ route('attendance', [$event->id, 0]) }}" class="btn btn-danger">{{ __('events.show.not_attending') }}</a>
                                                @endif
                                            @else
                                                <a href="{{ route('attendance', [$event->id, 1]) }}" class="btn btn-success">{{ __('events.show.attending') }}</a>
                                                <a href="{{ route('attendance', [$event->id, 0]) }}" class="btn btn-danger">{{ __('events.show.not_attending') }}</a>
                                            @endif
                    
                                        </td>
                                    </tr>
                                @endforeach
					        </tbody>
						</table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
