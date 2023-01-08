@extends('partials.app')
@section('content')
    @if(session('status'))
        <div
            class="flex p-4 mb-4 text-sm text-green-700 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
            role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                      clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">{{ __('Info') }}</span>
            <div>
                <span class="font-medium">{{ __('Success alert!') }}</span> {{ session('status') }}
            </div>
        </div>
    @endif
    <div class="flex justify-end mb-10">
        <a href="{{ route('categories.create') }}" class="focus:outline-none text-white bg-green-800 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-800 dark:hover:bg-green-900 dark:focus:ring-green-800">
            {{ __('Add New Category') }}  </a>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-10">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr class="text-center">
                <th scope="col"  class="px-6 py-3">
                    {{ __('Category name ') }}
                </th>
                <th scope="col" class="px-6 py-3">
                     {{ __('Date of creation') }}
                </th>
                <th scope="col" class="px-6 py-3">
                     {{ __('Action') }}
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr class=" text-center bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $category->name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $category->created_at->format('d-m-Y') }}
                    </td>
                    <td class="px-6 py-4 flex gap-4 justify-center">
                        <a href="{{ route('categories.show', [$category->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>
                        <a href="{{ route('categories.edit', [$category->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        <form method="POST" action="{{ route('categories.destroy',[$category->id]) }}" onsubmit="return confirm( 'Are you sure ?' ); ">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">{{ __('Delete') }}</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="flex justify-center">
        {{ $categories->links('vendor.pagination.tailwind-two') }}
    </div>
@endsection
