@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex flex-row justify-content-between">
                        <h2>All Questions</h2>
                        
                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Ask Your Question</button>
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">New Question</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form class="needs-validation" action="{{ route('question.store') }}" method="POST" novalidate>
                                    @method('POST')
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="question-title" class="col-form-label">Title:</label>
                                            <input type="text" class="form-control" id="question-title" required name="title">
                                            <div class="valid-feedback">
                                                Принято!
                                            </div>
                                            <div class="invalid-feedback">
                                                Enter Question title please.
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="question-text" class="col-form-label">Question body:</label>
                                            <textarea class="form-control" id="question-text" rows="7" name="body" required></textarea>
                                            <div class="valid-feedback">
                                                Принято!
                                            </div>
                                            <div class="invalid-feedback">
                                                Enter Question body please.
                                            </div>
                                        </div>
                                    
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                                        <button type="submin" class="btn btn-outline-primary">Add Question</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>    
                </div>

                <div class="card-body">
                    @include('partials._messages')
                    @foreach($questions as $q)
                    <div class="media">
                        <div class="media-body">
                            <div class="d-flex flex-row justify-content-between">
                                <h3 class="mt-0"><a href="{{ $q->url }}">{{$q->title}}</a></h3>
                                <div>
                                    <a href="{{ route('question.edit', ['id'=>$q->id]) }}" role="button" class="btn btn-link">Edit</a>
                                </div>
                            </div>
                            <p class="lead">
                                Asked by
                                <a href="{{ $q->user->url }}">{{ $q->user->name }}</a>
                                <small class="text-muted">{{ $q->created_date }}</small>
                            </p>
                            {{ str_limit($q->body, 250) }}
                        </div>
                    </div>
                    @endforeach
                        {{ $questions->links() }}
  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
