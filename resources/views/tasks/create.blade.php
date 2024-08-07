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
    <h1>Create Task</h1>
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="priority">Priority</label>
            <select class="form-control" id="priority" name="priority" required>
                <option value=""></option>
                <option value="low">Low</option>
                <option value="medium">Medium</option>
                <option value="high">High</option>
            </select>
        </div>
        <div class="form-group">
            <label for="assignment_Date"> Assignment Date</label>
            <input type="date" class="form-control" id="assignment_Date" name="assignment_Date">
        </div>

        <div class="form-group">
            <label for="delivery_Date"> Delivery Date</label>
            <input type="date" class="form-control" id="delivery_Date" name="delivery_Date">
        </div>
        {{-- <div class="form-group">
            <label for="due_date">Due Date</label>
            <input type="date" class="form-control" id="due_date" name="due_date">
        </div> --}}
        <div class="form-group">
            <label for="statuses">Statuses</label>
            <select class="form-control" id="statuses" name="statuses" required>
                <option value=""></option>
                <option value="To Do">To Do</option>
                <option value="Inprogress">Inprogress</option>
                <option value="Done">Done</option>
            </select>
        </div>
        <div class="form-group">
            <label for="user_id">Task Holder</label>
            <select class="form-control" id="user_id" name="user_id">
            <option value=""></option>
             @foreach ($users as $user)
             <option value ="{{ $user->id }}">{{$user->name}}</option>
             @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>