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
        {{ __('Edit Lot') }} "{{ $lot->name  }}" </h2>
    <form action="{{ route('lots.update', $lot->id) }}" method="POST" onsubmit="return confirm( 'Are you sure ?'); " >
        @csrf
        @method('PATCH')
        <div class="mb-6">
            <label for="name"
                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Lot Name') }}</label>
            <input type="text" id="name" name="name" value="{{ $lot->name }}"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                   placeholder="{{ __('Write name for new lot') }}">
        </div>
        <div class="mb-6">

            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Lot
                Description') }} </label>
            <textarea id="description" rows="4" name="description" placeholder="{{ __('Write description for new lot') }} "
                      class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $lot->description }}</textarea>
        </div>
        <div class="mb-6">
            <label for="categories" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Multiply Select For Category (press CTRL or SHIFT)') }} </label>
            <select id="categories" size="5" multiple name="category[]"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach($categories as $category)
                    <option
                        @selected($lot->categories->contains($category->id)) value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

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
