<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-4">
            <div>
                <h2 class="text-xl font-semibold text-gray-900">Dashboard</h2>
                <p class="mt-1 text-sm text-gray-500">Acompanhe seus editais e próximos prazos.</p>
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
            <div class="grid gap-4 md:grid-cols-3">
                <div class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-100">
                    <p class="text-sm font-medium text-gray-500">Total de editais</p>
                    <p class="mt-3 text-3xl font-semibold text-gray-900">{{ $totalEditais }}</p>
                </div>

                <div class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-amber-100">
                    <p class="text-sm font-medium text-gray-500">Encerrando em 7 dias</p>
                    <p class="mt-3 text-3xl font-semibold text-amber-600">{{ $editaisEncerrando }}</p>
                </div>

                <div class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-rose-100">
                    <p class="text-sm font-medium text-gray-500">Vencidos</p>
                    <p class="mt-3 text-3xl font-semibold text-rose-600">{{ $editaisVencidos }}</p>
                </div>
            </div>

            <div class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-100">
                <div class="flex items-center justify-between gap-3">
                    <h3 class="text-lg font-semibold text-gray-900">Últimos editais</h3>
                    <a href="{{ route('editais.index') }}" class="text-sm font-medium text-blue-600 hover:text-blue-500">
                        Ver todos
                    </a>
                </div>

                <div class="mt-6 space-y-4">
                    @forelse ($ultimosEditais as $edital)
                        <div class="rounded-lg border border-gray-100 p-4">
                            <div class="flex flex-col gap-2 md:flex-row md:items-start md:justify-between">
                                <div>
                                    <p class="text-base font-semibold text-gray-900">{{ $edital->title }}</p>
                                    <p class="mt-1 text-sm text-gray-500">
                                        {{ $edital->area }} • {{ $edital->territory }}
                                    </p>
                                </div>

                                <span class="inline-flex w-fit rounded-full px-3 py-1 text-xs font-semibold {{ $edital->deadline->isPast() ? 'bg-rose-100 text-rose-700' : 'bg-emerald-100 text-emerald-700' }}">
                                    Prazo: {{ $edital->deadline->format('d/m/Y') }}
                                </span>
                            </div>
                        </div>
                    @empty
                        <div class="rounded-lg border border-dashed border-gray-200 p-8 text-center">
                            <p class="text-sm text-gray-500">Nenhum edital cadastrado ainda.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
