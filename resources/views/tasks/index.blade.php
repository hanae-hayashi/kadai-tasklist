@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <h1>タスク一覧</h1>
        <div class="row">
           
            <aside class="col-sm-2">
                
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ Auth::user()->name }}</h3>
                    </div>
                    <div class="card-body">
                        <img class="rounded img-fluid" src="{{ Gravatar::src(Auth::user()->email, 100) }}" alt="">
                    </div>
                </div>
                 {!! link_to_route('tasks.create', '新規タスクの投稿', [], ['class' => 'btn btn-outline-secondary mt-3 mb-3']) !!}
            </aside>
            
            <div class="col-sm-8">
                @if (count($tasks) > 0)
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>ステータス</th>
                                <th>タスク</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                            <tr>
                                <td>{!! link_to_route('tasks.show', $task->id, ['id' => $task->id]) !!}</td>
                                <td>{{ $task->status }}</td>
                                 <td class="mb-0">{!! nl2br(e($task->content)) !!}</td>
                                 <td>
                                     @if (Auth::id() == $task->user_id)
                                        {!! Form::open(['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-outline-danger btn-sm']) !!}
                                        {!! Form::close() !!}
                                    @endif
                                 </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $tasks->links('pagination::bootstrap-4') }}
                @endif
            </div>
         </div>
         
    @endif
    
@endsection