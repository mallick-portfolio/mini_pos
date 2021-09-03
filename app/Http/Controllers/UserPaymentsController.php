<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Payment;
use App\Http\Requests\PaymentsRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class UserPaymentsController extends Controller
{
    public function index($id)
    {
        $this->data['user']         = User::findOrFail($id);
        $this->data['menu_active']  = 'payments';
        return view('users.payments.payments', $this->data);
    }

    public function store(PaymentsRequest $request, $id)
    {
        $payment              = $request->all();
        $payment['user_id']   = $id;
        $payment['admin_id']   = Auth::id();

        if (Payment::create($payment)) {
            Session::flash('message', 'Payment Successfully');
        }

        return redirect()->route('users.payments', ['id' => $id]);
    }


    public function destroy($id, $payment_id)
    {
        $userPayment    = Payment::findOrFail($payment_id);
        $user           = User::findOrFail($id);

        if ($userPayment->delete()) {
            Session::flash('message', $user->name . ' Payment Deleted Successfully');
        }

        return redirect()->route('users.payments', ['id' => $id]);
    }
}
