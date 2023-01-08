@extends('partials.app')
@section('content')
    <div class="flex justify-center">
        <div
            class=" max-w-sm min-w-[500px] p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $category->name }}</h5>
            <p class="mb-3 min-h-[50px] font-normal text-gray-700 dark:text-gray-400">{{ __('Created date -') }} {{ $category->created_at->format('d-m-Y') }}</p>
            <div class="mb-6">
                <span class="block mb-2 font-bold tracking-tight text-gray-900 dark:text-white"> {{ __('Lots') }}</span>
                @foreach($category->lots as $lot)
                    <span
                        class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 inline-flex mb-3  rounded dark:bg-green-900 dark:text-green-300">{{ $lot->name}}</span>
                @endforeach
            </div>
            <a href="{{ url()->previous() }}"
               class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg  aria-hidden="true" class="rotate-180 w-4 h-4 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                          clip-rule="evenodd"></path>
                </svg>
                {{ __('Beak') }}
            </a>
        </div>
    </div>

@endsection
