{{-- @extends('layouts.app'); --}}

{{-- @section('content') --}}
<x-app-layout>
    <div class="container m-3">
        <h1>Create Task</h1>
        <a href="{{ route('tasks.index') }}" class="btn btn-danger float-end my-2"> Back </a>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                    
                @endforeach
            </ul>
        </div>
            
        @endif

        <form action="{{ route('tasks.store') }}" method="post" >
            @csrf
            <div class="form-group mb-3">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" id="description">{{ old('description') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
        
    
    </div>
</x-app-layout>
