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
    </div>
    {{-- <h2 class=" justify-self-center mb-4 text-l font-extrabold leading-none tracking-tight text-gray-900  dark:text-white">Add Participant</h2> --}}
    
    {{-- action area --}}
    <div class="w-full flex justify-center mt-20 px-10">
        <div class="w-1/3 border-2 rounded-md px-10 py-5">
            <h2 class="mb-4 text-sm font-extrabold leading-none tracking-tight text-gray-900  dark:text-white">action edit</h2>
            <div class="flex justify-center align-center">
                <a href="/course/delete/{{ $course->id }}">
                    <svg class="w-6 h-6 text-gray-800 hover:text-gray-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                    </svg>
                </a>
                <button data-modal-target="default-modal" data-modal-toggle="default-modal" type="button">
                    <svg class="w-6 h-6 text-gray-800 hover:text-gray-600  dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.3 4.8 2.9 2.9M7 7H4a1 1 0 0 0-1 1v10c0 .6.4 1 1 1h11c.6 0 1-.4 1-1v-4.5m2.4-10a2 2 0 0 1 0 3l-6.8 6.8L8 14l.7-3.6 6.9-6.8a2 2 0 0 1 2.8 0Z"/>
                    </svg>
                </button>
                {{-- <a href="" data-modal-target="edit-modal" data-modal-toggle="edit-modal">
                    <svg class="w-6 h-6 text-gray-800 hover:text-gray-600  dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.3 4.8 2.9 2.9M7 7H4a1 1 0 0 0-1 1v10c0 .6.4 1 1 1h11c.6 0 1-.4 1-1v-4.5m2.4-10a2 2 0 0 1 0 3l-6.8 6.8L8 14l.7-3.6 6.9-6.8a2 2 0 0 1 2.8 0Z"/>
                    </svg>  
                </a> --}}
            </div>
        </div>
        <div class="w-1/3 px-5 pt-5 border-2 rounded-md">
            <h2 class="mb-4 text-sm font-extrabold leading-none tracking-tight text-gray-900  dark:text-white" >add participant</h2>
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
        <!-- Main modal -->
    <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Edit Course Detail
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="max-w-md mx-auto" action="{{ route('course.update', $course->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-5">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" >Course Title</label>
                        <input value="{{$course->name}}" type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    <div>
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <textarea  id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Class Detail and Desription...">{{$course->description}}</textarea>
                    </div>
                    {{-- <div class="mt-4">
                        <label class="relative inline-flex items-center me-5 cursor-pointer">
                            <input type="checkbox" value="false" class="sr-only peer" checked>
                            <div class="w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-green-600"></div>
                            <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Status</span>
                          </label>
                    </div> --}}
                    <div class="mt-4">
                        <button data-modal-hide="static-modal" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </div>                     
                </form>
            </div>
        </div>
    </div>
  


</section>
@endsection