<div>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xxl text-gray-800 leading-tight">
                {{ __('Orders') }}
            </h2>

        </div>
    </x-slot>
    <center>

        <table class="border-double border border-slate-400 mx-auto mt-10 w-8/12">
        <thead>
            <tr>
            <th class="border bg-blue-400 border-slate-500">S.N.</th>
            <th class="border bg-blue-400 border-slate-500">Customer Name</th>
            <th class="border bg-blue-400 border-slate-500">Subtotal</th>
            <th class="border bg-blue-400  border-slate-500">Tax</th>
            <th class="border bg-blue-400  border-slate-500">Discount</th>
            <th class="border bg-blue-400  border-slate-500">Total</th>
            <th class="border bg-blue-400  border-slate-500">Status</th>





            </tr>
        </thead>
        <tbody class=" text-center">
             @foreach ($all_orders as $order)
                <tr>
                    <td class="border border-slate-300">{{$order->id}}</td>
                    <td class="border border-slate-300">{{\App\Models\User::find($order->user_id)->name}}</td>
                    <td class="border border-slate-300">{{$order->subtotal}}</td>
                    <td class="border border-slate-300">{{$order->tax}}</td>
                    <td class="border border-slate-300">{{$order->discount}}</td>
                    <td class="border border-slate-300">{{$order->total}}</td>
                    <td class="border border-slate-300">{{$order->status}}</td>
                </tr>
                @foreach ($order->line_item()->get() as $line_item)
                <tr>
                    <td class="border border-slate-300"></td>
                    <td class="border border-slate-300 text-right">{{\App\Models\Product::find($line_item->product_id)->name}}</td>
                    <td class="border border-slate-300">{{$line_item->total}}</td>
                </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>

</div>
