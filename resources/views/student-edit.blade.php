@extends('layouts.app')
@section('content')
<section>
    <div class="w-full flex justify-center ">
        <div class="w-4/5 mt-20">
            <form class="max-w-md mx-auto" action="{{ route('student.update', $student->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" >Name</label>
                    <input type="text" id="name" value="{{$student->name}}" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-5">
                    <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" >Gender</label>
                    <input type="text" id="gender" value="{{$student->gender}}" name="gender" placeholder="male/female" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-5">
                    <label for="birthdate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" >Birthdate</label>
                    <input type="text" id="birthdate" value="{{$student->date_of_birth}}" name="birthdate" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-5">
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" >Phone</label>
                    <input type="text" id="phone" name="phone" value="{{$student->telp}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mt-4">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</button>
                </div>                     
            </form>
        </div>
    </div>
</section>
@endsection
    