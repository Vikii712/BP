import './bootstrap';

window.copyToClipboard = function (text) {
    navigator.clipboard.writeText(text).catch(err => {
        console.error('Nepodarilo sa skopírovať text: ', err);
    });
};
