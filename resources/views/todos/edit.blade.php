<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #7f8bc2, #c2a0e4);
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
        }

        .edit-box {
            max-width: 500px;
            margin: 80px auto;
            background: #fff;
            padding: 30px;
            border-radius: 18px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.25);
        }

        h2 {
            text-align: center;
            font-weight: 800;
            color: #4b0082;
            margin-bottom: 25px;
        }

        label {
            font-weight: 600;
            color: #333;
        }

        .form-control {
            border-radius: 12px;
            border: 2px solid #6c63ff;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #4b44d4;
        }

        .btn-primary {
            background: #6c63ff;
            border: none;
            border-radius: 12px;
            font-weight: bold;
        }

        .btn-primary:hover {
            background: #4b44d4;
        }

        .btn-secondary {
            border-radius: 12px;
        }

        .btn-group {
            display: flex;
            gap: 10px;
        }

        .title-icon {
            font-size: 30px;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>

</head>
<body>

<div class="edit-box">

    <div class="title-icon">✏️</div>

    <h2>Edit Task</h2>

    <form action="{{ route('todos.update',$todo->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Task Title</label>
            <input type="text"
                   name="title"
                   value="{{ $todo->title }}"
                   class="form-control"
                   required>
        </div>

        <div class="btn-group mt-4">

            <button class="btn btn-primary w-100">
                Update Task
            </button>

            <a href="{{ route('todos.index') }}"
               class="btn btn-secondary w-100">
                Back
            </a>

        </div>

    </form>

</div>

</body>
</html>