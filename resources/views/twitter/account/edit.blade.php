<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Twitter Profile
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div class="mt-10 sm:mt-0">
    <form action="{{url('/account/save/'.$accesskey->id)}}" method="post">
        @csrf
        <x-form-section submit="">
            <x-slot name="title">
                Access Key
            </x-slot>

            <x-slot name="description">
                Ensure your account is using a long, random password to stay secure
            </x-slot>
            <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                    <x-label for="account_name" value="account_name" />
                    <x-input  name="account_name" value="{{$accesskey->account_name}}" type="text" class="mt-1 block w-full"/>
                    <x-input-error for="current_password" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="consumer_key" value="consumer_key" />
                    <x-input  name="consumer_key" value="{{$accesskey->consumer_key}}" type="password" class="mt-1 block w-full"/>
                    <x-input-error for="consumer_key" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-label for="consumer_secret" value="consumer_secret"/>
                    <x-input  name="consumer_secret"  value="{{$accesskey->consumer_secret}}" type="password" class="mt-1 block w-full"/>
                    <x-input-error for="consumer_secret" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-label for="access_token"  value="access_token"/>
                    <x-input name="access_token" value="{{$accesskey->access_token}}" type="password" class="mt-1 block w-full" />
                    <x-input-error for="access_token" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="access_token_secret"  value="access_token_secret"/>
                    <x-input name="access_token_secret" value="{{$accesskey->access_token_secret}}" type="password" class="mt-1 block w-full" />
                    <x-input-error for="access_token_secret" class="mt-2" />
                </div>
            </x-slot>
            <x-slot name="actions" type="submit" value="save">
                <x-button>
                    Save
                </x-button>
            </x-slot>
        </x-form-section>
    </form>
                </div>
        </div>
    </div>
</x-app-layout>
