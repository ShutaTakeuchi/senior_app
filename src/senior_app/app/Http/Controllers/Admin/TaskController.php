<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Admin;

class TaskController extends Controller
{
    public function delivery_show()
    {
        $me = Auth::user();
        if ($me->id === 1){
            return view('admin/home');
        }

        $deliveries = Admin::find(Auth::user()['id'])->deliveries;
        $data = [
            'deliveries' => $deliveries
        ];

        return view('Admin.task.index', $data);
    }
}
