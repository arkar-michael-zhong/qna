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
                        @include('shared._vote', [
                            'model' => $question
                        ])
                        {{-- //VOTE-CONTROLS END --}}

                        {{-- CREATED_DATE-AND-AVATER --}}
                        <div class="media-body">
                            {!! $question->body_html !!}
                            <div class="row">
                                <div class="col-4"></div>
                                <div class="col-4"></div>
                                <div class="col-4">
                                    @include('shared._author', [
                                    'model' => $question,
                                    'label' => 'asked'
                                    ])
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
    ])
    @include('answers._create');
    {{-- //ANSWER-SESSION END --}}
</div>
@endsection
