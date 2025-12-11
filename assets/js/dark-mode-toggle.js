(function () {
    const STORAGE_KEY = 'dm-dark-mode';
    const body = document.body;

    function applyMode(isDark) {
        if (isDark) {
            body.classList.add('dm-dark-mode');
        } else {
            body.classList.remove('dm-dark-mode');
        }

    const btn = document.getElementById('dm-toggle');
        if (btn) {
            btn.classList.toggle('dm-is-dark', isDark);
        }
    }

function getInitialPreference() {
    let saved = null;

    try {
        saved = window.localStorage.getItem('STORAGE_KEY');
    } catch (e) {
        saved = null;
    }
    if (saved == 'dark') return true;
    if (saved == 'light') return false;

if (window.matchMedia && window.matchMedia ('(prefers-color-scheme: dark)').matches) {
    return true;
}
return false;
}

document.addEventListener('DOMContentLoaded', function () {
    const isDark = getInitialPreference();
    applyMode(isDark);

    const btn = document.getElementById('dm-toggle');
        if (!btn) {
            return;
        }

    btn.addEventListener('click', function () {
        const nowDark = !body.classList.contains('dm-dark-mode');
        applyMode(nowDark);

        try {
            window.localStorage.setItem(STORAGE_KEY, nowDark ? 'dark' : 'light');
        } catch (e) {
        //ignore
        }
    });
});
})();