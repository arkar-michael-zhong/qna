@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center ">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>Ask Question</h2>
                        <div class="ml-auto">
                            <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Back to all Questions</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('questions.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="question-title" class="col-md-4 col-form-label">Question Title</label>
                            <input id="question-title" type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $question->title) }}" autocomplete="title" autofocus>
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="question-body" class="col-md-4 col-form-label">Explain your questions here</label>
                            <textarea id="question-body" name="body" rows="10" class="form-control @error('body') is-invalid @enderror"  autocomplete="body" autofocus>{{ old('body', $question->body) }}</textarea>
                            @error('body')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-secondary">Ask Question</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
