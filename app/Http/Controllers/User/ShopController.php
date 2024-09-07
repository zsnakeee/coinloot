<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Payment;
use App\Models\Withdrawal;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $payments = Payment::where('is_active', true)->get();
        $this->reAssignPaymentsClass($payments);
        return view('user.shop', compact('payments'));
    }

    public function view($id)
    {
        $payment = Payment::find($id);
        return view('user.shop-view', compact('payment'));
    }

    public function checkout($id, Request $request)
    {
        $this->validate($request, [
            'amount' => 'required|numeric',
            'address' => 'required',
        ]);

        $payment = Payment::find($id);

        if ($request->amount > auth()->user()->current_points)
            return redirect()->route('user.shop.view', ['id' => $id])->with('error', 'You don\'t have enough points');

        auth()->user()->current_points -= $request->amount;
        auth()->user()->save();

        Withdrawal::create([
            'user_id' => auth()->user()->id,
            'method' => $payment->name,
            'points' => $request->amount,
            'payment_way' => $request->address,
            'ip' => ip(),
        ]);

        Notification::create([
            'user_id' => auth()->user()->id,
            'title' => 'Withdrawal request sent successfully',
            'message' => "Your withdrawal request of {$request->amount} points is pending",
        ]);

        return redirect()->route('user.shop.view', ['id' => $id])->with('success', 'Your payment has been requested');
    }

    protected function reAssignPaymentsClass($payments)
    {
        $classes = [
            'PayPal' => 'is-paypal',
            'Payeer' => 'is-payeer',
            'Vodafone' => 'is-vodafone-cash',
            'PUBG' => 'is-pubg-cash',
            'FreeFire' => 'is-freefire-cash',
        ];

        $icons = [
            'PayPal' => 'fa-brands fa-paypal',
            'Payeer' => 'fa-solid fa-money-check',
            'Vodafone' => 'fa-solid fa-wallet',
            'PUBG' => 'fa-solid fa-person-rifle',
            'FreeFire' => 'fa-solid fa-gun',
        ];

        foreach ($payments as $payment) {
            $payment->class = $classes[array_rand($classes)];
            $payment->icon = 'fa-solid fa-wallet';

            foreach ($classes as $key => $class) {
                if (\Str::contains($payment->name, $key)) {
                    $payment->class = $class;
                    $payment->icon = $icons[$key];
                }
            }
        }
    }
}
