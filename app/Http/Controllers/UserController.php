<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public $service;

    public function __construct()
    {
        $this->service = new UserService();
    }

    public function index()
    {
        $users = $this->service->get(10);

        return view('user.index', compact('users'));
    }

    public function store(StoreUserRequest $request)
    {
        try {
            $this->service->create($request->all());
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            showMessage('Error adding user', 'error');

            return redirect()->back();
        }

        showMessage('User added');
        return redirect('users');
    }

    public function edit($id)
    {
        $user = $this->service->getById($id);
        $users = ['Select upline' => null];

        foreach ($this->service->get() as $row) {
            // Skip to prevent user from adding ones own upline
            if ($id == $row->id) continue;

            $key = sprintf('%s <%s>', $row->name, $row->email);
            $users[$key] = $row->id;
        }

        return view('user.edit', compact('user', 'users'));
    }

    public function update(Request $request, $id)
    {
        try {
            $this->service->update($id, $request->all());
        } catch(\Exception $e) {
            Log::error($e->getMessage());

            showMessage('Error updating user', 'error');

            return redirect()->back();
        }

        showMessage('User updated');
        return redirect('users');
    }

    public function tree($id)
    {
        $user = $this->service->getById($id);

        $downline = [];
        $this->service->getUserDownline($user, $downline);

        return view('user.tree', compact('downline'));
    }

    public function delete($id)
    {
        try {
            $this->service->delete($id);
        } catch(\Exception $e) {
            Log::error($e->getMessage());

            showMessage('Error deleting user', 'error');

            return redirect()->back();
        }

        showMessage('User deleted');
        return redirect('users');
    }
}
