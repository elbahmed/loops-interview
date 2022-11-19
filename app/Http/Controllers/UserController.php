<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        $packages = Package::all();

        return view('dashboards.users.create', [
            'packages' => $packages
        ]);
    }

    public function edit($id)
    {
        $packages = Package::all();
        $result = User::findOrFail($id);

        return view('dashboards.users.edit', [
            'result' => $result,
            'packages' => $packages
        ]);
    }

    public function editPassword($id)
    {
        $result = User::findOrFail($id);

        return view('dashboards.users.edit-password', [
            'result' => $result
        ]);
    }

    public function list()
    {
        $results = User::all();

        return view('dashboards.users.index', [
            'results' => $results
        ]);
    }

    public function show($id)
    {
        $result = User::findOrFail($id);

        return view('dashboards.users.show', [
            'result' => $result
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:1',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|string|min:7|unique:users,phone_number',
            'password' => 'required|confirmed|min:6',
            'package_id' => 'required|exists:packages,id',
        ]);

        $model = new User();
        $model->fill($validated);

        if ($model->saveOrFail())
            return $this->sendSuccess(200, 'Berhasil menyimpan data.', null);

        return $this->sendError(500, 'Gagal menyimpan data.');
    }

    public function confirmPayment($id)
    {
        $model = User::findOrFail($id);
        $model->fill([
            'payment_at' => date('Y-m-d H:i:s'),
        ]);

        if ($model->saveOrFail())
            return $this->sendSuccess(200, 'Berhasil merubah data.', null);

        return $this->sendError(500, 'Gagal merubah data.');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:1',
            'email' => 'required|email',
            'phone_number' => 'required|string|min:7',
            'package_id' => 'required|exists:packages,id',
        ]);

        if (array_key_exists('package_id', $validated) && !empty($validated['package_id']))
            $validated['payment_at'] = null;

        $model = User::findOrFail($id);
        $model->fill($validated);

        if ($model->saveOrFail())
            return $this->sendSuccess(200, 'Berhasil merubah data.', null);

        return $this->sendError(500, 'Gagal merubah data.');
    }

    public function updatePassword(Request $request, $id)
    {
        $validated = $request->validate([
            'old_password' => 'required|string|min:6',
            'password' => 'required|confirmed|min:6|different:old_password',
        ]);

        $model = User::findOrFail($id);

        if (!Hash::check($validated['old_password'], $model->password))
            return $this->sendError(422, 'Password lama tidak sesuai.');

        $model->fill($validated);

        if ($model->saveOrFail())
            return $this->sendSuccess(200, 'Berhasil merubah data.', null);

        return $this->sendError(500, 'Gagal merubah data.');
    }

    public function destroy($id)
    {
        if (User::destroy($id))
            return $this->sendSuccess(200, 'Berhasil menghapus data.', null);

        return $this->sendError(500, 'Gagal menghapus data.');
    }
}
