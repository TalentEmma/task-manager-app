
<x-app-layout>
    <div class="container m-3">
        <h1>Your Tasks</h1>
            <a href="{{ route('tasks.create') }}" class="btn btn-primary my-3">Create New Task</a>
    
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        
            
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th colspan="2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tasks as $task)
                       
                            <tr>
                                <td>{{ $task->title }}</td>
                                <td>{{ $task->description }}</td>
                                <td> {{ $task->status }} </td>
                                <td>
                                    <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('tasks.destroy', $task) }}" method="post" style="display: inline-block" onsubmit="return confirm('Are you sure you want to delete this task?');" >
                                    @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <p class="muted"> No task found, <a href="{{ route('tasks.create') }}">Create your first task</a> </p>
                            </tr>                        
                        @endforelse
                    </tbody>
                </table>
            </div>



    
        
    
    </div>
</x-app-layout>
