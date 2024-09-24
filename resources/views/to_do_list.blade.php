@extends('components.dashmaster')


@section('body')
<div class="content-wrapper">
            <!-- TO DO List -->
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">
                    <i class="ion ion-clipboard mr-1"></i>
                    To Do List
                  </h3>
  
                  <div class="card-tools">
                    <ul class="pagination pagination-sm">
                      <li class="page-item"><a href="#" class="page-link">&laquo;</a></li>
                      <li class="page-item"><a href="#" class="page-link">1</a></li>
                      <li class="page-item"><a href="#" class="page-link">2</a></li>
                      <li class="page-item"><a href="#" class="page-link">3</a></li>
                      <li class="page-item"><a href="#" class="page-link">&raquo;</a></li>
                    </ul>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <ul class="todo-list to_do_list_custom" data-widget="todo-list">
                    @foreach ($tasks as $task)
                    <li>
                      <span class="handle">
                        <i class="fas fa-ellipsis-v"></i>
                        <i class="fas fa-ellipsis-v"></i>
                      </span>
                      <div  class="icheck-primary d-inline ml-2">
                        <form method="POST" action="{{ route('to-do-list.update', $task->id) }}">
                            @csrf
                            @method('PATCH')
                            <input type="checkbox" value="" id="todoCheck{{ $task->id }}" {{ $task->completed ? 'checked' : '' }} onchange="this.form.submit()">
                            <label for="todoCheck{{ $task->id }}"></label>
                        </form>
                      </div>
                      <span class="text">{{ $task->task }}</span>
                      <small class="badge badge-info"><i class="far fa-clock"></i> {{ $task->due_date ? $task->due_date->diffForHumans() : 'No due date' }}</small>
                      <div class="tools">
                        <form method="POST" action="{{ route('to-do-list.destroy', $task->id) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="border: none; background: none;">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                      </div>
                    </li>
                    @endforeach

                  </ul>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <form method="POST" action="{{ route('to-do-list.store') }}">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="task" class="form-control" placeholder="Add new task">
                            <input type="date" name="due_date" class="form-control" placeholder="Due Date">
                            <span class="input-group-append">
                                <button type="submit" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add item</button>
                            </span>
                        </div>
                    </form>
                </div>
              </div>
              <!-- /.card -->
 </div>
@endsection