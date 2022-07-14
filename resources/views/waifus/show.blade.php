<x-layout>
    @include('partials._serach')

    <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4">
        <x-card class="p-10">
            <div class="flex flex-col items-center justify-center text-center">
                <img class="w-48 mr-6 mb-6"
                    src="{{ $waifu->image ? asset('storage/' . $waifu->image) : asset('images/no-image.png') }}"
                    alt="" />
                <h3 class="text-2xl mb-2">{{ $waifu->title }}</h3>
                <div class="text-xl font-bold mb-4">{{ $waifu->company }}</div>

                <x-waifu-tags :tagsCsv="$waifu->tags" />

                <div class="text-lg my-4">
                    <i class="fa-solid fa-location-dot"></i> {{ $waifu->game }}
                </div>
                <div class="border border-gray-200 w-full mb-6"></div>
                <div>
                    <h3 class="text-3xl font-bold mb-4">
                        Waifu Description
                    </h3>
                    <div class="text-lg space-y-6">
                        {{ $waifu->descreption }}
                        <br>
                        Age: {{ $waifu->age }}
                        <a href="{{ $waifu->email }}"
                            class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"><i
                                class="fa-solid fa-envelope"></i>
                            Contact Waifu
                        </a>

                        <a href="{{ $waifu->website }}" target="_blank"
                            class="block bg-black text-white py-2 rounded-xl hover:opacity-80"><i
                                class="fa-solid fa-globe"></i> Visit
                            Website</a>
                    </div>
                </div>
            </div>
        </x-card>

        <x-card class='mt-4 p-2 flex space-x-6'>
            <a href="/waifus/{{ $waifu->id }}/edit">
                <i class="fa-solid fa-pencil"></i> Edit
            </a>

            <form>
            </form>


            <form action="/waifus/{{ $waifu->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
            </form>
        </x-card>

    </div>
</x-layout>
