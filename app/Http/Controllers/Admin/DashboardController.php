<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.dashboard.index', [
            'pageTitle' => 'Boshqaruv paneli',
            'pageDescription' => 'Buyurtmalar, mahsulotlar va kontent oqimini bitta nafis paneldan boshqaring.',
            'currentPage' => 'dashboard',
        ]);
    }
}
