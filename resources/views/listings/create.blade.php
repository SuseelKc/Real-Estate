<x-layout>
            <x-card class="p-10 rounded max-w-lg mx-auto mt-24">
                    <header class="text-center">
                        <h2 class="text-2xl font-bold uppercase mb-1">
                            List your Property
                        </h2>
                        <p class="mb-4">Post your property to find your buyer</p>
                    </header>

                    <form method="POST" action="/listings" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-6">
                            <label for="property" class="inline-block text-lg mb-2">
                                Property Name
                                </label>
                            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="property" 
                            value="{{old('property')}}"/>

                            @error('property')
                                <p class="text-red-500 text-xs mt-1">{{$message}} </p>
                                
                            @enderror

                        </div>

                        <div class="mb-6">
                            <label for="title" class="inline-block text-lg mb-2"
                                >Property Title
                                </label>
                            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title" placeholder="Example: Kathmandu Land for Sale/Rent"
                            value="{{old('title')}}"/>
                        @error('title')
                            <p class="text-red-500 text-xs mt-1">{{$message}} </p>
                            
                        @enderror
                        </div>

                        <div class="mb-6">
                            <label
                                for="location"
                                class="inline-block text-lg mb-2"
                                >Property Location</label
                            >
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="location"
                                placeholder="Example: Remote, Boston MA, etc"
                                value="{{old('location')}}"
                            />

                        @error('location')
                            <p class="text-red-500 text-xs mt-1">{{$message}} </p>
                            
                        @enderror
                        </div>

                        <div class="mb-6">
                            <label for="email" class="inline-block text-lg mb-2"
                                >Contact Email</label>
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="email"
                                value="{{old('email')}}"
                                
                            />
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{$message}} </p>
                            
                        @enderror    
                        </div>

                        <div class="mb-6">
                            <label
                                for="website"
                                class="inline-block text-lg mb-2"
                            >
                                Website/Application URL
                            </label>
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="website"
                                value="{{old('website')}}"
                            />
                        @error('website')
                            <p class="text-red-500 text-xs mt-1">{{$message}} </p>
                            
                        @enderror
                        </div>

                        <div class="mb-6">
                            <label for="tags" class="inline-block text-lg mb-2">
                                Tags (Comma Separated)
                            </label>
                            <input
                                type="text"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="tags"
                                placeholder="Example: Land, Sell, Rent, Office, House etc"
                                value="{{old('tags')}}"
                                />
                        @error('tags')
                            <p class="text-red-500 text-xs mt-1">{{$message}} </p>
                            
                        @enderror
                        </div>

                        <div class="mb-6">
                            <label for="photo" class="inline-block text-lg mb-2">
                                Property Photo
                            </label>
                            <input
                                type="file"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="photo"
                            />
                        @error('photo')
                            <p class="text-red-500 text-xs mt-1">{{$message}} </p>
                            
                        @enderror
                        </div>

                        <div class="mb-6">
                            <label
                                for="description"
                                class="inline-block text-lg mb-2"
                            >
                                Property Description
                            </label>
                            <textarea
                                class="border border-gray-200 rounded p-2 w-full"
                                name="description"
                                rows="10"
                                placeholder="Include tasks, requirements, salary, etc"
                            >{{old('description')}}</textarea>
                        @error('description')
                            <p class="text-red-500 text-xs mt-1">{{$message}} </p>
                            
                        @enderror
                        </div>

                        <div class="mb-6">
                            <button
                                class="bg-blue-500 text-white rounded py-2 px-4 hover:bg-black"
                            >
                                Post
                            </button>

                            <a href="/" class="text-black ml-4"> Back </a>
                        </div>
                    </form>
            </x-card>
</x-layout>