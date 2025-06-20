        document.addEventListener('DOMContentLoaded', function() {
            const sections = ['dashboard', 'banner', 'promo', 'message'];
            const links = sections.map(s => document.getElementById(`link-${s}`));
            const sectionsEls = sections.map(s => document.getElementById(s));

            links.forEach((link, i) => {
                link.addEventListener('click', () => {
                    // Hilangkan kelas active di semua link sidebar
                    links.forEach(l => l.classList.remove('active'));
                    // Tambahkan active di link yang diklik
                    link.classList.add('active');
                    // Tampilkan section sesuai yang dipilih, sembunyikan lainnya
                    sectionsEls.forEach((sec, idx) => {
                        if (idx === i) {
                            sec.classList.remove('d-none');
                        } else {
                            sec.classList.add('d-none');
                        }
                    });
                });
            });
        });

        // READ PESAN //
        document.addEventListener("DOMContentLoaded", function () {
    const messageTab = document.getElementById("link-message");

    messageTab.addEventListener("click", function () {
        fetch("/dashboard/messages/mark-read", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                "Content-Type": "application/json"
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === "success") {
                const badge = document.querySelector(".badge-message");
                if (badge) badge.remove();
            }
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const linkMessage = document.getElementById("link-message");
    const badgeMessage = document.querySelector(".badge-message");

    if (linkMessage) {
        linkMessage.addEventListener("click", function () {
            // Tampilkan tab message
            document.querySelectorAll(".card-section").forEach(s => s.classList.add("d-none"));
            document.getElementById("message").classList.remove("d-none");

            // Hilangkan badge
            if (badgeMessage) badgeMessage.remove();

            // Tandai pesan sebagai dibaca
            fetch("/dashboard/messages/mark-read", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({})
            });
        });
    }
});
