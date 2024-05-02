<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Other meta tags and CSS links -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Your content here -->
    <br>
    <br>
    <div class="container">
    <h1>Edit Task</h1>
    <form action="{{ route('tasks.update', $task->id ) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ $task->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="priority">Priority</label>
            <select class="form-control" id="priority" name="priority" required>
                <option value="low" @if($task->priority == 'low') selected @endif>Low</option>
                <option value="medium" @if($task->priority == 'medium') selected @endif>Medium</option>
                <option value="high" @if($task->priority == 'high') selected @endif>High</option>
            </select>
        </div>

        <div class="form-group">
            <label for="assignment_Date"> Assignment Date</label>
            <input type="date" class="form-control" id="assignment_Date" name="assignment_Date" value="{{ $task->assignment_Date }}">
        </div>

        <div class="form-group">
            <label for="delivery_Date"> Delivery Date</label>
            <input type="date" class="form-control" id="delivery_Date" name="delivery_Date" value="{{ $task->delivery_Date }}">
        </div>

        <div class="form-group">
            <label for="statuses">Statuses</label>
            <select class="form-control" id="statuses" name="statuses" required>
                <option value="To Do" @if($task->statuses == 'To Do') selected @endif>To Do</option>
                <option value="inprogress" @if($task->statuses == 'inprogress') selected @endif>Inprogress</option>
                <option value="Done" @if($task->statuses == 'Done') selected @endif>Done</option>
            </select>
        </div>
        
        <!-- <div class="form-group">
            <label for="user_id">Task Holder</label>
            <select class="form-control" id="user_id" name="user_id" required>
             @foreach ($users as $user)
             <option value ="{{ $user->id }}">{{$user->name}}</option>
             @endforeach
            </select>
        </div> -->

        <button type="submit" class="btn btn-primary">Update Task</button>
    </form>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
