@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $user->name }}</h3>
                </div>
                <div class="card-body">
                    <img class="rounded img-fluid" src="{{ Gravatar::src($user->email, 100) }}" alt="">
                </div>
            </div>
        </aside>
        <div class="col-sm-8">
            <!--<ul class="nav nav-tabs nav-justified mb-3">-->
            <!--    <li class="nav-item"><a href="#" class="nav-link">TimeLine</a></li>-->
            <!--    <li class="nav-item"><a href="#" class="nav-link">Followings</a></li>-->
            <!--    <li class="nav-item"><a href="#" class="nav-link">Followers</a></li>-->
            <!--</ul>-->
            <!--@if (Auth::id() == $user->id)-->
            <!--    {!! Form::open(['route' => 'tasks.store']) !!}-->
            <!--        <div class="form-group">-->
            <!--            {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}-->
            <!--            {!! Form::submit('タスクの新規作成（show）', ['class' => 'btn btn-primary btn-block']) !!}-->
            <!--        </div>-->
            <!--    {!! Form::close() !!}-->
            <!--@endif-->
            @if (count($tasks) > 0)
                <!--@include('tasks.tasks', ['tasks' => $tasks])-->
                <div class="col-sm-8">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>ステータス</th>
                                <th>タスク</th>
                                @if (Auth::id() == $user->id)
                                    <th>操作</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                            <tr>
                                <td>{!! link_to_route('tasks.show', $task->id, ['id' => $task->id]) !!}</td>
                                <td>{{ $task->status }}</td>
                                <!--<td>{{ $task->content }}</td>-->
                                 <td class="mb-0">{!! nl2br(e($task->content)) !!}</td>
                                  @if (Auth::id() == $task->user_id)
                                     <td>
                                        {!! Form::open(['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection