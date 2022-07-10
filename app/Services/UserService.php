<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Log;

class UserService
{
    public $model;

    public function __construct()
    {
        $this->model = new User();
    }

    public function get($perPage = null)
    {
        if ($perPage)
            return $this->model->paginate($perPage);

        return $this->model->all();
    }

    public function getById($id)
    {
        return $this->model::find($id);
    }

    public function create(array $data)
    {
        $this->model->create($data);
    }

    public function update($id, array $data)
    {
        foreach($data as $key => $value) {
            if (empty($value)) unset($data[$key]);
        }
        $this->getById($id)->update($data);
    }

    public function delete($id)
    {
        $this->getById($id)->delete();
    }

    public function getUserDownline($user, &$downline)
    {
        $key = sprintf('%s <%s>', $user->name, $user->email);
        array_push($downline, $key);

        if ($child = $this->getDownline($user)) {
            $this->getUserDownline($child, $downline);
        }
    }

    private function getDownline($user)
    {
        return User::where('upline', $user->id)->first();
    }
}
