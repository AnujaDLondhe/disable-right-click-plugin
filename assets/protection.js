document.addEventListener('DOMContentLoaded', function () {
    // Disable right click
    document.addEventListener('contextmenu', function (e) {
        alert(cg_alert.right_click);
        e.preventDefault();
    });

    // Disable text selection
    document.addEventListener('selectstart', e => e.preventDefault());

    // Disable copy, cut, paste
    document.addEventListener('copy', function (e) {
        alert(cg_alert.copy);
        e.preventDefault();
    });
    document.addEventListener('cut', function (e) {
        alert(cg_alert.cut);
        e.preventDefault();
    });
    document.addEventListener('paste', function (e) {
        alert(cg_alert.paste);
        e.preventDefault();
    });

    // Disable drag
    document.addEventListener('dragstart', e => e.preventDefault());

    // Block F12 and Ctrl+Shift+I (Dev Tools)
    document.addEventListener('keydown', function (e) {
        if (e.key === 'F12' || (e.ctrlKey && e.shiftKey && e.key.toLowerCase() === 'i')) {
            alert(cg_alert.devtools);
            e.preventDefault();
        }
        if (e.ctrlKey && e.key.toLowerCase() === 'p') {
            alert(cg_alert.print);
            e.preventDefault();
        }
    });
});
