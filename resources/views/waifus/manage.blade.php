<x-layout>
    <x-card class="p-10">
        <header>
            <h1 class="text-3xl text-center font-bold my-6 uppercase">
                Manage Waifus
            </h1>
        </header>

        <table class="w-full table-auto rounded-sm">
            <tbody>
                @if ($waifus->isEmpty())
                    <tr class="border-gray-300">
                        <td class="px-4 py-8 border-t boder-b border-gray-300 text-lg">
                            <p class="text-center">No Waifus Found</p>
                        </td>
                    </tr>
                @else
                    @foreach ($waifus as $waifu)
                        <tr class="border-gray-300">
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="show.html">
                                    {{ $waifu->title }}
                                </a>
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="/waifus/{{ $waifu->id }}/edit"
                                    class="text-blue-400 px-6 py-2 rounded-xl"><i class="fa-solid fa-pen-to-square"></i>
                                    Edit</a>
                            </td>
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <form action="/waifus/{{ $waifu->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </x-card>
</x-layout>
