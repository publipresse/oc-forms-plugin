var captchas = [];

var onloadCallback = function() {
    var recaptchas = document.querySelectorAll('.g-recaptcha');
    recaptchas.forEach(function(recaptcha) {
        captchas[recaptcha.id] = grecaptcha.render(recaptcha, recaptcha.dataset);
    });
}

function resetReCaptcha(id) {
    var widget = captchas[id];
    grecaptcha.reset(widget);
}