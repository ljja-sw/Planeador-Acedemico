<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;
Use Alert;
use File;
use Hash;
use Auth;
use App\TemaPlaneador;

class ProfileController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('Docente')) {
            $clases = TemaPlaneador::whereFecha(now()->format("Y-m-d"))->get();
            return view('perfil',compact('clases'));
        }

        return view('perfil');
    }

    public function cambiarAvatar(Request $request)
    {
        $usuario = Auth::user();

        $this->validate($request, [
            'avatar' => 'required',
            'avatar.*' => 'image|mimes:jpeg,png,jpg|max:2048'
            ]);

            if ($request->hasFile('avatar')) {
                if($usuario->avatar != ""){
                    $viejo_avatar = "public/avatars/{$usuario->avatar}";
                    Storage::delete($viejo_avatar);
                }

                $img = Image::make($request
                ->file("avatar"))
                ->fit(530, 530)
                ->encode("png");

                $hash = md5($img->__toString());
                $directorio = "public/avatars/{$hash}.png";
                Storage::put($directorio, $img->__toString());

                $usuario->avatar = "{$hash}.png";
                $usuario->save();

                return redirect()->route("perfil");
            }else{
                return "No hay Imagen";
            }

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
