


// Chiudi il dropdown menu quando si fa clic fuori
window.addEventListener('click', function(event) {
    var dropdownMenu = document.getElementById('navbarNavDropdown');
    if (!event.target.matches('.navbar-toggler') && !dropdownMenu.contains(event.target)) {
        dropdownMenu.classList.remove('show');
    }
});

// Aggiungi una classe al body quando il menu viene aperto
document.addEventListener("DOMContentLoaded", function() {
    const navbarToggler = document.querySelector(".navbar-toggler");
    const navbarCollapse = document.querySelector(".navbar-collapse");
    navbarToggler.addEventListener("click", function() {
        document.body.classList.toggle("menu-open");
    });

    // Chiudi il menu quando si fa clic su un link
    const navLinks = document.querySelectorAll(".navbar-nav .nav-link");
    navLinks.forEach(function(navLink) {
        navLink.addEventListener("click", function() {
            if (navbarCollapse.classList.contains("show")) {
                navbarToggler.click();
            }
        });
    });
});

//CARD MOUSE
document.addEventListener("DOMContentLoaded", function() {
    const cards = document.querySelectorAll(".my-card");

    cards.forEach(function(card) {
        card.addEventListener("mouseenter", function() {
            card.style.transform = "translateY(-5px)"; // Sposta la card leggermente verso l'alto al passaggio del mouse
        });

        card.addEventListener("mouseleave", function() {
            card.style.transform = "translateY(0)"; // Ripristina la posizione originale al mouseleave
        });

        card.addEventListener("click", function() {
            card.style.transform = "translateY(2px)"; // Sposta la card leggermente verso il basso al click
            setTimeout(function() {
                card.style.transform = "translateY(0)"; // Ripristina la posizione originale dopo un breve ritardo
            }, 300);
        });
    });
});



