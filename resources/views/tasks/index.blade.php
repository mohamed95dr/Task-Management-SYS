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
    <div class="container text-center">
        <h1>Task Management System</h1>

        <h2>Task List</h2> @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <!-- Rest of your content -->
    </div>

    <div class="container">

    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Create Task</a>

        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Title</th>
                    <!-- <th>due_date</th> -->
                    <th>priority</th>
                    <th>description</th>
                    <th>statuses</th>
                    <th>assignment_Date</th>
                    <th>delivery_Date</th>
                    <th>Task Holder</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <!-- <td>{{ $task->due_date }}</td> -->
                    <td>{{ $task->priority }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->statuses }}</td>
                    <td>{{ $task->assignment_Date }}</td>
                    <td>{{ $task->delivery_Date }}</td>
                    <td>{{ ($task->user != null)? $task->user->name : "no user" }}</td>

                    <td>

                    <a href="{{ route('tasks.assign',$task->id) }}" class="btn btn-primary btn-sm">Assign</a>


                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-secondary btn-sm">
                            <i class="fa fa-edit"></i> Edit
                        </a>

                        <form action="{{ route('tasks.destory', $task->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this task?')">
                                <i class="fa fa-trash"></i> Delete
                            </button>
                        </form>
                    </td>


                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>