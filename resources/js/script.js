function updateClock() {
    const now = new Date();
    const time = now.toLocaleTimeString('fr-FR', { hour12: false });
    document.getElementById('time').textContent = time;
}

// Mettre à jour toutes les secondes
setInterval(updateClock, 1000);
updateClock(); // premier appel