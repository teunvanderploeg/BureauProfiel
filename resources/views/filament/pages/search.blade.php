@if($searchPage)
    <div>
        <form wire:submit.prevent="search(Object.fromEntries(new FormData($event.target)))">
            <div class="grid grid-cols-3 gap-1">
                @foreach($questions as $question)
                    <div class="flex p-2 justify-between bg-white rounded-lg">
                        <p class="text-sm w-full m-auto">{{ucfirst($question->slug)}}</p>
                        <input class="border border-gray-500 m-auto text-sm" type="{{$question->answer_type}}" name="{{$question->slug}}">
                    </div>
                @endforeach
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
    <div>
        <p>Id: {{ $respondent->id }}</p>
        <p>Email: {{ $respondent->email }}</p>
    </div>
@endif
