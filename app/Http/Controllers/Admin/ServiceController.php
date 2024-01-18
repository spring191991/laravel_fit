<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::orderBy('created_at', 'desc')->paginate();
        return response(view('admin.service.index', compact('services')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response(view('admin.service.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('image');
        if ($image) { // был загружен файл изображения
            $path = $image->store('service/source', 'public');
            $base = basename($path);
        }
        $data = $request->all();
        $data['image'] = $base ?? null;
        Service::create($data);
        return response(redirect()
            ->route('admin.service.index')
            ->with('success', 'Новая услуга успешно создана'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return response(view('admin.service.edit', compact('service' )));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        if ($request->remove) { // если надо удалить изображение
            $old = $service->image;
            if ($old) {
                Storage::disk('public')->delete('service/source/' . $old);
            }
        }
        $file = $request->file('image');
        if ($file) { // был загружен файл изображения
            $path = $file->store('service/source', 'public');
            $base = basename($path);
            // удаляем старый файл изображения
            $old = $service->image;
            if ($old) {
                Storage::disk('public')->delete('service/source/' . $old);
            }
        }
        $data = $request->all();
        $data['image'] = $base ?? null;
        $service->update($data);
        return response(redirect()
            ->route('admin.service.index', [])
            ->with('success', 'Услуга успешно обновлена'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        // удаляем файл изображения
        $image = $service->image;
        if ($image) {
            Storage::disk('public')->delete('service/source/' . $image);
        }
        $service->delete();
        return response(redirect()
            ->route('admin.service.index')
            ->with('success', 'Услуга успешно удалена'));
    }
}
