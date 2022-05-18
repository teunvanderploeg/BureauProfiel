@if($searchPage)
    <div class="container">
        <form wire:submit.prevent="search(Object.fromEntries(new FormData($event.target)))">
            <div class="grid grid-cols-3 gap-1">
                @foreach($questions as $question)
                    <div class="flex p-2 justify-between bg-white rounded-lg">
                        <p class="text-xs w-full m-auto">{{ucfirst($question->question)}}</p>
                        @switch($question->answer_type)
                            @case('select')
                                <select name="{{ $question->slug }}" class="ml-auto text-xs w-48">
                                    <option value=""></option>
                                @foreach($question->getArrayOfAnswers() as $answers)
                                        <option @if(old($question->slug) == $answers) selected @endif value="{{$answers}}">{{$answers}}</option>
                                    @endforeach
                                </select>
                                @break

                            @case('checkbox')
                                <input type="checkbox" @if(old($question->slug)) checked @endif name="{{ $question->slug }}" class="ml-auto">
                                @break
                            @case('date')
                                <div class="flex flex-col">
                                    <input type="date" name="{{ $question->slug }}-1" class="ml-auto text-xs p-1 w-48">
                                    <input type="date" name="{{ $question->slug }}-2" class="ml-auto text-xs p-1 w-48">
                                </div>
                                @break
                            @default
                                <input type="{{ $question->answer_type }}" value="{{ old($question->slug) }}" name="{{ $question->slug }}"
                                       class="ml-auto w-2/3 text-xs w-48">
                        @endswitch
                    </div>
                @endforeach
                    <div class="flex p-2 justify-between bg-white rounded-lg">
                        <p class="text-xs w-full m-auto">Notes</p>
                            <input type="text" value="{{ old('nodes') }}" name="nodes"
                                class="ml-auto w-2/3 text-xs w-48"/>
                    </div>
            </div>
            <div class="text-right">
                <button
                    class="text-white font-bold whitespace-nowrap cursor-pointer px-7 py-2 rounded-r-2xl transition border border-4 hover:text-black hover:bg-bp_white rounded-b-2xl bg-bp_orange border-bp_orange">
                    Search
                </button>
            </div>
        </form>
    </div>
@else
    <div class="container">
        <div class="flex text-center justify-center">
            <div class="flex text-center justify-center">
                <div wire:click="previousRespondent" class="bg-purple-500 text-white rounded cursor-pointer text-center p-1 px-2 m-2">Back</div>
                <p class="my-auto">{{ ($respondentCount + 1) }} / {{ $respondentsCount }}</p>
                <div wire:click="nextRespondent" class="bg-purple-500 text-white rounded cursor-pointer text-center p-1 px-2 m-2">Next</div>
            </div>
        </div>
        @foreach($respondent as $respondent)
            <div class="flex flex-col p-2 bg-bp_white rounded-2xl">
                <p>Id: {{ $respondent->id }}</p>
                <p>Email: {{ $respondent->email }}</p>
                <div class="container grid grid-cols-3">
                    @foreach($respondent->answers as $answer)
                        <div class="py-2 text-sm">
                            <p>Question: {{ $answer->question->question }}</p>
                            @if($answer->question->answer_type == 'checkbox')
                                <p>Answer: {{ $answer->answer == 1 ? 'Yes' : 'No' }}</p>
                            @else
                                <p>Answer: {{ $answer->answer }}</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@endif

