<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEditalRequest;
use App\Http\Requests\UpdateEditalRequest;
use App\Models\Edital;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EditalController extends Controller
{
    public function index(Request $request): View
    {
        $this->authorize('viewAny', Edital::class);

        $search = trim((string) $request->string('search'));

        $editais = Edital::query()
            ->where('user_id', $request->user()->id)
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery
                        ->where('title', 'like', "%{$search}%")
                        ->orWhere('area', 'like', "%{$search}%")
                        ->orWhere('territory', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(8)
            ->withQueryString();

        return view('editais.index', compact('editais', 'search'));
    }

    public function create(): View
    {
        $this->authorize('create', Edital::class);

        return view('editais.create');
    }

    public function store(StoreEditalRequest $request): RedirectResponse
    {
        Edital::create([
            ...$request->validated(),
            'user_id' => $request->user()->id,
        ]);

        return redirect()
            ->route('editais.index')
            ->with('success', 'Edital cadastrado com sucesso.');
    }

    public function edit(Edital $edital): View
    {
        $this->authorize('update', $edital);

        return view('editais.edit', compact('edital'));
    }

    public function update(UpdateEditalRequest $request, Edital $edital): RedirectResponse
    {
        $this->authorize('update', $edital);

        $edital->update($request->validated());

        return redirect()
            ->route('editais.index')
            ->with('success', 'Edital atualizado com sucesso.');
    }

    public function destroy(Edital $edital): RedirectResponse
    {
        $this->authorize('delete', $edital);

        $edital->delete();

        return redirect()
            ->route('editais.index')
            ->with('success', 'Edital removido com sucesso.');
    }
}
