
<x-app-layout>
    <div class="container m-3">
        <h1>Edit Task</h1>
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

        <form action="{{ route('tasks.update', $task) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">  
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" value="{{ $task->title }}" required>
            </div>
            <div class="form-group mb-3">  
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="pending" {{ $task->status == 'pending' ? 'selected' : ''  }} >Pending</option>
                    <option value="in progress" {{ $task->status == 'in progress' ? 'selected' : ''  }} >In progress</option>
                    <option value="completed" {{ $task->status == 'completed' ? 'selected' : ''  }} >Completed</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" id="description">{{ $task->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        
    
    </div>
</x-app-layout>
