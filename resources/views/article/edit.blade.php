

@extends('layouts.master')

@section('content')
<div class="container-fluid d-flex justify-content-center flex-column" >
    <h2 style="text-align: center; margin: 30px">Edit your question here</h2>
    <form action="/artikel/{{$article->id}}" method="POST" class="col-6  align-self-center">
        @csrf
        <div class="form-group row ">
            <div class="col-12">
                <input type="text" class="form-control" name="title" id="title" placeholder="Enter your article title here" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12">
                <textarea style="height: 300px" type="text" class="form-control" name="content" id="content" placeholder="Enter your article content here" required></textarea>
            </div>
        </div>
        <div class="form-group row ">
            <div class="col-12">
                <input type="text" class="form-control" name="tags" id="tags" placeholder="Enter your article tags here">
                <p>*if more than one separate with comma(,)</p>
            </div>
        </div>
        @method('PUT')
        <div class="form-group row">
            <div class="offset-2 col-8">
                <button type="submit" class="btn btn-primary col-12">Save</button>
            </div>
        </div>
    </form>
</div>

@endsection

@push('scripts')
    <script>
        $('#title').val("{{$article->title}}");
        $('textarea#content').val("{{$article->content}}");
        $('#tags').val("{{$article->tags}}");
    </script>
@endpush