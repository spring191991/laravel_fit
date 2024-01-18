<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Category;

class ServiceController extends Controller
{
    public function index() {
        $services = Service::select('services.*')
            ->orderBy('services.created_at', 'desc')
            ->paginate(6);
        return view('pages.services', ['category' => 0, 'services' => $services]);
    }

    public function show($id) {
        $services = Service::select('services.*')
            ->find($id);
        return view('pages.service', compact('services'));
    }

    public function category(Category $category) {
        $services = $category->services()
            ->orderBy('created_at', 'desc')
            ->paginate(6);
        return view('pages.category', compact('category', 'services'));
    }
}
