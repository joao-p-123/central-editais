<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h2 class="text-xl font-semibold text-gray-900">Editais</h2>
                <p class="mt-1 text-sm text-gray-500">Gerencie seus editais e acompanhe os prazos.</p>
            </div>

            <a
                href="{{ route('editais.create') }}"
                class="inline-flex items-center rounded-md bg-blue-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-blue-500"
            >
                Novo edital
            </a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="mx-auto max-w-7xl space-y-6 px-4 sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                    {{ session('success') }}
                </div>
            @endif

            <div class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-100">
                <form method="GET" action="{{ route('editais.index') }}" class="grid gap-3 md:grid-cols-[1fr_auto]">
                    <input
                        type="text"
                        name="search"
                        value="{{ $search }}"
                        placeholder="Buscar por título, área ou território"
                        class="w-full rounded-md border-gray-300 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    >

                    <button
                        type="submit"
                        class="inline-flex items-center justify-center rounded-md bg-gray-900 px-4 py-2 text-sm font-semibold text-white transition hover:bg-gray-700"
                    >
                        Buscar
                    </button>
                </form>
            </div>

            <div class="space-y-4">
                @forelse ($editais as $edital)
                    <article class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-100">
                        <div class="flex flex-col gap-4 md:flex-row md:items-start md:justify-between">
                            <div class="space-y-2">
                                <h3 class="text-lg font-semibold text-gray-900">{{ $edital->title }}</h3>
                                <p class="text-sm text-gray-600">{{ $edital->description }}</p>
                                <div class="flex flex-wrap gap-2 text-sm text-gray-500">
                                    <span>{{ $edital->area }}</span>
                                    <span>•</span>
                                    <span>{{ $edital->territory }}</span>
                                </div>
                                <p class="text-sm font-medium {{ $edital->deadline->isPast() ? 'text-rose-600' : 'text-emerald-600' }}">
                                    Prazo: {{ $edital->deadline->format('d/m/Y') }}
                                </p>
                                @if ($edital->official_link)
                                    <a
                                        href="{{ $edital->official_link }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="inline-flex text-sm font-medium text-blue-600 hover:text-blue-500"
                                    >
                                        Abrir link oficial
                                    </a>
                                @endif
                            </div>

                            <div class="flex items-center gap-3">
                                <a
                                    href="{{ route('editais.edit', $edital) }}"
                                    class="inline-flex items-center rounded-md border border-gray-200 px-4 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-50"
                                >
                                    Editar
                                </a>

                                <form action="{{ route('editais.destroy', $edital) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="inline-flex items-center rounded-md border border-rose-200 px-4 py-2 text-sm font-medium text-rose-600 transition hover:bg-rose-50"
                                        onclick="return confirm('Deseja remover este edital?')"
                                    >
                                        Excluir
                                    </button>
                                </form>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="rounded-xl border border-dashed border-gray-300 bg-white px-6 py-12 text-center">
                        <h3 class="text-lg font-semibold text-gray-900">Nenhum edital encontrado</h3>
                        <p class="mt-2 text-sm text-gray-500">Cadastre o primeiro edital para começar a organizar seus prazos.</p>
                    </div>
                @endforelse
            </div>

            <div>
                {{ $editais->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
