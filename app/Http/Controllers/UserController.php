<?php

namespace App\Http\Controllers;

use Alert;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::orderByDesc('id')->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('name', function ($data) {
                    return $data->name;
                })
                ->editColumn('email', function ($data) {
                    return $data->email;
                })
                ->editColumn('role', function ($data) {
                    $role = '<span class="badge badge-primary"> ' . $data->roles->pluck('name')->first(). ' </span> ';
                    return $role;
                })
                ->editColumn('aksi', function ($data) {
                    $actionButton = '
                  <button class="btn waves-effect waves-light btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editUser" onclick="editData(&quot;' . $data->id. '&quot;)">
                         <i class="bi bi-pencil-square"></i> Detail
                    </button>
                     <button class="btn waves-effect waves-light btn-danger btn-sm" onclick="alertHapus(&quot;' . $data->id . '&quot;)">
                         <i class="bi bi-trash"></i>
                    </button>';
                    return $actionButton;
                })
                ->escapeColumns([])
                ->make(true);
        }
        return view('admin.user.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'role' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        $cr = User::create($data);
        if ($request->role) {
            $roles = DB::table('roles')->where('id', $request->role)->first();
            $cr->assignRole($roles->name);
        }

        toast('User Berhasil Di Tambah', 'success');
        return redirect()->back();
    }


    public function edit(Request $request)
    {
        $id = $request->id;
        $data = User::where('id', $id)->firstOrFail();

        if ($data->roles->isNotEmpty()) {
            $role_id = $data->roles->pluck('id')[0];
        } else {
            $role_id = '';
        }

        $arr = array(
            'id'     => $data->id,
            'name'     => $data->name,
            'email'     => $data->email,
            'role'      => $role_id,
        );
        return $arr;

    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'role' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

        $id = $request->user_id;
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        $user = User::where('id', $id)->first();
        $update = $user->update($data);

        $roles = DB::table('roles')->where('id', $request->role)->first();
        if ($user->roles->isNotEmpty()) {
            $user->removeRole($user->roles[0]->name);
            $user->assignRole($roles->name);
        } else {
            $user->assignRole($roles->name);
        }

        toast('Berhasil Di Update', 'success');
        return redirect()->back();
    }


    public function destroy(Request $request)
    {
        $id = $request->id;
        $data = User::findOrFail($id);
        if ($data) {
            if ($data->doesntHave('roles')) {
                $data->delete();
            } else {
                $data->removeRole($data->roles[0]->name);
                $data->delete();
            }
           
            return response()->json(['message' => 'User Berhasil Di Hapus'], 200);
        } else {
            return response()->json(['message' => 'Error'], 200);
        }
    }
}
