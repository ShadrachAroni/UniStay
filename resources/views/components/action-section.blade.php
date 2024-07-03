<div {{ $attributes->merge(['class' => 'md:grid md:grid-cols-3 md:gap-6']) }}>
    <x-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-section-title>

    <div class="card mb-4">
        <div class="card rounded">
           <div class="card-body">
            {{ $content }}
            </div>
        </div>
    </div>
</div>
