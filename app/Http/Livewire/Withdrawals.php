<?php

namespace App\Http\Livewire;

use App\Models\Notification;
use App\Models\User;
use App\Models\Withdrawal;
use Livewire\Component;
use Livewire\WithPagination;

class Withdrawals extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $transaction_search;
    public $transaction_type;
    public $withdrawal_id;
    public $note;

    public function render()
    {
        $withdrawals = Withdrawal::when($this->transaction_type, function ($query, $transaction_type) {
            return $query->where('status', $transaction_type);
        })->when($this->transaction_search, function ($query, $transaction_search) {
            $user = User::where('username', 'LIKE', "%$transaction_search%")
                ->orWhere('email', 'LIKE', "%$transaction_search%")
                ->pluck('id')
                ->toArray();;
            return $query->whereIn('user_id', $user);
        })->orderBy('created_at', 'desc')->paginate(15);

        return view('livewire.withdrawals', compact('withdrawals'));
    }

    public function model($id)
    {
        $this->withdrawal_id = $id;
    }

    public function approve()
    {
        $withdrawal = Withdrawal::find($this->withdrawal_id);

        $withdrawal->update([
            'status' => 'approved',
//            'note' => $this->note
        ]);

        Notification::create([
            'user_id' => $withdrawal->user->id,
            'title' => 'Withdrawal Approved',
            'message' => 'Your withdrawal has been sent to your account',
        ]);

        return redirect()->back()->with(['success' => 'Transaction approved successfully!']);
    }

    public function reject()
    {
        $withdrawal = Withdrawal::find($this->withdrawal_id);

        $withdrawal->update([
            'status' => 'rejected',
//            'note' => $this->note
        ]);

        Notification::create([
            'user_id' => $withdrawal->user->id,
            'title' => 'Your withdrawal has been rejected',
            'message' => 'Your withdrawal has been rejected by admin. Please contact us for more information.',
        ]);

        return redirect()->back()->with(['success' => 'Transaction rejected successfully!']);
    }

//    public function refund()
//    {
//        $withdrawal = Withdrawal::find($this->withdrawal_id);
//
//        $withdrawal->update([
//            'status' => 3,
//            'note' => $this->note
//        ]);
//
//        $withdrawal->user->current_points += $withdrawal->points;
//        $withdrawal->user->save();
//
//        Notification::create([
//            'user_id' => $withdrawal->user->id,
//            'title' => 'Your withdrawal has been refunded',
//            'message' => 'Your withdrawal has been refunded by admin. Please contact us for more information.',
//        ]);
//
//        return redirect()->back()->with(['success' => 'Transaction refunded successfully!']);
//    }
}
