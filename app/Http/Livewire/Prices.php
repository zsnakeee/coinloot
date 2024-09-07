<?php

namespace App\Http\Livewire;

use App\Models\Notification;
use App\Models\Payment;
use App\Models\PaymentsPrice;
use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Livewire\WithPagination;

class Prices extends Component
{
    public $amount;
    public $points;
    public $price_id;
    public $price;

    public function mount()
    {
        $id = Route::current()->parameter('id');
        $this->price_id = $id;
    }

    public function render()
    {
        $payment = Payment::find($this->price_id);
        $prices = $payment->prices()->get();

        return view('livewire.prices', compact('payment', 'prices'));
    }

    public function model($id)
    {
        $this->price = PaymentsPrice::find($id);
        $this->amount = $this->price->amount;
        $this->points = $this->price->points;
    }

    public function save()
    {
        $this->price->amount = $this->amount;
        $this->price->points = $this->points;
        $this->price->save();

        return redirect()->back()->with('success', 'Info has been updated');
    }
}
