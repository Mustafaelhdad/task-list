@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <h1 style="font-size: 2.5em; color: #4CAF50; text-align: center; margin-bottom: 20px;">
            {{ $task->title }}
        </h1>

        <p style="font-size: 1.2em; color: #555; margin-bottom: 20px; line-height: 1.6;">
            <strong>Description:</strong><br>
            {{ $task->description }}
        </p>

        @if ($task->long_description)
            <p style="font-size: 1.2em; color: #555; margin-bottom: 20px; line-height: 1.6;">
                <strong>Long Description:</strong><br>
                {{ $task->long_description }}
            </p>
        @endif

        <p style="font-size: 1.2em; color: #555; margin-bottom: 20px; line-height: 1.6;">
            <strong>Status:</strong><br>
            @if ($task->completed)
                <span style="color: #4CAF50; font-weight: bold;">Completed</span>
            @else
                <span style="color: #FF4D4D; font-weight: bold;">Not Completed</span>
            @endif
        </p>

        <div style="text-align: center; margin-top: 20px;">
            <a href="{{ route('tasks.index') }}"
                style="display: inline-block; text-decoration: none; padding: 10px 20px; background: #4CAF50; color: white; border-radius: 5px; font-weight: bold; transition: background-color 0.3s ease;">
                Back to Tasks
            </a>
            <a href="{{ route('tasks.edit', ['task' => $task->id]) }}"
                style="display: inline-block; text-decoration: none; padding: 10px 20px; background: #FFC107; color: white; border-radius: 5px; font-weight: bold; transition: background-color 0.3s ease; margin-left: 10px;">
                Edit Task
            </a>
            <form style="display: inline;" action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                    style="padding: 10px 20px; background: #FF4D4D; color: white; border: none; border-radius: 5px; font-weight: bold; cursor: pointer; transition: background-color 0.3s ease; margin-left: 10px;"
                    onclick="return confirm('Are you sure you want to delete this task?')">
                    Delete Task
                </button>
            </form>
        </div>
    </div>
@endsection
