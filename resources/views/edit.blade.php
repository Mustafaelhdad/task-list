@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')
    <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <h1 style="font-size: 2.5em; color: #4CAF50; text-align: center; margin-bottom: 20px;">Edit Task</h1>

        @if ($errors->any())
            <div style="background: #ffebee; color: #d32f2f; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form style="display: flex; flex-direction: column; gap: 15px;"
            action="{{ route('tasks.update', ['task' => $task->id]) }}" method="POST">
            @csrf
            @method('PUT') <!-- Method Spoofing for PUT -->

            <div>
                <label for="title" style="font-weight: bold; color: #555;">Title:</label><br>
                <input id="title" name="title" type="text" value="{{ old('title', $task->title) }}"
                    style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            </div>

            <div>
                <label for="description" style="font-weight: bold; color: #555;">Description:</label><br>
                <textarea id="description" name="description"
                    style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;" rows="3">{{ old('description', $task->description) }}</textarea>
            </div>

            <div>
                <label for="long_description" style="font-weight: bold; color: #555;">Long Description
                    (optional):</label><br>
                <textarea id="long_description" name="long_description"
                    style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;" rows="4">{{ old('long_description', $task->long_description) }}</textarea>
            </div>

            <div style="text-align: center; margin-top: 20px;">
                <button type="submit"
                    style="padding: 10px 20px; background: #4CAF50; color: white; border: none; border-radius: 5px; font-weight: bold; cursor: pointer; transition: background-color 0.3s ease;">
                    Update Task
                </button>
            </div>
        </form>
    </div>
@endsection
