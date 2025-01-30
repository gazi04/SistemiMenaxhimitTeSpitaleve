import "./bootstrap";

setTimeout(function () {
    const notifier = document.getElementById("notify");
    if (notifier) {
        notifier.style.transition = "opacity 0.5s ease";
        notifier.style.opacity = "0";
        setTimeout(() => notifier.remove(), 500);
    }
}, 5000);
