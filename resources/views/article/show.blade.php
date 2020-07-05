@extends('layouts.master')

@section('content')
<div class="container-fluid d-flex justify-content-center flex-column" >
    <div class="card" id="{{$article->id}}">
        <div class="card-header">
          <a class="card-title" href="/artikel/{{$article->id}}"><h4>{{$article->title}}</h4></a>
          <p>{{$article->slug}}</p>
        </div>
        <div class="card-body">
            {{$article->content}}
        </div>
        
        <!-- /.card-body -->
        <div class="card-footer d-flex justify-content-between">
            <div>
                @foreach (explode(',',$article->tags) as $tag)
                    <div class="btn btn-primary">{{$tag}}</div>
                @endforeach
            </div>
            <span style="font-size: small; margin-left: auto;">{{$article->created_at}}</span>
        </div>
        <!-- /.card-footer-->
    </div>
    <div class="container d-flex justify-content-end" style="margin: 30px;">
        <a class="col-3" href="/artikel/{{$article->id}}/edit">
          <button  class="btn btn-primary col-12" style="margin: 0">Edit</button>
        </a>
        <form class="col-3" action="/artikel/{{$article->id}}" method="post">
            @csrf
          <input class="btn btn-primary col-12" type="submit" value="Delete" />
          @method('delete')
        </form>
    </div>
</div>

@endsection
