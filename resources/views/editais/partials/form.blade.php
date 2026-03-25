<div class="space-y-2">
    <label for="title" class="text-sm font-medium text-gray-700">Título</label>
    <input
        id="title"
        type="text"
        name="title"
        value="{{ old('title', $edital?->title) }}"
        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
        required
    >
    @error('title')
        <p class="text-sm text-rose-600">{{ $message }}</p>
    @enderror
</div>

<div class="space-y-2">
    <label for="description" class="text-sm font-medium text-gray-700">Descrição</label>
    <textarea
        id="description"
        name="description"
        rows="5"
        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
        required
    >{{ old('description', $edital?->description) }}</textarea>
    @error('description')
        <p class="text-sm text-rose-600">{{ $message }}</p>
    @enderror
</div>

<div class="grid gap-6 md:grid-cols-2">
    <div class="space-y-2">
        <label for="area" class="text-sm font-medium text-gray-700">Área</label>
        <input
            id="area"
            type="text"
            name="area"
            value="{{ old('area', $edital?->area) }}"
            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            required
        >
        @error('area')
            <p class="text-sm text-rose-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="space-y-2">
        <label for="territory" class="text-sm font-medium text-gray-700">Território</label>
        <input
            id="territory"
            type="text"
            name="territory"
            value="{{ old('territory', $edital?->territory) }}"
            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            required
        >
        @error('territory')
            <p class="text-sm text-rose-600">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="grid gap-6 md:grid-cols-2">
    <div class="space-y-2">
        <label for="deadline" class="text-sm font-medium text-gray-700">Prazo</label>
        <input
            id="deadline"
            type="date"
            name="deadline"
            value="{{ old('deadline', isset($edital) && $edital?->deadline ? $edital->deadline->format('Y-m-d') : null) }}"
            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            required
        >
        @error('deadline')
            <p class="text-sm text-rose-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="space-y-2">
        <label for="official_link" class="text-sm font-medium text-gray-700">Link oficial</label>
        <input
            id="official_link"
            type="url"
            name="official_link"
            value="{{ old('official_link', $edital?->official_link) }}"
            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
            placeholder="https://"
        >
        @error('official_link')
            <p class="text-sm text-rose-600">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="flex items-center justify-between gap-3 border-t border-gray-100 pt-4">
    <a href="{{ route('editais.index') }}" class="text-sm font-medium text-gray-500 hover:text-gray-700">
        Cancelar
    </a>

    <button
        type="submit"
        class="inline-flex items-center rounded-md bg-blue-600 px-4 py-2 text-sm font-semibold text-white transition hover:bg-blue-500"
    >
        {{ $submitLabel }}
    </button>
</div>
