<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserSalesController extends Controller
{
    public function index($id)
    {
        $this->data['user']         = User::findOrFail($id);
        $this->data['menu_active']  = 'sales';
        return view('users.sales.sales', $this->data);
    }
}
