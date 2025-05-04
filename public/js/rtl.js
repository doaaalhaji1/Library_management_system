// rtl.js
document.addEventListener('DOMContentLoaded', (event) => {
    if (document.documentElement.lang === 'ar') {
        document.querySelectorAll('pre[class*="language-"]').forEach((element) => {
            element.style.direction = 'rtl';
            element.style.textAlign = 'right';
        });
    }
});
