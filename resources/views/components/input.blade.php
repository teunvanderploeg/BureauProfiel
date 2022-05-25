@switch($question->answer_type)
    @case('select')
    <select name="{{ $question->slug }}" class="ml-auto w-full">
        @foreach($question->getArrayOfAnswers() as $answers)
            <option @if(old($question->slug) == $answers) selected @endif value="{{$answers}}">{{$answers}}</option>
        @endforeach
    </select>
    @break

    @case('checkbox')
    <input type="checkbox" @if(old($question->slug)) checked @endif name="{{ $question->slug }}" class="ml-auto text-bp_purple">
    @break

    @default
    <input type="{{ $question->answer_type }}" value="{{ old($question->slug) }}" name="{{ $question->slug }}"
           class="ml-auto w-full">
@endswitch
