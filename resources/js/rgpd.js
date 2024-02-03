// public/js/rgpd.js
document.addEventListener('DOMContentLoaded', function () {
    const gdprBanner = document.getElementById('gdpr-banner');
    const acceptBtn = document.getElementById('gdpr-accept');

    // Vérifier si l'utilisateur a déjà accepté les cookies
    const cookiesAccepted = localStorage.getItem('cookies_accepted');

    if (!cookiesAccepted) {
        gdprBanner.style.display = 'block';
    }

    acceptBtn.addEventListener('click', function () {
        // Masquer le bandeau RGPD
        gdprBanner.style.display = 'none';

        // Stocker l'acceptation des cookies en local storage
        localStorage.setItem('cookies_accepted', 'true');
    });
});
