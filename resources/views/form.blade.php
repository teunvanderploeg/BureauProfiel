@extends('layouts.master')

@section('title', 'Formulier | Bureau Profiel')

@section('content')
    <div class="bg-white py-32 px-10 min-h-screen ">
        <form class="bg-bp_white rounded-2xl p-10 w-full md:w-5/6 lg:w-3/4 mx-auto" method="POST"
              action="{{ route('form.store') }}">
            @if(session()->has('message'))
                <div class="text-green-500 font-bold mx-auto">
                    {{ session()->get('message') }}
                </div>
            @endif
            @csrf
            @foreach($questions as $question)
                <div class="mb-5">
                    <div class="flex items-center">
                        <label for="{{ $question->slug }}"
                               class="inline-block w-1/3 mr-6 text-sm text-gray-600">
                            {{ $question->question }}
                        </label>
                        <div class="w-1/2 ml-auto text-right">
                            <x-input :question="$question"/>
                        </div>
                    </div>
                    @error($question->slug)
                    <div class="text-red-500 text-xs font-bold">{{ $message }}</div>
                    @enderror
                </div>
            @endforeach

            <div class="text-right">
                <input type="submit" value="Send"
                       class="text-white font-bold whitespace-nowrap cursor-pointer px-7 py-2 rounded-r-2xl transition border border-4 hover:text-black hover:bg-bp_white rounded-b-2xl bg-bp_purple border-bp_purple">
            </div>
        </form>
    </div>
@endsection
