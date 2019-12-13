@extends('layouts.app')

@section('content')
<div class="container-fluid">
    {{-- QUESTION-SESSION --}}
    <div class="row justify-content-center ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <div class="d-flex align-items-center">
                            <h1>{{ $question->title }}</h1>
                            <div class="ml-auto">
                                <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">ပေါက်တက်ကရ မေးထားတဲ့မေးခွန်းပေါင်းစုံ</a>
                            </div>
                        </div>
                    </div>

                    <hr>

                    {{-- VOTE-CONTROLS AND CREATED_DATE-AND-AVATER --}}
                    <div class="media">
                        {{-- VOTE-CONTROLS --}}
                        <div class="d-flex flex-column vote-controls">
                            {{-- VOTE-UP --}}
                            <a title="This question is useful" class="vote-up">
                                <i class="fas fa-caret-up fa-3x"></i>
                            </a>
                            <span class="votes-count">1230</span>

                            {{-- VOTE-DOWN --}}
                            <a title="This queston is not usefulable" class="vote-down off">
                                <i class="fas fa-caret-down fa-3x"></i>
                            </a>

                            {{-- FAVORITE --}}
                            <a title="Click to mark as favorite question (click again to undo)" class="favorite mt-2">
                                <i class="fas fa-star fa-2x"></i>
                                <span class="favorites-count">123</span>
                            </a>
                        </div>
                        {{-- //VOTE-CONTROLS END --}}

                        {{-- CREATED_DATE-AND-AVATER --}}
                        <div class="media-body">
                            {!! $question->body_html !!}
                            <div class="float-right">
                                <span class="text-muted">Asked {{ $question->created_date }}</span>
                                <div class="media mt-2">
                                    <a href="{{ $question->user->url }}" class="pr-2">
                                        <img src="{{ $question->user->avatar }}">
                                    </a>
                                    <div class="media-body mt-5">
                                        <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- //CREATED_DATE-AND-AVATER END --}}
                    </div>
                    {{-- //VOTE-CONTROLS AND CREATED_DATE-AND-AVATER END --}}
                </div>
            </div>
        </div>
    </div>
    {{-- //QUESTION-SESSION END --}}

    {{-- ANSWER-SESSION --}}
    @include('answers._index', [
        'answers' => $question->answers,
        'answersCount' => $question->answers_count,
    ]);
    @include('answers._create');
    {{-- //ANSWER-SESSION END --}}
</div>
@endsection
