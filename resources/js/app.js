import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.querySelectorAll('.status-form select').forEach(select => {
    select.addEventListener('change', function() {
        this.form.submit(); // Отправляет форму, в которой находится select
    });
});