<div class="modal fade" id="edit{{ $task->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-add-new-role">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-5 pb-5">
                <div class="text-center mb-4">
                    <h2 class="role-title">Edit Task</h2>
                </div>

                <form id="editFrom" action="/tasks/update/{{$task->id}}" method="post"
                class="row d-flex flex-column align-items-center gap-3">
                @csrf
                <div class="row col-12 d-flex flex-column align-item-center">

                    <div class="col-md-12 mb-3">
                        <label for="name" class="form-label">Task Name</label>
                        <input value="{{ $task->task_name }}" type="text"
                            class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                            placeholder="Enter Name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                   

                </div>
                <div class="d-flex gap-2 justify-content-center text-center mt-2">
                    <button type="submit" class="btn btn-primary me-1">Save</button>
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                        aria-label="Close">
                        Discard
                    </button>
                </div>
            </form>

            </div>
        </div>
    </div>
</div>