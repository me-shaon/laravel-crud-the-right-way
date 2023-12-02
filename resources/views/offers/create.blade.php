@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <section>
            <form action="{{ route('offers.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="bg-gray-100 py-6 sm:py-12 flex justify-center align-items">
                    <div class="relative max-w-2xl w-full px-5 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl sm:p-10">
                        <h2 class="font-semibold text-xl text-gray-700 leading-relaxed text-center">Create offer</h2>
                        <div class="divide-y divide-gray-200">
                            <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                <div class="flex flex-col">
                                    <label class="leading-loose">Title <span class="text-red-400 text-sm">(required)</span></label>
                                    <input name="title" value="{{ old('title') }}" type="text" required="required" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Title">
                                    @error('title')
                                    <p class="text-red-700 p-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="flex flex-col">
                                    <label class="leading-loose">Price <span class="text-red-400 text-sm">(required)</span></label>
                                    <input name="price" value="{{ old('price') }}" type="number" min="0" required="required" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Price">
                                    @error('price')
                                    <p class="text-red-700 p-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="flex flex-col">
                                    <label class="leading-loose">Category <span class="text-red-400 text-sm">(required)</span></label>
                                    <select
                                        class="px-4 py-1 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                        id="select-category"
                                        name="categories[]"
                                        multiple
                                        autocomplete="off"
                                    >
                                        <option value="">Select categories...</option>
                                        @foreach($categories as $category)
                                            <option {{ in_array($category->id, old('categories', [])) ? 'selected' : '' }} value="{{ $category->id }}"> {{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('categories')
                                    <p class="text-red-700 p-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="flex flex-col">
                                    <label class="leading-loose">Location <span class="text-red-400 text-sm">(required)</span></label>
                                    <select
                                        class="px-4 py-1 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                        id="select-location"
                                        name="locations[]"
                                        multiple
                                        autocomplete="off"
                                    >
                                        <option value="">Select locations...</option>
                                        @foreach($locations as $location)
                                            <option {{ in_array($location->id, old('locations', [])) ? 'selected' : '' }} value="{{ $location->id }}"> {{ $location->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('locations')
                                    <p class="text-red-700 p-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="flex flex-col image-preview">
                                    <label class="leading-loose">Image</label>
                                    <div class="flex items-center justify-center p-4">
                                        <img class="w-96 h-72 object-cover rounded-3xl" src="{{ asset(\App\Models\Offer::PLACEHOLDER_IMAGE_PATH) }}" alt="">
                                    </div>
                                    <input name="image" type="file" class="image-upload-input px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="">
                                    @error('image')
                                    <p class="text-red-700 p-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="flex flex-col">
                                    <label class="leading-loose">Description <span class="text-red-400 text-sm">(required)</span></label>
                                    <textarea name="description" rows="5" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" placeholder="Description">{{ old('description') }}</textarea>
                                    @error('description')
                                    <p class="text-red-700 p-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="pt-4 flex items-center space-x-4">
                                <a href="" class="flex justify-center items-center w-full text-gray-900 px-4 py-3 rounded-md focus:outline-none border border-gray-200">
                                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg> Cancel
                                </a>
                                <button class="bg-green-500 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none">Create</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection

@section('script')
    @include('layouts.scripts.image-upload-preview-script')

<script>
    $(document).ready(function() {
        new TomSelect("#select-category",{
            plugins: ['remove_button'],
            maxItems: 5,
            onItemAdd:function(){
                this.setTextboxValue('');
            },
        });

        new TomSelect("#select-location",{
            plugins: ['remove_button'],
            maxItems: 5,
            onItemAdd:function(){
                this.setTextboxValue('');
            },
        });
    });
</script>
@endsection
