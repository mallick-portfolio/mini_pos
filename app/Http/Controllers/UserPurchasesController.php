<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserPurchasesController extends Controller
{
    public function index($id)
    {
        $this->data['user']         = User::findOrFail($id);
        $this->data['menu_active']  = 'purchases';
        return view('users.purchases.purchases', $this->data);
    }
}
