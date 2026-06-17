<!DOCTYPE html>
<html>
<head>
    <title>Laravel Todo List</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          rel="stylesheet">

    
   <style>
    body {
        background: linear-gradient(135deg, #7f8bc2, #c2a0e4);
        min-height: 100vh;
        font-family: 'Segoe UI', sans-serif;
    }

    .container {
        max-width: 900px;
    }

    .card-box {
        background: #ffffff;
        padding: 25px;
        border-radius: 16px;
        box-shadow: 0 15px 40px rgba(0,0,0,0.25);
        margin-top: 40px;
    }

    h2 {
        font-weight: 800;
        color: #4b0082;
        text-align: center;
        margin-bottom: 25px;
    }

    .input-group input {
        border-radius: 12px 0 0 12px;
        border: 2px solid #6c63ff;
    }

    .input-group .btn {
        border-radius: 0 12px 12px 0;
        background: #6c63ff;
        border: none;
        font-weight: bold;
    }

    .input-group .btn:hover {
        background: #4b44d4;
    }

    table {
        background: #fff;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0,0,0,0.15);
    }

    thead {
        background: linear-gradient(90deg, #6c63ff, #8e44ad);
        color: white;
        text-align: center;
    }

    tbody tr {
        transition: 0.3s;
    }

    tbody tr:hover {
        background: #f3f0ff;
        transform: scale(1.01);
    }

    td {
        text-align: center;
        vertical-align: middle;
    }

    .btn-success {
        background: #28c76f;
        border: none;
    }

    .btn-success:hover {
        background: #1fa85b;
    }

    .btn-warning {
        background: #ff9f43;
        border: none;
        color: white;
    }

    .btn-warning:hover {
        background: #e8892f;
    }

    .btn-danger {
        background: #ea5455;
        border: none;
    }

    .btn-danger:hover {
        background: #d43c3c;
    }

    .badge {
        padding: 8px 12px;
        border-radius: 20px;
        font-size: 12px;
    }

    .bg-success {
        background: #28c76f !important;
    }

    .bg-warning {
        background: #ff9f43 !important;
        color: #fff !important;
    }

    del {
        color: #888;
    }
</style>

</head>
<body>

<div class="container mt-5 card-style">

    <h2 class="mb-4">Todo List</h2>

    <form action="{{ route('todos.store') }}" method="POST">
        @csrf

        <div class="input-group mb-4">
            <input
                type="text"
                name="title"
                class="form-control"
                placeholder="Enter Task">

            <button class="btn btn-primary">
                Add Task
            </button>
        </div>
    </form>

    @if($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>ID</th>
                <th>Task</th>
                <th>Status</th>
                <th width="250">Action</th>
            </tr>
        </thead>

        <tbody>

            @forelse($todos as $todo)

            <tr>

                <td>{{ $todo->id }}</td>

                <td>
                    @if($todo->completed)
                        <del>{{ $todo->title }}</del>
                    @else
                        {{ $todo->title }}
                    @endif
                </td>

                <td>
                    @if($todo->completed)
                        <span class="badge bg-success">Completed</span>
                    @else
                        <span class="badge bg-warning text-dark">Pending</span>
                    @endif
                </td>

                <td>

                    <form action="{{ route('todos.complete',$todo->id) }}"
                          method="POST"
                          class="d-inline">

                        @csrf
                        @method('PATCH')

                        <button class="btn btn-success btn-sm">
                            Done
                        </button>
                    </form>

                    <a href="{{ route('todos.edit',$todo->id) }}"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('todos.destroy',$todo->id) }}"
                          method="POST"
                          class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Delete task?')">
                            Delete
                        </button>

                    </form>

                </td>

            </tr>

            @empty

            <tr>
                <td colspan="4" class="text-center">
                    No Tasks Found
                </td>
            </tr>

            @endforelse

        </tbody>

    </table>

</div>

</body>
</html>