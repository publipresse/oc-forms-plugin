var onloadCallback = function() {
    var recaptchas = document.querySelectorAll('.g-recaptcha');

    recaptchas.forEach(function(el) {
        if(el.dataset.size == 'invisible') {
            const form = el.closest('form');
            const submit = form.querySelector('[type="submit"]');
            const alias = form.dataset.request.split('::')[0];
            grecaptcha.render(el, { 
                callback: function(token) { 
                    oc.request(form, (alias+'::onFormSubmit'), {
                        error: function(data) {
                            resetReCaptcha(form);
                            this.success(data);
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