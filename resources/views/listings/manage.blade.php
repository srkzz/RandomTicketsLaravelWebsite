<x-layout>
    <x-card class="p-10">
        <table class="w-full table-auto rounded-sm">
                <header>
                    <h1 class="text-3xl text-center font-bold my-6 uppercase">
                        TICKETS ATIVOS 
                    </h1>
                </header>
                @unless($listings->isEmpty())
                    @foreach ($listings as $listing)
                        <tr class="border-gray-300">
                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <h3 class="text-2xl mb-2"><a href="/listings/{{$listing->id}}">{{$listing->title}}</h3>
                            </td>
                            <td class="text-align: right; px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <a href="/listings/{{ $listing->id }}/edit" class="text-blue-400 px-6 py-2 rounded-xl"><i
                                        class="fa-solid fa-pen-to-square"></i>
                                    Editar</a>
                            </td>
                            <td class="text-align: right; px-4 py-8 border-t border-b border-gray-300 text-lg">
                                <form method="POST" action="/listings/{{ $listing->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-500"><i class="fa-solid fa-trash"></i> Apagar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
        @else
            <tr class="border-gray-300">
                <td class="px-4-py-8-border-t border-b border-gray-300 text-lg">
                    <p class="text-center"> Nenhum ticket criado. </p>
                        </td>
                        </tr>
                    </tbody>
                </table>
        @endunless
    </x-card>
</x-layout>
