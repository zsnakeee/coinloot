<?php

namespace App\Http\Livewire;

use App\Models\Offerwall;
use App\Models\User;
use App\Models\Withdrawal;
use Carbon\Carbon;
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
    public $offerwall_id;

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
        return redirect()->route('admin.offerwalls');
    }

    public function update()
    {
        Offerwall::where('id', $this->offerwall_id)->update([
            'name' => $this->new_name,
            'iframe_url' => $this->new_url,
        ]);
        return redirect()->route('admin.offerwalls');
    }

    public function model($id)
    {
        $this->offerwall_id = $id;
        $offerwall = Offerwall::find($id);
        $this->name = $offerwall->name;
        $this->iframe = $offerwall->iframe_url;
    }

    public function changeStatus()
    {
        $offerwall = Offerwall::find($this->offerwall_id);
        $offerwall->is_active = !$offerwall->is_active;
        $offerwall->save();
        return redirect()->route('admin.offerwalls');
    }
}
