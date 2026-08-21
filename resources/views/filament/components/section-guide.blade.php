<style>
    .sg-box {
        display: flex;
        gap: 0.9rem;
        align-items: flex-start;
        background: rgba(22, 163, 74, .08);
        border: 1px solid rgba(22, 163, 74, .25);
        border-radius: 0.9rem;
        padding: 1rem 1.25rem;
    }

    .sg-icon {
        width: 1.4rem;
        height: 1.4rem;
        flex-shrink: 0;
        color: #16a34a;
        margin-top: 2px;
    }

    .sg-title {
        margin: 0 0 .25rem;
        font-size: 0.85rem;
        font-weight: 700;
        color: #15803d;
    }

    .sg-desc {
        margin: 0;
        font-size: 0.8rem;
        line-height: 1.55;
        color: #4b5563;
    }

    .dark .sg-box {
        background: rgba(34, 197, 94, .09);
        border-color: rgba(74, 222, 128, .25);
    }

    .dark .sg-icon,
    .dark .sg-title {
        color: #4ade80;
    }

    .dark .sg-desc {
        color: #d1d5db;
    }
</style>

<div class="sg-box">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="sg-icon">
        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
    </svg>
    <div>
        <p class="sg-title">{{ $title }}</p>
        <p class="sg-desc">{{ $description }}</p>
    </div>
</div>
