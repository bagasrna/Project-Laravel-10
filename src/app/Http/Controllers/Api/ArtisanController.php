<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class ArtisanController extends Controller
{
    public function optimize(){
        Artisan::call('optimize');
        return response()
                ->json('Success Call Artisan Optimize');
    }

    public function fresh(){
        Artisan::call('migrate:fresh');
        return response()
                ->json('Success Call Artisan Migrate Fresh');
    }

    public function storage(){
        Artisan::call('storage:link');
        return response()
                ->json('Success Call Artisan Storage Link');
    }

    public function cache(){
        Artisan::call('cache:clear');
        return response()
                ->json('Success Call Artisan Cache Clear');
    }

    public function seed(){
        Artisan::call('migrate:fresh --seed');
        return response()
                ->json('Success Call Artisan Migrate Fresh Seed');
    }

    public function key(){
        Artisan::call('key:generate');
        return response()
                ->json('Success Call Artisan Key Generate');
    }

    public function user(){
        $user = User::all();
        return response()
                ->json($user);
    }

    public function userCreate(){
        User::create([
            'name' => 'Bagas Raditya Nafi',
            'email' => 'bagas' . time() . '@gmail.com',
            'password' => bcrypt('password')
        ]);
        return response()
                ->json('Success Create User');
    }
}
