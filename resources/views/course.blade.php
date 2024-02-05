@extends('layouts.app')
@section('content')
<section>
    {{-- class detail --}}
    <div class="mt-10 mx-20">
        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">{{$course->name}}</h1>
        <p class="mb-3 text-gray-500 dark:text-gray-400">{{ $course->description }}.</p>
    </div>

    {{-- participant detail --}}
    <div class="mt-10 mx-20">
        <h3 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Participant of this course :</h3>
        @foreach ($studentHasCourses as $studentHasCourse)
            <p>{{$studentHasCourse->name}}</p>
        @endforeach
    </div>

</section>
@endsection