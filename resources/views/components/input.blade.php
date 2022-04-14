@switch($question->answer_type)
    @case('select')
        <select name="{{ $question->slug }}" class="ml-auto">
            @foreach($question->getArrayOfAnswers() as $answers)
                <option value="{{$answers}}">{{$answers}}</option>
            @endforeach
        </select>
    @break

    @case('checkbox')
        <input type="checkbox" name="{{ $question->slug }}" class="ml-auto">
    @break

    @default
    <input type="{{ $question->answer_type }}" name="{{ $question->slug }}" class="ml-auto w-2/3">

@endswitch
