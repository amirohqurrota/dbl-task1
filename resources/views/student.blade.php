@extends('layouts.app')
@section('content')
<section>
    <div class="w-full flex justify-center ">
        
        <div class="w-4/5 mt-20">
            <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">{{$student->name}}</h1>
            {{-- <h4 class="mb-4 text-l leading-none tracking-tight text-gray-900  dark:text-white">{{$student->gender}}</h4> --}}
            <h4 class="mt-20 text-xl font-extrabold leading-none tracking-tight text-gray-900  dark:text-white">Detail Courses :</h4>
            <div class="flex flex-col">
                @foreach($student->courses as $course)
                    <a href="{{url ('/course/'.$course->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{$course->name}}</a>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
    