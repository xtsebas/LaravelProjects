@extends('layouts.app')

@section('title', 'TASKS LIST')

@section('content')
    @forelse ($tasks as $task)
        <div>
            <a href="{{ route('tasks-show', ['task' => $task->id]) }}">{{ $task->title }}</a>
        </div>
    @empty
        <p>Nothing</p>
    @endforelse
@endsection