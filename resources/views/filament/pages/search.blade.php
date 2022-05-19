@if($searchPage)
    <div class="container">
        <form wire:submit.prevent="search(Object.fromEntries(new FormData($event.target)))">
            <div class="grid grid-cols-3 gap-1">
                @foreach($questions as $question)
                    <div class="flex p-2 justify-between bg-white rounded-lg w-full">
                        <div class="w-3/5 flex">
                            <p class="text-xs my-auto pr-1">{{ ucfirst($question->question) }}</p>
                        </div>
                        <div class="w-2/5">
                            @switch($question->answer_type)
                                @case('select')
                                    <div class="w-full h-full flex">
                                        <select name="{{ $question->slug }}" class="text-xs mx-auto w-full my-auto">
                                            <option value=""></option>
                                            @foreach($question->getArrayOfAnswers() as $answers)
                                                <option
                                                    @if(isset($data[$question->slug]) && $data[$question->slug] == $answers) selected
                                                    @endif
                                                    value="{{ $answers }}">{{ $answers }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @break

                                @case('checkbox')
                                    <div class="w-full h-full flex">
                                        <input type="checkbox" @if(isset($data[$question->slug])) checked @endif
                                        name="{{ $question->slug }}" class="ml-auto my-auto">
                                    </div>
                                    @break
                                @case('date')
                                    <div class="flex flex-col mx-auto">
                                        <input type="date" name="{{ $question->slug }}-1"
                                               @if(isset($data)) value="{{ $data["$question->slug-1"] }}" @endif
                                               class="text-xs p-1 w-full h-6">
                                        <input type="date" name="{{ $question->slug }}-2"
                                               @if(isset($data)) value="{{ $data["$question->slug-2"] }}" @endif
                                               class="text-xs p-1 w-full h-6">
                                    </div>
                                    @break
                                @default
                                    <div class="w-full h-full flex">
                                        <input type="{{ $question->answer_type }}"
                                               @if(isset($data)) value="{{ $data[$question->slug] }}" @endif
                                               name="{{ $question->slug }}"
                                               class="text-xs w-full my-auto">
                                    </div>
                            @endswitch
                        </div>
                    </div>
                @endforeach
                <div class="flex p-2 justify-between bg-white rounded-lg w-full">
                    <p class="text-xs w-3/5">Notes</p>
                    <div class="w-2/5">
                        <input type="text" name="nodes" class="text-xs w-full"
                               @if(isset($data['notes'])) value="{{ $data['notes'] }}" @endif />
                    </div>
                </div>
            </div>
            <div class="text-right pt-4">
                <button
                    class="text-white font-bold whitespace-nowrap cursor-pointer px-4 py-1 rounded-r-2xl transition border border-4 hover:text-black hover:bg-gray-100 rounded-b-2xl bg-purple-500 border-purple-500">
                    Search
                </button>
            </div>
        </form>
    </div>
@else
    <div class="container">
        @if($respondentsCount != 0)
            <div class="flex text-center justify-center">
                <div class="flex text-center justify-center">
                    <div wire:click="previousRespondent"
                         class="bg-purple-500 text-white rounded-b rounded-r cursor-pointer text-center p-1 px-2 m-2 select-none">
                        Back
                    </div>
                    <p class="my-auto w-full">{{ ($respondentCount + 1) }} / {{ $respondentsCount}}</p>
                    <div wire:click="nextRespondent"
                         class="bg-purple-500 text-white rounded-b rounded-r cursor-pointer text-center p-1 px-2 m-2 select-none">
                        Next
                    </div>
                </div>
            </div>
            @foreach($respondent as $respondent)
                <div class="flex flex-col p-2 rounded-2xl">
                    <div class="container grid grid-cols-3">
                        @foreach($respondent->answers as $answer)
                            @if($answer->question->searchable)
                                <div class="p-2 m-2 text-sm bg-white rounded-2xl">
                                    <p class="font-light">{{ $answer->question->question }}</p>
                                    <p class="font-bold">
                                        @if($answer->question->answer_type == 'checkbox')
                                            @if($answer->answer == 1)
                                                Yes
                                            @elseif($answer->answer == 0)
                                                No
                                            @else
                                                {{ $answer->answer }}
                                            @endif
                                        @else
                                            {{ $answer->answer }}
                                        @endif
                                    </p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="p-2 m-2 text-sm bg-white rounded-2xl h-full">
                        <p class="font-light">Notes.</p>
                        <textarea id="notes" readonly class="w-full text-sm border-none outline-none overflow-auto focus:border-none focus:outline-none">{{ $respondent->notes }}</textarea >
                    </div>
                </div>
            @endforeach
            <div>
                @else
                    <div class="flex text-center justify-center">
                        <div class="flex text-center justify-center">
                            <div class="bg-gray-600 text-white rounded text-center p-1 px-2 m-2 select-none">Back
                            </div>
                            <p class="my-auto">0 / 0</p>
                            <div class="bg-gray-600 text-white rounded text-center p-1 px-2 m-2 select-none">Next
                            </div>
                        </div>
                    </div>
                @endif
                <div class="pt-1">
                    <button wire:click="changeSearchPage()"
                            class="text-white font-bold whitespace-nowrap cursor-pointer px-4 py-1 rounded-r-2xl transition border border-4 hover:text-black hover:bg-gray-100 rounded-b-2xl bg-purple-500 border-purple-500">
                        Back to filter
                    </button>
                    @if($emailList != null)
                        <button onclick="copyText('{{ $emailList }}')"
                                class="text-white font-bold whitespace-nowrap cursor-pointer px-4 py-1 rounded-r-2xl transition border border-4 hover:text-black hover:bg-gray-100 rounded-b-2xl bg-purple-500 border-purple-500">
                            Copy all emails
                        </button>
                </div>
            </div>
        @endif
    </div>
@endif

<script>
    function copyText(text) {
        navigator.clipboard.writeText(text);
    }
</script>
