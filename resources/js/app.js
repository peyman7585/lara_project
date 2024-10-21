import './bootstrap';
import './style';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import.meta.glob([
    '../img/**',
    '../fonts/**',
]);
