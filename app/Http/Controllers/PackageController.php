<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function create()
    {
        return view('dashboards.packages.create');
    }

    public function edit($id)
    {
        $result = Package::findOrFail($id);

        return view('dashboards.packages.edit', [
            'result' => $result
        ]);
    }

    public function list()
    {
        $results = Package::withCount('users')->get();

        return view('dashboards.packages.index', [
            'results' => $results
        ]);
    }

    public function show($id)
    {
        $result = Package::withCount('users')->findOrFail($id);

        return view('dashboards.packages.show', [
            'result' => $result
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:1',
            'active_period' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:1000',
        ]);

        $model = new Package();
        $model->fill($validated);

        if ($model->saveOrFail())
            return $this->sendSuccess(200, 'Berhasil menyimpan data.', null);

        return $this->sendError(500, 'Gagal menyimpan data.');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:1',
            'active_period' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:1000',
        ]);

        $model = Package::findOrFail($id);
        $model->fill($validated);

        if ($model->saveOrFail())
            return $this->sendSuccess(200, 'Berhasil merubah data.', null);

        return $this->sendError(500, 'Gagal merubah data.');
    }

    public function destroy($id)
    {
        if (Package::destroy($id))
            return $this->sendSuccess(200, 'Berhasil menghapus data.', null);

        return $this->sendError(500, 'Gagal menghapus data.');
    }
}
