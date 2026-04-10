<?php
header('Content-Type: application/javascript; charset=UTF-8');
?>
function fixGestorLink() {
    document.querySelectorAll('a[href]').forEach(function (a) {
        if (a.href.indexOf('gestorcontrasenas') !== -1) {
            a.href = 'yourLink';
            a.target = '_blank';
            a.rel = 'noopener noreferrer';
        }
    });
}
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', fixGestorLink);
} else {
    fixGestorLink();
}
