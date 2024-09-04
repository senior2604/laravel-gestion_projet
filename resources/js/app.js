import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import Pikaday from 'pikaday';
import 'pikaday/css/pikaday.css'; // Assurez-vous d'importer les styles

document.addEventListener('DOMContentLoaded', function() {
    var picker = new Pikaday({
        field: document.getElementById('datepicker')
    });
});
