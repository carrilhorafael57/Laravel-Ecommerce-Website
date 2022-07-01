<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('users_info.update', $user) }}">

            @method('PUT')

            @csrf
            
            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />
                
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$user->name}}" required autofocus />
            </div>
            
            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />
                
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{$user->email}}" required />
            </div>

            <!-- Street Name -->
            <div class="mt-4">
                <x-label for="street" :value="__('Street')" />

                <x-input id="street" class="block mt-1 w-full"
                                type="text"
                                name="street"
                                required 
                                value='{{$address_info->street}}'
                                />
            </div>

            <!-- City Name -->
            <div class="mt-4">
                <x-label for="city" :value="__('City')" />

                <x-input id="city" class="block mt-1 w-full"
                                type="text"
                                name="city"
                                required 
                                value='{{$address_info->city}}'
                                />
            </div>

            <!-- Postcode -->
            <div class="mt-4">
                <x-label for="postcode" :value="__('Postcode')" />

                <x-input id="postcode" class="block mt-1 w-full"
                                type="text"
                                name="postcode"
                                required
                                value="{{$address_info->postcode}}" 
                                />
            </div>
            
            <!-- Province Name -->
            <div class="mt-4">
                <x-label for="province" :value="__('Province')" />

                <select id="province" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                name="province"
                                required 
                                selected='{{$address_info->province}}'
                                > 
                            <option value="AB">AB</option>
                            <option value="ON">ON</option>
                            <option value="NL">NL</option>
                            <option value="PE">PE</option>
                            <option value="NS">NS</option>
                            <option value="NB">NB</option>
                            <option value="QC">QC</option>
                            <option value="MB">MB</option>
                            <option value="SK">SK</option>
                            <option value="YT">YT</option>
                            <option value="NT">NT</option>
                            <option value="NU">NU</option>
                </select>
            </div>


            <div class="flex items-center justify-center mt-4">
                <x-button class="ml-4">
                    {{ __('Save') }}
                </x-button>
            </div>
        </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
