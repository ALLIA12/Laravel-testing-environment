<x-layout>
    @include('partials._hero')
    @include('partials._serach')
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

        @if (count($waifus) == 0)
            <h1>NO WAIFUS</h1>
        @endif
        @foreach ($waifus as $waifu)
            <!--Pass the prop to the component called waifu card, the component must have a prop -->
            <x-waifu-card :waifu="$waifu" />
        @endforeach

    </div>
    <div class="mt-6 p-4"> {{ $waifus->links() }}</div>
</x-layout>


