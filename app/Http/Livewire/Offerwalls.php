<?php

namespace App\Http\Livewire;

use App\Models\Offerwall;
use App\Models\User;
use App\Models\Withdrawal;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Offerwalls extends Component
{
    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $photo;
    public $name;
    public $iframe;
    public $selectedOffer;

    public function render()
    {
        $offerwalls = Offerwall::paginate(20);
        return view('livewire.offerwalls', compact('offerwalls'));
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'iframe' => 'required',
            'photo' => 'required|image|max:12048',
        ]);

        Offerwall::create([
            'name' => $this->name,
            'iframe_url' => $this->iframe,
            'photo_path' => $this->photo->store('offerwalls', 'public'),
        ]);

        $this->toasts('Created successfully');
    }

    public function update()
    {
        $this->selectedOffer->name = $this->name;
        $this->selectedOffer->iframe_url = $this->iframe;
        if ($this->photo)
            $this->selectedOffer->photo_path = $this->photo->store('offerwalls', 'public');
        $this->selectedOffer->save();
        $this->toasts('Updated successfully');
    }

    public function delete($id): void
    {
        Offerwall::find($id)->delete();
        $this->toasts('Deleted successfully', 'error');
    }

    public function select($id): void
    {
        $this->selectedOffer = Offerwall::find($id);
        $this->name = $this->selectedOffer->name;
        $this->iframe = $this->selectedOffer->iframe_url;
    }

    public function changeStatus()
    {
        $this->selectedOffer->is_active = !$this->selectedOffer->is_active;
        $this->selectedOffer->save();
        return redirect()->route('admin.offerwalls');
    }

    protected function toasts($message, $type = 'success'): void
    {
        $this->dispatchBrowserEvent('toasts', ['message' => $message, 'type' => $type, 'title' => 'Offerwalls']);
    }
}
