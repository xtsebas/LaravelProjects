@extends('layouts.app')

@section('title', 'Edit Task')

@section('styles')
    <style>
        .error{
            color:red;
            font-size: 0.8rem;
        }
    </style>
@endsection

@section('content')
    <form method="POST" action="{{ route('tasks-update', ['task' => $task->id]) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="title">
                Title
            </label>
            <input type="text" name="title" id="title" value="{{ $task->title }}" />
            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description">
                Description
            </label>
            <textarea type="text" name="description" id="description" rows="5">{{ $task->description }}</textarea>
            @error('description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        
        <div>
            <label for="long_description">
                Long Description
            </label>
            <textarea type="text" name="long_description" id="long_description" rows="10">{{ $task->long_description }}</textarea>
            @error('long_description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        
        <div>
            <button type="submit"> Edit Task</button>
        </div>
    </form>
@endsection