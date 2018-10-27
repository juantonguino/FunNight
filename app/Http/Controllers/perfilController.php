<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Image as Image;
use Illuminate\Support\Facades\DB;

use Intervention\Image\ImageManager;

use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Support\Facades\Auth;

class perfilController extends Controller
{

    public function inicio(){

        return view('/HomePerfil');
    }
   
    public function updateProfile(Request $request){
        $rules = ['image' => 'required|image|max:1024*1024*1',];
        $messages = [
            'image.required' => 'La imagen es requerida',
            'image.image' => 'Formato no permitido',
            'image.max' => 'El máximo permitido es 1 MB',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if ($validator->fails()){
            return redirect('/home')->withErrors($validator);
        }
        else{
            $name = str_random(30) . '-' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('/storage'), $name);
            //$request->file('image')->move(public_path('/storage'));
            $user = new User;
            $user->where('email', '=', Auth::user()->email)
                 ->update(['foto' => 'storage/'.$name]); 
            return redirect('/home');
        }
    }


     public function confirmRegister($email, $confirm_token){
          $user = new User;
          $the_user = $user->select()->where('email', '=', $email)
            ->where('confirm_token', '=', $confirm_token)->get();
          
          if (count($the_user) > 0){
           $active = 1;
           $confirm_token = str_random(100);
           $user->where('email', '=', $email)
           ->update(['active' => $active, 'confirm_token' => $confirm_token]);
           return redirect('/welcome')
           ->with('message', 'Enhorabuena ' . $the_user[0]['name'] . ' ya puede iniciar sesión');
          }
          else
          {
           return redirect('');
          }
         }
}
