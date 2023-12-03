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

                                        <button data-delete-route="{{ route('offers.destroy', $offer->id) }}"
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

{{--@section('script')--}}
{{--    @include('layouts.delete-script')--}}
{{--@endsection--}}
