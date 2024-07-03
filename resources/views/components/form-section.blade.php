@include('header')
@props(['submit'])

<div {{ $attributes->merge(['class' => 'md:grid md:grid-cols-3 md:gap-6']) }}>
    <x-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-section-title>

    <div class="mt-5 md:mt-0 md:col-span-2">
        <form wire:submit="{{ $submit }}">
            <div class="p-3 p-sm-4 shadow card mb-4 {{ isset($actions) ? 'rounded-top' : 'rounded' }}">
                <div class="card mb-4">
                    <div class="card rounded">
                       <div class="card-body">
                            <div class="row profile-body">
                                {{ $form }}
                            </div>
                       </div>
                    </div>
                </div>
            </div>

            @if (isset($actions))
                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 dark:bg-gray-800 text-end sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                    {{ $actions }}
                </div>
            @endif
        </form>
    </div>
</div>
