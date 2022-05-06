<div class="bg-white w-5/6 m-auto flex rounded-2xl relative my-6">
    <p class="left-0 -top-5 text-white bg-bp_orange rounded-r-2xl rounded-t-2xl absolute font-bold px-3 py-1">Nieuw!</p>

    <img class="rounded-l-2xl w-1/3" src="{{ asset($image ?? null) }}" alt="SocialMedia photo">
    <div class="w-2/3 text-left pl-4 mx-2 mt-2">
        <p class="p-2">Gezocht:</p>
        <p class="font-bold p-2">{{ $title ?? null }}</p>
        <p class="p-2 w-5/6">{{ $description ?? null }}</p>
        <div class="flex">
            <a class="ml-auto p-3 text-bp_purple font-bold cursor-pointer" href="{{ $link ?? null }}">Inschrijven ></a>
        </div>
    </div>
</div>
