@extends('partials.app')
@section('content')
    @if ($errors->any())
        <div
            class="flex p-4 mb-4 text-sm text-red-700 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
            role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                      clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Info</span>

            <ul class="max-w-md space-y-1  list-disc list-inside ">
                <span class="font-medium">Danger alert!</span>
                @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h2 class="mb-4 text-center text-3xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl dark:text-white">
        {{ __('Edit Category') }} "{{ $category->name  }}" </h2>
    <form action="{{ route('categories.update', $category->id) }}" method="POST" onsubmit="return confirm( 'Are you sure ?'); " >
        @csrf
        @method('PATCH')
        <div class="mb-6">
            <label for="name"
                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Category Name') }}</label>
            <input type="text" id="name" name="name" value="{{ $category->name  }}"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                   placeholder="{{ __('Write name for new category') }}">
        </div>

        <div class="flex gap-4">
            <a href="{{ url()->previous() }}"
               class="text-white bg-purple-700 hover:bg-purple-900 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-purple-800 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
                {{ __('Beak') }}
            </a>
            <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                {{ __('Submit') }}
            </button>
        </div>

    </form>

@endsection
