<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>New Task</title>
</head>
<body>
    <form id="create-form" method="POST" action="{{ route('save.task') }}">
        @csrf
        <h1>Create a New Task</h1><br>

        <div class="container">
            <a href="{{ route('home') }}" class="btn btn-success" style="float : right">Home</a>
        </div>
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control"  placeholder="Enter Title" required>
            @error('title')<p style="color: red;" class="alert-danger">{{ $message }}</p>@enderror
        </div>
            <div class="form-group">
            <label>Description</label>
            <input type="text" name="description" class="form-control"  placeholder="Enter Description" required>
            @error('description')<p style="color: red;" class="alert-danger">{{ $message }}</p>@enderror
        </div>
        <div class="form-group" required>
            <label>Status</label>
            <select class="form-control" name="status">
                <option value="1">Completed</option>
                <option value="0">Pending</option>
            </select>
            <p></p>
        </div>
        <button id="btnSubmit" type="submit" class="btn btn-primary">Submit</button>
        <span id="output"></span>
    </form>
    <script>
        $(document).ready(function(){
            $("#create-form").submit(function(event){
                event.preventDefault();

                var form = $("#create-form")[0];
                var data = new FormData(form);

                $("#btnSubmit").prop("disabled",true);

                $.ajax({
                    type:"POST",
                    url:"{{ route('save.task') }}",
                    data:data,
                    processData:false,
                    contentType:false,
                    success:function(data){
                        $("#output").text(data.res);
                        $("#btnSubmit").prop("disabled",false);
                        $("input[type='text']").val('');
                    },
                    error:function(e)
                    {
                        $("#output").text(e.resposeText);
                        $("#btnSubmit").prop("disabled",false);
                        $("input[type='text']").val('');
                    }
                });
            });
        });
    </script>
</body>
</html>
