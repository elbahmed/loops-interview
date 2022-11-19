<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function registerView()
    {
        $packages = Package::all();

        return view('auths.register', [
            'packages' => $packages
        ]);
    }

    public function loginView()
    {
        return view('auths.login');
    }

    public function register(Request $request)
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

    public function login(Request $request)
    {
        if ($request->has(['email', 'password'])) {

			if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
                return $this->sendSuccess(200, 'Login berhasil.', null, '/');

            return $this->sendError(400, 'Email/password anda salah.');
		}

        return $this->sendError(400, 'Invalid Authentication.');
    }

    public function logout(Request $request)
    {
		Auth::logout();
 		$request->session()->invalidate();
		$request->session()->regenerateToken();

		return redirect('/');
    }
}
