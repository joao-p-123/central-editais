<?php

namespace App\Http\Controllers;

use App\Models\Edital;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $userId = auth()->id();
        $today = today();

        $editais = Edital::query()
            ->where('user_id', $userId);

        $totalEditais = (clone $editais)->count();
        $editaisEncerrando = (clone $editais)
            ->whereBetween('deadline', [$today, $today->copy()->addDays(7)])
            ->count();
        $editaisVencidos = (clone $editais)
            ->whereDate('deadline', '<', $today)
            ->count();
        $ultimosEditais = (clone $editais)
            ->latest('deadline')
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalEditais',
            'editaisEncerrando',
            'editaisVencidos',
            'ultimosEditais',
        ));
    }
}
