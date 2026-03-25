<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-900">Novo edital</h2>
    </x-slot>

    <div class="py-10">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
            <form action="{{ route('editais.store') }}" method="POST" class="space-y-6 rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-100">
                @csrf

                @include('editais.partials.form', ['edital' => null, 'submitLabel' => 'Salvar edital'])
            </form>
        </div>
    </div>
</x-app-layout>
