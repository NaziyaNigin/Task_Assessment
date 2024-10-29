<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Edit Task</title>
</head>
<body>
    <form method="post" action="{{ route('update.task') }}">
        @csrf
        @method('PUT')
        <h1>Update Task</h1><br>
        <div class="container">
            <a href="{{ route('home') }}" class="btn btn-success" style="float : right">Home</a>
        </div>
        <div class="form-group">
            <input type="hidden" name="task_id" value="{{ encrypt($tasks->task_id) }}" class="form-control">
        </div>
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control"  placeholder="Enter Title" value="{{ $tasks->title }}">
            @error('title')<p style="color: red;" class="alert-danger">{{ $message }}</p>@enderror
        </div>
            <div class="form-group">
            <label>Description</label>
            <input type="text" name="description" class="form-control"  placeholder="Enter Description" value="{{ $tasks->description }}" >
            @error('description')<p style="color: red;" class="alert-danger">{{ $message }}</p>@enderror
        </div>
        <div class="form-group" required>
            <label>Status</label>
            <select class="form-control" name="status">
                <option value="1" @if( $tasks-> status == 1) selected="selected" @endif >Completed</option>
                <option value="0"@if( $tasks-> status == 0) selected="selected" @endif >Pending</option>
            </select>
            <p></p>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</body>
</html>
