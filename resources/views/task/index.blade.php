@extends('layouts/app')

@section('title', 'Task')

@section('page-style')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    $(function() {
        // Function to save task priorities to local storage
        function saveTaskPriorities() {
            var taskPriorities = {};
            $("#sortable li").each(function(index) {
                var taskId = $(this).data("task-id");
                taskPriorities[taskId] = index + 1;
            });
            localStorage.setItem("taskPriorities", JSON.stringify(taskPriorities));
        }

        // Initialize sortable
        $("#sortable").sortable({
            update: function(event, ui) {
                saveTaskPriorities();

                var sortedIDs = $(this).sortable("toArray", {
                    attribute: "data-task-id"
                });

                // Get the CSRF token value from the meta tag
                var csrfToken = $('meta[name="csrf-token"]').attr('content');

                // Perform an AJAX request to update the positions on the server
                $.ajax({
                    type: "POST",
                    url: "{{ route('update_positions') }}",
                    data: {
                        _token: csrfToken,
                        positions: sortedIDs
                    },
                    success: function(data) {
                        // Handle success, if needed
                    }
                });
            }
        });

        // Retrieve task priorities from local storage on page load
        
    });
</script>




@endsection

@section('content')


<div class="card-datatable table-responsive container">
    <ul id="sortable">
        @foreach ($tasks as $task)
        <li class="ui-state-default list-group mb-2 p-2" data-task-id="{{ $task->id }}">
            <div>
                {{ $task->task_name }}
            </div>
            <div class="btn-group ms-auto">
                <button href="javascript:void(0)" data-bs-target="#edit{{ $task->id }}" data-bs-toggle="modal" class="btn btn-sm btn-primary text-white">Edit</button>
                @include('task.edit')
                <a href="tasks/delete/{{ $task->id }}" class="btn btn-sm btn-danger delete-btn text-white">Remove</a>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endsection


@section('page-script')




@endsection