@extends('layouts.master')

@section('title', 'Formulier | Bureau Profiel')

@section('content')
    <div class="bg-white py-32 px-10 min-h-screen ">
        <form class="bg-gray-100 p-10 w-full md:w-5/6 lg:w-3/4 mx-auto" method="POST"
              action="{{ route('form.store') }}">
            @csrf
            @foreach($questions as $question)
                <div class="flex items-center mb-5">
                    <label for="{{ $question->slug }}"
                           class="inline-block w-1/3 mr-6 text-sm text-gray-600">
                        {{ $question->question }}
                    </label>
                    <input type="{{$question->answer_type}}" name="{{ $question->slug }}"
                    class="ml-auto w-2/3">
                </div>
            @endforeach
            <div class="text-right">
                <input type="submit" value="Send"
                       class="py-3 rounded-2xl px-8 bg-blue-500 text-white font-bold cursor-pointer">
            </div>
        </form>
    </div>
@endsection
