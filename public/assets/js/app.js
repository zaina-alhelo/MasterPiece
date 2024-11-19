import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();




function updateMessages() {
    const receiverId = document.getElementById('receiver').value;
    if (receiverId) {
        window.location.href = `?receiver_id=${receiverId}`;
    }
}
