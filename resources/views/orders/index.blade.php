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
								<td>訂單建立日期</td>
							</tr>
						@foreach ($orders as $order)
							<tr>
								<td><a href="#">{{ $order->id }}</a></td>
								<td><a href="#">{{ $order->created_at }}</a></td>
							</tr>
						@endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
