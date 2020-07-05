@extends('layouts.master')

@section('content')
  <div class="card-header d-flex justify-content-between">
    <h3 class="card-title">Articles</h3>
    <a href="/artikel/create" style="margin-left: auto;"><button  class="btn btn-primary col-12">Add Articles</button></a>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
          @foreach ($articles as $article)
          <div class="card" id="{{$article->id}}">
              <div class="card-header">
                <a class="card-title" href="/artikel/{{$article->id}}"><h4>{{$article->title}}</h4></a>
                <p>{{$article->slug}}</p>
              </div>
              <div class="card-body">
                  {{$article->content}}
              </div>
              <!-- /.card-body -->
              <div class="card-footer d-flex justify-content-end">
                <span style="font-size: small;">{{$article->created_at}}</span>
              </div>
              <!-- /.card-footer-->
          </div>
  
          @endforeach
  </div>
@endsection

@push('scripts')
<script>
  Swal.fire({
      title: 'Berhasil!',
      text: 'Memasangkan script sweet alert',
      icon: 'success',
      confirmButtonText: 'Cool'
  })
</script>
@endpush