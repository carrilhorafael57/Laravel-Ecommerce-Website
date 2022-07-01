<x-app-layout>
    <x-slot name="header">
        <h2 class="flex items-center justify-center font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Products') }}
        </h2>
    </x-slot>

    <x-auth-card>
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form method="POST" action="{{ route('products.update', $product) }}">
            @csrf
            
            @method('PUT')
            
            <!-- Product Name -->
            <div>
                <x-label for="product_name" :value="__('Product Name')" />
                
                <x-input id="product_name" class="block mt-1 w-full" type="text" name="product_name" value="{{$product->product_name}}" required autofocus/>
            </div>
            
            <!-- Description -->
            <div class="mt-4">
                <x-label for="product_desc" :value="__('Description')" />
                
                <x-input id="product_desc" class="block mt-1 w-full" type="text" cols=50 rows=6 name="product_desc" value="{{$product->product_desc}}" required/>
            </div>
            
            <!-- Image -->
            <div class="mt-4">
                <x-label for="product_image" :value="__('Img URL')" />
                
                <x-input id="product_image" class="block mt-1 w-full"
                type="text"
                name="product_image"
                value="{{$product->product_image}}"
                 />
            </div>
            
            <!-- Quantity in Stock -->
            <div class="mt-4">
                <x-label for="quantity_in_stock" :value="__('Quantity in Stock')" />

                <x-input id="quantity_in_stock" class="block mt-1 w-full"
                                type="number"
                                name="quantity_in_stock" required 
                                value="{{$product->quantity_in_stock}}"
                                />
            </div>

            <!-- Price -->
            <div class="mt-4">
                <x-label for="price" :value="__('Price')" />

                <x-input id="price" class="block mt-1 w-full"
                                type="number"
                                name="price"
                                required 
                                step="0.01"
                                value="{{$product->price}}"
                                />
            </div>

            <div class="flex items-center justify-center mt-4">
                <x-button class="ml-4">
                    {{ __('Create New Product') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-app-layout>