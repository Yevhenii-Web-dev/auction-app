@extends('partials.app')
@section('content')
    <div class="flex justify-end mb-10">
        <a href="{{ route('lots.create') }}" class="focus:outline-none text-white bg-green-800 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-800 dark:hover:bg-green-900 dark:focus:ring-green-800">Add New Lot </a>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-10">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Lot name
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Date of creation
                </th>
                <th scope="col" class="px-6 py-3">
                    Categories
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($lots as $lot)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $lot->name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $lot->description }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $lot->created_at->format('d-m-Y') }}
                    </td>
                    <td class="px-6 py-4">
                        @foreach($lot->categories as $category)
                            <span
                                class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{ $category->name }}</span>
                        @endforeach
                    </td>

                    <td class="px-6 py-4 text-right">
                        <a href="{{ route('categories.create', ['lot_id' => $lot->id]) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>


    </div>

    <div class="flex justify-center">
        {{ $lots->links('vendor.pagination.tailwind-two') }}
    </div>
@endsection
