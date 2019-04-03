<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Alert;
use Hash;

class ProfileController extends Controller
{
	public function index()
	{
		return view('perfil');
	}

	public function cambiar_contraseña(Request $request)
	{
		$data = $request->toArray();
		if (Hash::check($data['contraseña'],auth()->user()->password )) {
			if ($data['nueva'] == $data['confirmacion_nueva']) {
				$usuario = auth()->user();
				$usuario->password = Hash::make($data['nueva']);
				$usuario->save();
				Alert::success('Contraseña Cambiada', '')->showCloseButton();

			}else{
				Alert::error('Las contraseñas no coinciden', '')->showCloseButton();

			}
		}else{
			Alert::error('La contraseña actual no cincide', '')->showCloseButton();
		}
		return redirect()->route('perfil');
	}
}
