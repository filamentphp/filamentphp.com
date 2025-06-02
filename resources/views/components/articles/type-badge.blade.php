@props([
    'type',
    'size' => 'md',
])

<div
    @class([
        'flex items-center justify-center gap-2 rounded-full select-none',
        match ($size) {
            'md' => 'py-2 pr-5 pl-4',
            'sm' => 'py-2.5 pr-5 pl-4 text-xs',
        },
        'bg-amber-100/80 text-amber-700' => $type->color === 'amber',
        'bg-blue-100/80 text-blue-700' => $type->color === 'blue',
        'bg-violet-100/80 text-violet-700' => $type->color === 'violet',
    ])
>
    {{-- Type Icon --}}
    <div
        @class([
            '-my-4',
            'text-amber-500' => $type->color === 'amber',
            'text-blue-500' => $type->color === 'blue',
            'text-violet-500' => $type->color === 'violet',
        ])
    >
        {!! $type->getIcon() !!}
    </div>

    {{-- Type Name --}}
    <div>
        {{ $type->name }}
    </div>
</div>
