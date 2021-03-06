<?php

namespace App\Http\Livewire;
use App\Models\Order;
use App\Models\User;

use Livewire\Component;

class AdminOrderEditLivewire extends Component
{

    public $order_id,$status,$order_note, $financial_status;

    function mount ($order_id){
        $this->order = $order_id;
        $order = Order::find($this->order_id);
        $this->status = $order->status;
        $this->order_note = $order->order_note;
        $this->financial_status = $order->financial_status;

    }

    function save(){
        $order = Order::find($this->order_id);
        $order->status = $this->status;
        $order->order_note = $this->order_note;
        $order->financial_status = $this->financial_status;
        $order->save();

        return redirect(route('admin.order'));
    }

    public function render(){
        $user = User::all();
        return view('livewire.admin-order-edit-livewire',['user'=>$user]);
    }
}
