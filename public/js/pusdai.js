/* =====================================================
   PRAYER TIMES
===================================================== */

document.addEventListener("DOMContentLoaded", function () {
  const currentTimeElement = document.getElementById("current-time");
  const nextPrayerElement = document.getElementById("next-prayer");
  const prayerItems = document.querySelectorAll(".prayer-item");

  if (!currentTimeElement) {
    return;
  }

  const prayers = [
    { name: "Imsak", time: "04:30" },
    { name: "Subuh", time: "04:40" },
    { name: "Dzuhur", time: "11:55" },
    { name: "Ashar", time: "15:17" },
    { name: "Maghrib", time: "17:48" },
    { name: "Isya", time: "19:02" },
  ];

  function updatePrayerTime() {
    const now = new Date();

    const hours = String(now.getHours()).padStart(2, "0");
    const minutes = String(now.getMinutes()).padStart(2, "0");
    const seconds = String(now.getSeconds()).padStart(2, "0");

    const currentTime = `${hours}:${minutes}`;

    currentTimeElement.textContent = `${hours}:${minutes}:${seconds}`;

    let nextPrayer = prayers.find(function (prayer) {
      return prayer.time > currentTime;
    });

    if (!nextPrayer) {
      nextPrayer = prayers[0];
    }

    nextPrayerElement.textContent = `Menuju ${nextPrayer.name} - ${nextPrayer.time}`;

    prayerItems.forEach(function (item) {
      item.classList.remove("active");

      if (item.dataset.time === nextPrayer.time) {
        item.classList.add("active");
      }
    });
  }

  updatePrayerTime();

  setInterval(updatePrayerTime, 1000);
});


/* =====================================================
   LUCIDE ICONS
   Mengganti seluruh <i data-lucide="..."> menjadi SVG.
   Sebelumnya skrip Lucide dimuat tetapi createIcons() tidak
   pernah dipanggil, sehingga semua ikon di situs kosong.
===================================================== */

document.addEventListener("DOMContentLoaded", function () {
  if (window.lucide && typeof window.lucide.createIcons === "function") {
    window.lucide.createIcons();
  }
});


// Accessible mobile navigation toggle
document.addEventListener("DOMContentLoaded", function () {
  const button = document.getElementById("mobile-menu-button");
  const menu = document.getElementById("mobile-menu");
  if (!button || !menu) return;

  function setMenuOpen(isOpen) {
    button.setAttribute("aria-expanded", String(isOpen));
    button.setAttribute("aria-label", isOpen ? "Tutup menu" : "Buka menu");
    menu.classList.toggle("open", isOpen);
  }

  button.addEventListener("click", function () {
    setMenuOpen(button.getAttribute("aria-expanded") !== "true");
  });

  menu.querySelectorAll("a").forEach(function (link) {
    link.addEventListener("click", function () {
      setMenuOpen(false);
    });
  });

  document.addEventListener("keydown", function (event) {
    if (event.key === "Escape") setMenuOpen(false);
  });
});
