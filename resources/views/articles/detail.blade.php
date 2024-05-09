@extends("layouts.app")
@section("content")
 <div class="container">
 <div class="card mb-2">
 <div class="card-body">
 <h5 class="card-title">{{ $article->title }}</h5>
 <div class="card-subtitle mb-2 text-muted small">
 {{ $article->created_at->diffForHumans() }}
 </div>
 <p class="card-text">{{ $article->body }}</p>
 <p class="card-text">{{ $article->category_id }}</p>


 <a class="btn btn-primary"
 href="{{ url("/articles/edit/$article->id") }}">
 Edit
 </a>

 <a class="btn btn-warning"
 href="{{ url("/articles/delete/$article->id") }}">
 Delete
 </a>

 </div>
 </div>
 </div>
@endsection