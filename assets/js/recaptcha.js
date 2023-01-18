var onloadCallback = function() {
    var recaptchas = document.querySelectorAll('.g-recaptcha');

    recaptchas.forEach(function(el) {
        if(el.dataset.size == 'invisible') {
            const form = el.closest('form');
            const submit = form.querySelector('[type="submit"]');
            grecaptcha.render(el, { 
                callback: function(token) { 
                    oc.request(form, 'onFormSubmit', {
                        error: function(data) {
                            resetReCaptcha(form);
                        }
                    });
                } 
            });
            submit.addEventListener('click', function(e) {
                e.preventDefault();
                grecaptcha.execute(el);
            });
        } else {
            grecaptcha.render(el);
        }
    });
}

function resetReCaptcha(form) {
    var el = form.querySelector('.g-recaptcha');
    grecaptcha.reset(el);
}