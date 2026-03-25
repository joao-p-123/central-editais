<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-900">Editar edital</h2>
    </x-slot>

    <div class="py-10">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
            <form action="{{ route('editais.update', $edital) }}" method="POST" class="space-y-6 rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-100">
                @csrf
                @method('PUT')

                @include('editais.partials.form', ['submitLabel' => 'Atualizar edital'])
            </form>
        </div>
    </div>
</x-app-layout>
