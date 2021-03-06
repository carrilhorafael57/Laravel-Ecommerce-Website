<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <div class="px-10 w-48 bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow text-center align-center"> 
                        <button>
                            <a href="{{ route('products.create') }}">Add a new Product</a>
                        </button>
                    </div>
                    <br />
                    <br />
                    <table>
                        <thead>
                            <tr class="ml-5">
                                <th>Product Name</th>
                                <th class="mt-6" style="margin-left: 1.5rem">Quantity</th>
                                <th class="ml-5" style="margin-left: 1.5rem">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                   <td> {{$product->product_name}} </td>
                                   <td class="ml-5 text-center">{{ $product->quantity_in_stock }}</td>
                                   <td class="ml-5 text-center" style="margin-left: 1.5rem">{{ $product->price }}</td>
                                   <td class="text-center" style="margin-left: 1.5rem">
                                    <div class="px-10 w-100 bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow text-center"> 
                                        <button>
                                            <a href=" {{ route('products.edit', $product) }} "> Edit </a>
                                        </button>
                                    </div>
                                    <div class="w-100 bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow text-center"> 
                                        <form method="POST" action=" {{route('products.destroy', $product)}} ">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</x-app-layout>