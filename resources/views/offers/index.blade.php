@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <section class="py-4 bg-white rounded-xl mt-4">
            <div class="container px-4 mx-auto">
                <div class="flex flex-wrap items-center justify-between mx-4">
                    <div class="w-full text-center md:text-left md:w-auto px-4 mb-2 md:mb-0">
                        <h2 class="text-3xl font-heading font-bold leading-relaxed">Offers</h2>
                    </div>
                </div>
            </div>
        </section>


        <section class="py-8 container px-4 mx-auto">
            <div class="bg-white py-4 mb-4 rounded-xl">
                <form action="{{ auth()->user()->isAdmin() ? route('offers.index') : route('offers.my') }}" method="GET"
                      class="flex md:flex-row flex-col gap-8 justify-center">
                    <div class="px-8 py-2 bg-white border border-gray-200 rounded-3xl">
                        <select
                            name="status"
                            class="w-full bg-transparent text-md text-gray-900 placeholder-gray-200 font-bold outline-none"
                        >
                            <option value="" selected>Select status...</option>
                            @foreach(\App\Constants\Status::LIST as $status)
                                <option
                                    {{ request()->query('status') === $status ? 'selected' : '' }}
                                    value="{{ $status }}"
                                >{{ $status }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="px-8 py-2 bg-white border border-gray-200 rounded-3xl">
                        <select
                            class="w-full bg-transparent text-md text-gray-900 placeholder-gray-200 font-bold outline-none"
                            name="location"
                        >
                            <option disabled selected>Select location...</option>
                            @foreach($locations as $location)
                                <option
                                    {{ request()->query('location') == $location->id ? 'selected' : '' }}
                                    value="{{ $location->id }}">{{ $location->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="px-8 py-2 bg-white border border-gray-200 rounded-3xl">
                        <select
                            class="w-full bg-transparent text-md text-gray-900 placeholder-gray-200 font-bold outline-none"
                            name="category"
                        >
                            <option disabled selected>Select category...</option>
                            @foreach($categories as $category)
                                <option
                                    {{ request()->query('category') == $category->id ? 'selected' : '' }}
                                    value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="bg-white">
                        <input
                            class="appearance-none px-6 py-2 w-full text-sm text-gray-600 font-bold bg-white placeholder-gray-300 outline-none border border-gray-200 focus:ring-1 focus:ring-green-200 rounded-full"
                            type="text"
                            name="title"
                            placeholder="Search by title..."
                            value="{{ request()->query('title') }}"
                        >
                    </div>
                    <div>
                        <button type="submit"
                                class="inline-block place-items-center md:max-w-max max-w-full w-full px-8 py-2 text-lg text-center text-white font-bold bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-200 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                <path fill="none" d="M0 0h24v24H0z"/>
                                <path
                                    d="M18.031 16.617l4.283 4.282-1.415 1.415-4.282-4.283A8.96 8.96 0 0 1 11 20c-4.968 0-9-4.032-9-9s4.032-9 9-9 9 4.032 9 9a8.96 8.96 0 0 1-1.969 5.617zm-2.006-.742A6.977 6.977 0 0 0 18 11c0-3.868-3.133-7-7-7-3.868 0-7 3.132-7 7 0 3.867 3.132 7 7 7a6.977 6.977 0 0 0 4.875-1.975l.15-.15z"
                                    fill="rgba(255,255,255,1)"/>
                            </svg>
                        </button>
                    </div>
                    <a href="{{ url()->current() }}"
                       class="inline-block place-items-center md:max-w-max max-w-full w-full px-8 py-2 text-md text-center text-black font-normal bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:ring-gray-200 rounded-full">
                        Clear filter
                    </a>
                </form>
            </div>

            @if ($offers->count() <= 0)
                <div class="mb-16 bg-white border border-gray-100 rounded-xl">
                    <div class="flex flex-col justify-center items-center">
                        <img class="max-w-sm" src="{{ asset('images/no-result.png') }}" alt="No result">
                        <h3 class="p-6 text-center text-xl">
                            No data found
                        </h3>
                    </div>
                </div>
            @else
                <div class="overflow-x-auto mb-2 bg-white border border-gray-100 rounded-xl">
                    <table class="table-auto min-w-full">
                        <thead>
                        <tr class="bg-gray-200 py-10 h-20">
                            @foreach(['Created by', 'Title', 'Price', 'Category', 'Location', 'Status'] as $title)
                                <td class="relative px-2 border-b border-gray-100">
                                    <div class="flex items-center pl-4 text-sm font-heading font-semibold uppercase">
                                        {{ $title }}
                                    </div>
                                </td>
                            @endforeach
                            <td class="relative px-2 border-b border-gray-100">
                                <div
                                    class="flex justify-center items-center pl-4 text-sm font-heading font-semibold uppercase">
                                    Action
                                </div>
                            </td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($offers as $offer)
                            <tr class="border-b border-gray-100">
                                <td class="p-0">
                                    <div
                                       class="flex break-words items-center pl-4">
                                        <img class="w-8 h-8 rounded-full object-cover" src="{{ asset($offer->author->image_url) }}" alt="User">

                                        <span class="font-heading font-medium ml-5 inline-block">{{ $offer->author->name }}</span>
                                    </div>
                                </td>
                                <td class="p-0">
                                    <a href="{{ route('offers.show', $offer) }}"
                                       class="flex break-words items-center pl-4">
                                        <span class="font-heading font-medium">{{ $offer->title }}</span>
                                    </a>
                                </td>
                                <td class="p-0">
                                    <div class="flex break-words items-center p-5">
                                        <span
                                            class="text-darkBlueGray-400 font-heading">{{ $offer->price }}</span>
                                    </div>
                                </td>
                                <td class="p-0">
                                    <div class="flex break-words items-center p-5">
                                        <span
                                            class="text-darkBlueGray-400 font-heading">{{ getTitles($offer->categories) }}</span>
                                    </div>
                                </td>
                                <td class="p-0">
                                    <div class="flex break-words items-center p-5">
                                        <span
                                            class="text-darkBlueGray-400 font-heading">{{ getTitles($offer->locations) }}</span>
                                    </div>
                                </td>
                                <td class="p-0">
                                    <div class="flex items-center p-5">
                                        @if($offer->status === \App\Constants\Status::DRAFT)
                                            <span
                                                class="px-2 py-1 bg-gray-500 font-heading rounded-xl text-white">{{ $offer->status }}</span>
                                        @else
                                            <span
                                                class="px-2 py-1 bg-green-500 font-heading rounded-xl text-white">{{ $offer->status }}</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="p-0">
                                    <div class="flex items-center justify-center p-5">
                                        <a class="inline-flex w-8 h-8 mr-2 items-center justify-center bg-green-500 hover:bg-green-600 rounded-2xl"
                                           href="{{ route('offers.edit', $offer->id) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20"
                                                 height="20">
                                                <path fill="none" d="M0 0h24v24H0z"/>
                                                <path
                                                    d="M15.728 9.686l-1.414-1.414L5 17.586V19h1.414l9.314-9.314zm1.414-1.414l1.414-1.414-1.414-1.414-1.414 1.414 1.414 1.414zM7.242 21H3v-4.243L16.435 3.322a1 1 0 0 1 1.414 0l2.829 2.829a1 1 0 0 1 0 1.414L7.243 21z"
                                                    fill="rgba(255,255,255,1)"/>
                                            </svg>
                                        </a>

                                        <button
                                                data-delete-route="{{ route('offers.destroy', $offer->id) }}"
                                                class="delete-item-btn inline-flex w-8 h-8 items-center justify-center bg-red-500 hover:bg-red-600 rounded-2xl">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20"
                                                 height="20">
                                                <path fill="none" d="M0 0h24v24H0z"/>
                                                <path
                                                    d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z"
                                                    fill="rgba(255,255,255,1)"/>
                                            </svg>
                                        </button>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="p-4">
                    {{ $offers->links() }}
                </div>
            @endif
        </section>
    </div>
@endsection

@section('script')
    @include('layouts.scripts.delete-script')
@endsection
