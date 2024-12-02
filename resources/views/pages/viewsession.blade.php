<!-- resources/views/pages/view_sessions.blade.php -->

@extends('layouts.default')

@section('content')
<div class="container">
    <h1>Sessions for Event: {{ $event->title }}</h1>

    @if($sessions->isEmpty())
        <p>No sessions are scheduled for this event.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Speaker</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sessions as $session)
                    <tr>
                        <td>{{ $session->title }}</td>
                        <td>{{ $session->speaker }}</td>
                        <td>{{ \Carbon\Carbon::parse($session->start_time)->format('H:i') }}</td>
                        <td>{{ \Carbon\Carbon::parse($session->end_time)->format('H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection