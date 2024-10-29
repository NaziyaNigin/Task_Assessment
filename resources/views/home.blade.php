<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Task Page</title>
</head>
<body>
    <form id="home-form">
    <div class="container">
        <h1 align="center">Tasks </h1>
        <a href="{{ route('create.task') }}" class="btn btn-success" style="float : right">New Task</a>
    </div>
    <br><br>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Status</th>
            <th scope="col">Creation Date</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <th scope="row">{{ $tasks->firstItem() + $loop->index }}</th>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->status_text }}</td>
                    <td>{{ $task->created_at }}</td>
                    <td><a href="{{ route('edit.task',encrypt($task->task_id)) }}" class="btn btn-primary">Edit</a></td>
                    <td><a href="{{ route('delete.task',encrypt($task->task_id)) }}" class="btn btn-danger">Delete</a></td>
                </tr>
        </tbody>
        @endforeach
      </table>
    <div>
        {{ $tasks->links() }}
    </div>
    </form>
</body>
</html>
