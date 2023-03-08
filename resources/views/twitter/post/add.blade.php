<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Twitter Profile
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div class="mt-10 sm:mt-0">
    <form action="{{route('addTweet')}}" method="post" enctype=multipart/form-data>
        @csrf
        <x-form-section submit="">
            <x-slot name="title">
                Add Tweet
            </x-slot>
            <x-slot name="description">
                Add Tweet you want use in auto tweet
            </x-slot>
            <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                    <x-label for="tweet_text" value="tweet text" />
                    <x-input  name="tweet_text" type="text" class="mt-1 block w-full"/>
                    <x-input-error for="tweet_text" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="link" value="link" />
                    <x-input  name="link" type="text" class="mt-1 block w-full"/>
                    <x-input-error for="link" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-label for="image" value="image"/>
                    <x-input  name="image" type="file" class="mt-1 block w-full"/>
                    <x-input-error for="image" class="mt-2" />
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
