{{-- ANSWER-SESSION --}}
<div class="row mt-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h2>{{ Str::plural('ပေါက်ကရအဖြေ', $answersCount) . " " . $answersCount . " ခုတွေ့တယ်"}}</h2>
                </div>
                <hr>
                @include('layouts._messages')

                @foreach ($answers as $answer)

                {{-- VOTE-CONTROLS AND CREATED_DATE-AND-AVATER --}}
                <div class="media">
                    {{-- VOTE-CONTROLS --}}
                    @include('shared._vote', [
                        'model' => $answer
                    ])
                    {{-- //VOTE-CONTROLS END --}}

                    {{-- CREATED_DATE-AND-AVATER --}}
                    <div class="media-body">
                        {!! $answer->body_html !!}
                        <div class="row">
                            <div class="col-4">
                                <div class="ml-auto">
                                    @can ('update', $answer)
                                    <a href="{{ route('questions.answers.edit', [$question->id, $answer->id]) }}" class="btn btn-sm btn-outline-info">ပြင်မယ်</a>
                                    @endcan

                                    @can ('delete', $answer)
                                    <form class="form-delete" method="post" action="{{ route('questions.answers.destroy', [$question->id, $answer->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('မင်းဖျတ်မှာသေချာလား?')">ဖျက်မယ်</button>
                                    </form>
                                    @endcan
                                </div>
                            </div>

                            <div class="col-4"></div>

                            <div class="col-4">
                                @include('shared._author', [
                                'model' => $answer,
                                'label' => 'answered'
                                ])
                            </div>
                        </div>
                    </div>
                    {{-- //CREATED_DATE-AND-AVATER END --}}
                </div>
                {{-- //VOTE-CONTROLS AND CREATED_DATE-AND-AVATER END --}}
                <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>
{{-- //ANSWER-SESSION END --}}
