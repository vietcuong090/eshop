<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userList = User::all();
        // truyen parmeter ['userList' => $userList]
        return view('admin.users.index', ['userList' => $userList]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::create($request->only([
            'name', 'email', 'password'
        ]));
        $message = "Created successfull!";
        if ($user === null) {
            $message = "Creation failed!";
        };
        return redirect()->route('admin.users.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $bool = $user->update($request->only([
            'name', 'email', 'password'
        ]));
        $message = "Success updated";
        if (!$bool) {
            $message = "Update failed";
        }
        return redirect()->route('admin.users.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // user
        $message = "Success deleted"; //Xác định một biến $message với giá trị mặc định là "Success full deleted"
        if (!User::destroy($id)) { //Sử dụng phương thức User::destroy($id) để xóa một người dùng từ cơ sở dữ liệu theo $id cung cấp
            $message = "Delete faiiled";
        }
        //redirect()->route('admin.user.index') để chuyển hướng người dùng đến một route có tên là 'admin.user.index'
        return redirect()->route('admin.users.index')->with('message', $message);
    }
}
