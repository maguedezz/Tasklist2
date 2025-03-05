@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tasks') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{-- @include('common.errors') --}}
                    {{-- {{ __('Tasks index') }} --}}
                    <form action="{{ route('store') }}" method="POST" class="form-horizontal">
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                            <label for="name" class="col-sm-3 control label">Tasks</label>
                            <div class="col-sm-6">
                                <input type="text" name="name" id="name" class="form-control">
                                @if ($errors->has('name'))
                                <div class="help-block">
                                    Name is required
                                </div>
                                @endif
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <div class="col-m-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">Add Task</button>
                            </div>
                        </div>
                        @csrf()
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Current tasks') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="panel-body">
                        @if ($tasks->count())
                            <table class="table table-striped">
                                <thead>
                                    <th>Task</th>
                                    <th>&nbsp;</th>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $task)
                                        <tr>
                                            <td>{{ $task->name }}</td>
                                            <td>
                                                <form action="{{ route('destroy', $task->id) }}" method="post">
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                    {{ method_field('DELETE') }}
                                                    @csrf
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>You have no tasks</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
