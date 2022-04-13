@extends('layouts.master')

@section('title', 'Formulier')

@section('content')
    <div class="bg-gray-200 py-32 px-10 min-h-screen ">
        <form class="bg-white p-10 md:w-3/4 lg:w-1/2 mx-auto">
            @csrf
            @foreach($questions as $question)
                <div class="flex items-center mb-5">
                    <label for="{{ $question->slug }}"
                           class="inline-block w-1/3 mr-6 text-sm text-gray-600">
                        {{ $question->question }}
                    </label>
                    <input type="{{$question->answer_type}}" {{ $question->slug }}
                    class="ml-auto w-2/3">
                </div>
            @endforeach
                <div class="text-right">
                    <input type="submit" value="Send" class="py-3 rounded-2xl px-8 bg-blue-500 text-white font-bold cursor-pointer">
                </div>
        </form>
    </div>
@endsection
