@extends('layouts.app')

@section('title', 'Task List')

@section('content')
    <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <h1 style="font-size: 2.5em; color: #4CAF50; text-align: center; margin-bottom: 20px;">The List of Tasks</h1>

        <!-- Display success message -->
        @if (session('success'))
            <div id="success-message"
                style="background: #d4edda; color: #155724; padding: 10px 20px; border: 1px solid #c3e6cb; border-radius: 5px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        <ul style="list-style: none; padding: 0; margin: 0;">
            @forelse ($tasks as $task)
                <li
                    style="padding: 15px 20px; border-bottom: 1px solid #ddd; display: flex; justify-content: space-between; align-items: center;">
                    <a href="{{ route('tasks.show', ['id' => $task->id]) }}"
                        style="text-decoration: none; color: #4CAF50; font-size: 1.2em;">
                        {{ $task->title }}
                    </a>

                    <!-- Edit Button -->
                    <a href="{{ route('tasks.edit', ['id' => $task->id]) }}"
                        style="padding: 8px 15px; background: #FFC107; color: white; border-radius: 5px; text-decoration: none; font-size: 0.9em; font-weight: bold; transition: background-color 0.3s ease; margin-left: 10px;">
                        Edit
                    </a>
                </li>
            @empty
                <p style="text-align: center; color: #999; font-size: 1.2em; margin-top: 20px;">There are no tasks!</p>
            @endforelse
        </ul>
        <div style="text-align: center; margin-top: 20px;">
            <a href="{{ route('tasks.create') }}"
                style="display: block; text-decoration: none; padding: 10px 20px; background: #4CAF50; color: white; border-radius: 5px; font-weight: bold; transition: background-color 0.3s ease;">
                Add New Task
            </a>
        </div>
    </div>

    <script>
        // Hide the success message after 3 seconds
        setTimeout(() => {
            const successMessage = document.getElementById('success-message');
            if (successMessage) {
                successMessage.style.transition = 'opacity 0.5s ease';
                successMessage.style.opacity = '0';
                setTimeout(() => successMessage.remove(), 500); // Remove from DOM after fade-out
            }
        }, 3000);
    </script>
@endsection
