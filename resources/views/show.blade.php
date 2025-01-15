@extends('layouts.app')

@section('title', 'Task Details')

@section('content')
    <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <h1 style="font-size: 2.5em; color: #4CAF50; text-align: center; margin-bottom: 20px;">
            {{ $task->title }}
        </h1>
        <p>
            <span style="font-weight: bold; color: #555;">Description:</span>
            <span style="color: #666;">{{ $task->description }}</span>
        </p>
        @if ($task->long_description)
            <p>
                <span style="font-weight: bold; color: #555;">Long Description:</span>
                <span style="color: #666;">{{ $task->long_description }}</span>
            </p>
        @endif
        <p>
            <span style="font-weight: bold; color: #555;">Completed:</span>
            <span
                style="
                font-weight: bold;
                color: white;
                padding: 5px 10px;
                border-radius: 5px;
                background: {{ $task->completed ? '#4CAF50' : '#ff7043' }};">
                {{ $task->completed ? 'Yes' : 'No' }}
            </span>
        </p>
        <p>
            <span style="font-weight: bold; color: #555;">Created At:</span>
            <span style="color: #999;">{{ $task->created_at }}</span>
        </p>
        <p>
            <span style="font-weight: bold; color: #555;">Updated At:</span>
            <span style="color: #999;">{{ $task->updated_at }}</span>
        </p>

        <!-- Button to return to the tasks page -->
        <div style="text-align: center; margin-top: 20px;">
            <a href="{{ route('tasks.index') }}"
                style="
                   text-decoration: none;
                   padding: 10px 20px;
                   display: block;
                   background: #4CAF50;
                   color: white;
                   border-radius: 5px;
                   font-weight: bold;
                   transition: background 0.3s ease;
                   margin-top: 20px;">
                Back to Tasks
            </a>
        </div>
    </div>
@endsection
