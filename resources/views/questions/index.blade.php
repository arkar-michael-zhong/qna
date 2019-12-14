@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>ပေါက်တက်ကရ မေးထားတဲ့မေးခွန်းပေါင်းစုံ</h2>
                        <div class="ml-auto">
                            <a href="{{ route('questions.create') }}" class="btn btn-outline-secondary">မေးခွန်းမေးမယ်</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @include('layouts._messages')

                    @forelse ($questions as $question)
                    <div class="media">
                        <div class="d-flex flex-column counters">
                            <div class="vote">
                                <strong>{{ $question->votes_count }}</strong> {{ Str::plural('vote', $question->votes_count) }}
                            </div>
                            <div class="status {{ $question->status }}">
                                <strong>{{ $question->answers_count }}</strong> {{ Str::plural('answer', $question->answers_count) }}
                            </div>
                            <div class="view">
                                {{ $question->views . " " . Str::plural('view', $question->views) }}
                            </div>
                        </div>
                        <div class="media-body">
                            <div class="d-flex align-items-center">
                                <h3 class="mt-0"><a href="{{ $question->url }}">{{ $question->title }}</a></h3>
                                <div class="ml-auto">
                                    @can ('update', $question)
                                    <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-sm btn-outline-info">ပြင်မယ်</a>
                                    @endcan

                                    @can ('delete', $question)
                                    <form class="form-delete" method="post" action="{{ route('questions.destroy', $question->id) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('မင်းဖျတ်မှာသေချာလား?')">ဖျက်မယ်</button>
                                    </form>
                                    @endcan
                                </div>
                            </div>
                            <p class="lead">
                                Asked by <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                                <small class="text-muted">{{ $question->created_date }}</small>
                            </p>
                            <div class="excerpt">
                                {{ $question->excerpt(400) }}
                            </div>
                        </div>
                    </div>
                    <hr>
                    @empty
                    <div class="alert alert-warning">
                        <h1><strong>ဆောတီးပဲ 😎</strong> မင်းအတွက်မေးခွန်းမရှိဘူး. ဒိုးတော့ 🤬</h1>
                    </div>
                    @endforelse

                    <div class="mx-auto">
                        {{ $questions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
