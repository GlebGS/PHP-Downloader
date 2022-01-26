<?php

namespace App\Http\Controllers;

use App\Http\Services\ServiceController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function addUser(Request $request){
        $this->validate($request, [
            'name' => ['required', 'string', 'min:3', 'max:20'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:4', 'max:25']
        ]);

        $data = [
            'username' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ];

        User::add('users', $data);

        return redirect()->route('login')
            ->with('success', 'Регистрация прошла успешно.');
    }

    public function logUser(Request $request){

        $this->validate($request, [
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'max:25']
        ]);

        $data = $request->only(['email', 'password']);
        $user = User::findUser('users', $data);

        if ($user){
            $id = User::findUser('users', $data)->id;

            if (Auth::attempt($data)) {
                return redirect()->intended("/user/id=$id");
            }
        }

        return redirect()->route('login')
            ->with('error', 'Не верно введён Email или Пароль.');
    }

    public function edit(Request $request){

        $path = $request->file('file')->store('upload', 'public');
        $id = $request->id;

        if ($path){
            User::edit('users', $id, ['img' => '/storage/' . $path]);
        }

        $data = [
            'username' => $request->name,
            'email' => $request->email,
        ];

        User::edit('users', $id, $data);

        return back()
            ->with('success', 'Профиль был успешно изменён.');
    }

    public function delete(Request $request){
        User::deleteUser('users', $request->id);
        return back()
            ->with('success', 'Успешное удаление');
    }

    public function deleteFile(Request $request){
        User::deleteFile('files', $request->id);
        return back()
            ->with('success', 'Файл успешно удалён');
    }
}
