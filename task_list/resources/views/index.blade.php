

<div>
    <h1>
        The tasks list
    </h1>

    @forelse ($tasks as $task)
        <h3>{{ $task->title }}</h3>
    @empty
        <p>Nothing</p>
    @endforelse
</div>