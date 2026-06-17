//
document.addEventListener("DOMContentLoaded", () => {
    const navLinks = document.querySelector(".nav-link");
    const currentPage = window.location.pathname;

    navLinks.forEach((link) => {
        const linkPath = new URL(link.href).pathname;

        if (currentPage === linkPath) {
            link.classList.add("active");
        }
    });
});
