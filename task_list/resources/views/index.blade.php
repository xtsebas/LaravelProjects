@extends('layouts.app')

@section('title', 'TASKS LIST')

@section('content')
    <div>
        <a href="{{ route('tasks-create') }}">Add task</a>
    </div>
    @forelse ($tasks as $task)
        <div>
            <a href="{{ route('tasks-show', ['task' => $task->id]) }}">{{ $task->title }}</a>
        </div>
    @empty
        <p>Nothing</p>
    @endforelse
    @if ($tasks->count())
        <nav>
            {{ $tasks->links() }}
        </nav>
    @endif
@endsection