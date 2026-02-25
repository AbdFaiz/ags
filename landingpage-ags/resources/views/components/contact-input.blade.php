@props([
    'label', 
    'name', 
    'type' => 'text', 
    'placeholder' => '', 
    'required' => false
])

<div class="relative group">
    <label class="text-[8px] font-mono text-neutral-600 uppercase tracking-[0.4em] block mb-2 transition-colors group-focus-within:text-blue-500">
        {{ $label }}
    </label>
    
    @if($type === 'textarea')
        <textarea name="{{ $name }}" rows="4" {{ $required ? 'required' : '' }}
            class="w-full bg-transparent border-b border-neutral-800 py-4 text-white outline-none focus:border-blue-500 transition-colors placeholder:text-neutral-900 uppercase text-xs tracking-[0.2em] resize-none"
            placeholder="{{ $placeholder }}"></textarea>
    @else
        <input type="{{ $type }}" name="{{ $name }}" {{ $required ? 'required' : '' }}
            class="w-full bg-transparent border-b border-neutral-800 py-4 text-white outline-none focus:border-blue-500 transition-colors placeholder:text-neutral-900 uppercase text-xs tracking-[0.2em]"
            placeholder="{{ $placeholder }}">
    @endif
</div>