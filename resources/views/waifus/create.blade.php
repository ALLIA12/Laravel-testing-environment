<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Create a Waifu
            </h2>
            <p class="mb-4">Post a waifu to find a weeb</p>
        </header>

        <!--add multiprt/fom data for when you are uploading files-->
        <form method="POST" action="/waifus" enctype="multipart/form-data">
            <!-- this is use used to protect agnist corss site scripts attacks, used when ever you have post methods-->
            @csrf
            <div class="mb-6">
                <label for="company" class="inline-block text-lg mb-2">Company Name</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="company"
                    value="{{ old('company') }}" />
                @error('company')
                    <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2">Waifu Title</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title"
                    placeholder="Example: Ganyu" value="{{ old('title') }}" />
                @error('title')
                    <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="game" class="inline-block text-lg mb-2">Waifu Game/Anime</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="game"
                    placeholder="Example: Genshin Impact, One piece" value="{{ old('game') }}" />
                @error('game')
                    <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="age" class="inline-block text-lg mb-2">
                    Waifu Age
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="age"
                    placeholder="Example: 12, 13, 69" value="{{ old('age') }}" />
                @error('age')
                    <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Contact Email</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="email"
                    value="{{ old('email') }}" />
                @error('email')
                    <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="website" class="inline-block text-lg mb-2">
                    Website/Application URL
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="website"
                    value="{{ old('website') }}" />
                @error('website')
                    <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">
                    Tags (Comma Separated)
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags"
                    placeholder="Anime, milf, loli, etc" value="{{ old('tags') }}" />
                @error('tags')
                    <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="image" class="inline-block text-lg mb-2">
                    Company Logo
                </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="image" />
            </div>
            @error('image')
                <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
            @enderror

            <div class="mb-6">
                <label for="descreption" class="inline-block text-lg mb-2">
                    Job Description
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="descreption" rows="10"
                    placeholder="Big goth titty waifu">
                    {{ old('descreption') }}
                </textarea>
                @error('descreption')
                    <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Create Waifu
                </button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>
</x-layout>
