import persist from '@alpinejs/persist';
import focus from '@alpinejs/focus';

document.addEventListener('livewire:init', () => {
    window.Alpine.plugin(persist);
    window.Alpine.plugin(focus);
});