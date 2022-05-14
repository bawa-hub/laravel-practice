<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function insertUser()
    {
        $inputs = request()->all();
        $user = User::create([
            'name' => $inputs['name'],
            "email" => $inputs['email'],
            "password" => $inputs['password'],
            'active' => 1
        ]);
        if ($user) {
            $profile = new Profile();
            $profile->user_id = $user->id;
            $profile->phone = $inputs['phone'];
            $profile->address = $inputs['address'];
            $profile->profession = $inputs['profession'];
            if ($profile->save()) {
                return redirect()->to(route('onetoone'));
            }
        }
    }
}
