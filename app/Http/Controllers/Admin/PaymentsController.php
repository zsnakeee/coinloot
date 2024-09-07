<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function index()
    {
        return view('admin.payments');
    }

    public function view($id)
    {
        return view('admin.payments-view');
    }

    public function update(Request $request)
    {
        switch ($request->input('action')) {
            case 'save':
                return $this->save($request);
            case 'status':
                return $this->status($request);
        }
    }

    public function save(Request $request)
    {
        $id = $request->route('id');
        $payment = Payment::find($id);
        $payment->name = $request->input('name');
        $payment->currency = $request->input('currency');
        $payment->save();

        return redirect()->back()->with('success', 'Info has been updated');
    }

    public function status(Request $request)
    {
        $payment = Payment::find($request->route('id'));
        $payment->is_active = !$payment->is_active;
        $payment->save();

        return redirect()->back()->with('success', 'Status has been changed');
    }
}
