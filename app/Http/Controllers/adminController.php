<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Role;
use App\Models\Permission;

class adminController extends Controller
{
    public function getAllItems() {
        $items = Item::all();
        return view('admin.item', compact('items'));
    }

    public function blacklistUser($user_id) {
        $user = User::find($user_id);
        $user->isActive = false;
        $user->save();

        return redirect('user')->with('success', 'User blacklisted successfully');
    }

    public function reactivateUser($user_id) {
        $user = User::find($user_id);
        $user->isActive = true;
        $user->save();

        return redirect('user')->with('success', 'User reactivated successfully');
    }

    public function deleteUser($user_id) {

        $user = User::find($user_id);

        // $user->delete();

        return redirect('user')->with('alert', 'User deleted successfully 😉 (uncomment real delete in adminController)');
    }

    public function runCommand() {
        $deleteUser = Permission::find('1');
        $user = User::find('1');
        $admin = Role::find('2');


        $user->addRole($admin);

        dd('yeay');
    }
}
