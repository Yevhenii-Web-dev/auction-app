@extends('partials.app')
@section('content')
    <h2 class="mb-4 text-center text-3xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl dark:text-white">
        {{ __('Create New Lot Page') }} </h2>
    <form action="{{ route('lots.store') }}" method="POST">
        <div class="mb-6">
            <label for="name"
                   class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Lot Name') }}</label>
            <input type="text" id="name" name="name"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                   placeholder="{{ __('Write name for new lot') }}">
        </div>
        <div class="mb-6">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Lot
                Description') }} </label>
            <input type="text" id="description" placeholder="{{ __('Write description for new lot') }} " name="description"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            >
        </div>
        <div class="mb-6">

            <label for="categories" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Multiply Select An
                Option (press CTRL or SHIFT)') }} </label>
            <select id="categories" size="5" multiple name="categories"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach($categories as $category)

                        <option {{ ($loop->first())? 'selected': '' }} value="{{ $category->id }}">{{ $category->name }}</option>


                @endforeach
            </select>

        </div>

        <div class="flex gap-4">
            <a href="{{ route( 'lots.index') }}"
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
