@extends('layouts.app')

@section('title', 'TASKS LIST')

@section('content')
    <nav class="mb-4">
        <a href="{{ route('tasks-create') }}" class="link">Add task</a>
    </nav>
    @forelse ($tasks as $task)
        <div>
            <a href="{{ route('tasks-show', ['task' => $task->id]) }}" 
                class="{{ $task->completed ? 'line-through' : '' }}">{{ $task->title }}</a>
        </div>
    @empty
        <p>Nothing</p>
    @endforelse
    @if ($tasks->count())
        <nav class="mt-4">
            {{ $tasks->links() }}
        </nav>
    @endif
@endsection