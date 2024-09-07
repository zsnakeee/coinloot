<?php

namespace App\Http\Livewire;

use App\Models\Payment;
use Livewire\Component;
use Livewire\WithFileUploads;

class Payments extends Component
{
    use WithFileUploads;

    public Payment $current_payment;
    public $name;
    public $currency;
    public $photo;
    public $is_active;
    public $is_edit = false;

    public function render()
    {
        return view('livewire.payments', [
            'payments' => Payment::all(),
        ]);
    }

    public function onAddModal()
    {
        $this->reset(['name', 'currency', 'photo', 'is_active']);
        $this->is_edit = false;
    }

    public function view($id)
    {
        $this->is_edit = true;
        $this->current_payment = Payment::find($id);
        $this->name = $this->current_payment->name;
        $this->currency = $this->current_payment->currency;
        $this->is_active = $this->current_payment->is_active;
    }

    public function submit()
    {
        $this->is_edit ? $this->update() : $this->save();
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'currency' => 'required',
            'photo' => 'required|image|max:12048',
        ]);

        Payment::create([
            'name' => $this->name,
            'currency' => $this->currency,
            'photo_path' => $this->photo->store('payments', 'public'),
            'is_active' => true,
        ]);

        $this->reset(['name', 'currency', 'photo', 'is_active']);
        session()->flash('success', 'Payment added successfully.');
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'currency' => 'required',
            'photo' => 'nullable|image|max:12048',
            'is_active' => 'required',
        ]);

        $this->current_payment->name = $this->name;
        $this->current_payment->currency = $this->currency;
        $this->current_payment->is_active = $this->is_active;
        ($this->photo) && $this->photo->store('payments', 'public');
        $this->current_payment->save();

        session()->flash('success', 'Payment updated successfully.');
    }


    public function delete($id)
    {
        Payment::find($id)->delete();
        session()->flash('success', 'Payment deleted successfully.');
    }

    public function changeStatus()
    {
        $this->current_payment->is_active = !$this->current_payment->is_active;
        return redirect()->route('admin.payments');
    }
}
