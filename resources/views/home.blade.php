@extends('layouts/header')

@section('content')

    <!-- Container -->
    <div class="bg-white shadow-lg rounded-lg w-full max-w-md p-6">
        <!-- Header -->
        <h1 class="text-2xl font-bold text-gray-800 mb-4 text-center">To-Do List</h1>

        <!-- Input Form -->
        <form action="/add" method="POST" class="flex items-center gap-2 mb-4">
        @csrf
            <input 
                type="text" 
                placeholder="Add a new task..." 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                name="title"
            />
            <button 
                type="submit" 
                class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">
                Add
            </button>
        </form>

        <!-- To-Do Items -->
        <ul class="space-y-3">

            @foreach ($posts as $post)
            
            <li class="flex items-center justify-between bg-gray-50 p-3 rounded-lg shadow">
                <div class="flex items-center gap-2">
                    <input type="checkbox" class="w-4 h-4 text-blue-500 focus:ring-blue-500 update-status" data-id="{{$post->id}}" {{ $post->status ? '' : 'checked' }}/>
                    <span class="text-gray-700">{{ $post->title }}</span>
                </div>
                <form class="m-0" action="{{ route('posts.destroy', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-red-700 transition">Delete</button>
                </form>
            </li>

            @endforeach

        </ul>
    </div>

@endsection

@extends('layouts/footer')

