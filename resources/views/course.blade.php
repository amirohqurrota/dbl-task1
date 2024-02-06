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
        <h3 class="mb-4 text-xl font-extrabold leading-none tracking-tight text-gray-900  dark:text-white">Participant of this course :</h3>
        @if (count($nameOfStudents) < 1) 
            <p>there's no participant</p>
        @else 
            @foreach ($nameOfStudents as $nameOfStudent)
                <p>{{ $nameOfStudent->name }}</p>
            @endforeach
        @endif
        {{-- <p>{{$nameOfStudents[1]->name}}</p>
        
        {{-- {{ logger('Test') }} --}}
    </div>
    {{-- <h2 class=" justify-self-center mb-4 text-l font-extrabold leading-none tracking-tight text-gray-900  dark:text-white">Add Participant</h2> --}}
    
    {{-- action area --}}
    <div class="w-full flex justify-center mt-20 px-10">
        <div class="w-1/3 border-2 rounded-md px-10 py-5">
            <h2>action edit</h2>
            <div class="flex justify-center align-center">
                <a href="/course/delete/{{ $course->id }}">
                    <svg class="w-6 h-6 text-gray-800 hover:text-gray-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                    </svg>
                </a>
                <a href="" data-modal-target="edit-modal" data-modal-toggle="edit-modal">
                    <svg class="w-6 h-6 text-gray-800 hover:text-gray-600  dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.3 4.8 2.9 2.9M7 7H4a1 1 0 0 0-1 1v10c0 .6.4 1 1 1h11c.6 0 1-.4 1-1v-4.5m2.4-10a2 2 0 0 1 0 3l-6.8 6.8L8 14l.7-3.6 6.9-6.8a2 2 0 0 1 2.8 0Z"/>
                    </svg>  
                </a>
            </div>
        </div>
        <div class="w-1/3 border-2 rounded-md">
            <h2>add participant</h2>
            <div class=" w-full flex justify-center px-10">
                <form class="max-w-md mx-auto" action="{{ route('student-has-course.store') }}" method="post">
                    @csrf
                    <select id="studentId" name="studentId" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach($students as $student)
                            <option value="{{ $student->id }}" >{{ $student->name}}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="courseId" id="courseId" value="{{$course->id}}">
        
                    <div class="mt-4">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Participant</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</section>
@endsection