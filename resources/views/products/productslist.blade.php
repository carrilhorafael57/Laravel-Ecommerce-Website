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
                    <div class="grid grid-cols-4 gap-4">
                        @foreach ($products as $product)
                        <div class="font-bold w-60">
                            <div class="grid-item border-2">
                                <div>
                                    <img alt="person capturing an image" src="{{$product->product_image}}" class="focus:outline-none w-full h-60" />
                                </div>
                                <div class="bg-white dark:bg-gray-800">
                                    <div class="flex items-center justify-between px-4 pt-4">
                                        <div>
                                            <img class="dark:bg-white focus:outline-none" src="https://tuk-cdn.s3.amazonaws.com/can-uploader/4-by-2-col-grid-svg1.svg" alt="bookmark" />
                                        </div>
                                    </div>
                                    <div class="p-4">
                                        <div class="flex items-center">
                                            <h2 class="focus:outline-none text-lg dark:text-white font-semibold">{{$product->product_name}} XS</h2>
                                        </div>
                                        <p class="focus:outline-none text-xs text-gray-600 dark:text-gray-200 mt-2">{{$product->product_desc}}</p>
    
                                        <div class="flex items-center justify-between py-4">
                                            <h2 class="focus:outline-none text-indigo-700 text-xs font-semibold">Amount Available: {{$product->quantity_in_stock}}</h2>
                                            <h3 class="focus:outline-none text-indigo-700 text-xl font-semibold">${{$product->price}}</h3>
                                        </div>
                                    </div>
                                    <a href="{{ route('products.show', compact('product')) }}">
                                        <div class="flex items-center text-white bg-gray-800 justify-center h-screen border-2 text-bold mx-auto mb-4 w-25 h-10 text-center">
                                            <h3 class="">BUY NOW</h3>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div> 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>