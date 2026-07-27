@php($size = $size ?? 32)

<span class="brand-logo d-inline-flex align-items-center">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="{{ $size }}" height="{{ $size }}"
        class="brand-logo__mark me-2" aria-hidden="true">
        <path fill="currentColor"
            d="M12 2C7 2 3 6.5 3 11.5 3 16 6.5 20 12 22c5.5-2 9-6 9-10.5C21 6.5 17 2 12 2Z" opacity="0.16" />
        <path fill="currentColor"
            d="M12 3.3C13.9 6 15.3 9 15.3 11.8c0 3-1.4 5.7-3.3 7.9-1.9-2.2-3.3-4.9-3.3-7.9 0-2.8 1.4-5.8 3.3-8.5Z" />
    </svg>
    <span class="brand-logo__text">{{ config('salon.name') }}</span>
</span>
