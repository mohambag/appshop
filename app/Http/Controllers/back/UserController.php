<?php

namespace App\Http\Controllers\back;

use App\Models\back\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mockery\Exception;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{

    public function index()
    {
        $users = User::orderBy('id', 'DESC')->paginate(20);
        return view('back.users.users', compact('users'));
    }

    public function edit(User $user)
    {
        $roles=Role::all()->pluck('name','id');
        return view('back.users.profile', compact('user','roles'));
    }

    public function update(Request $request,User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'mobile' => 'required|max:11',
            'email' => 'required',
        ]);

        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->assignRole($request->role);

        try {
            $user->syncRoles($request->roles);
            $user->save();
        } catch (Exception $exception) {
            return redirect('admin.users', $exception->getCode());
        }

        $msg = 'تغییرات با موفقیت انجام شد';
        return redirect(route('admin.users'))->with('success', $msg);
    }

    public function destroy(User $user)
    {
        $user->delete();
        $msg = 'کاربر مورد نظر با موفقیت حذف شد';
        return redirect(route('admin.users'))->with('success', $msg);
    }

    public function updatestatus(User $user)
    {
        if ($user->status == 0) {
            $user->status = 1;
        } else {
            $user->status = 0;
        }

        $user->save();
        $msg = 'تغییرات با موفقیت انجام شد';
        return redirect(route('admin.users'))->with('success', $msg);
    }



}
