<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table>
							<tr>
								<td>訂單編號</td>
								<td>產品名稱</td>
								<td>明細建立日期</td>
							</tr>
						@foreach ($order_items as $order_item)
							<tr>
								<td>{{ $order_item->order_id }}</td>
								<td>{{ $order_item->product()->first()->name }}</td>
								<td>{{ $order_item->created_at }}</td>
							</tr>
						@endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
