<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Twitters') }}
        </h2>
    </x-slot>

    <div class="py-12">
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex items-center justify-end mt-4">
                <x-button >
                   <a class="ml-4" href="{{url('/post/add')}}">Add More Tweet</a>
                </x-button>
            </div>
            <br>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
            
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    Tweet
                </th>
                <th scope="col" class="px-6 py-3">
                    Image
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
                <th scope="col" class="px-6 py-3">
                    Test Twitter
                </th>
            </tr>
        </thead>
        <tbody>
        @foreach($posts as $row)
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$posts->firstItem()+$loop->index}}
                </th>
                <td class="px-6 py-4">
                    {{$row->tweet_text}}
                </td>
                <td class="px-6 py-4">
                    {{$row->image}}
                </td>
                <td class="px-6 py-4">
                    <a href="{{url('/post/edit/'.$row->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
                <td class="px-6 py-4">
                    <a href="{{url('/post/edit/'.$row->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Tweet</a>
                </td>
            </tr>
            @endforeach
            </div>
        </div>
    </div>
</x-app-layout>