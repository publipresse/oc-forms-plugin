var onloadCallback = function() {
    var recaptchas = document.querySelectorAll('.g-recaptcha');

    recaptchas.forEach(function(el) {
        if(el.dataset.size == 'invisible') {
            const form = el.closest('form');
            const alias = form.dataset.request.split('::')[0];
            grecaptcha.render(el, { 
                callback: function(token) { 
                    oc.request(form, (alias+'::onFormSubmit'), {
                        complete: function(data) {
                            resetReCaptcha(form);
                        }
                    });
                } 
            });
            submitReCaptcha(form);
        } else {
            grecaptcha.render(el);
        }
    });
}

function resetReCaptcha(form) {
    var el = form.querySelector('.g-recaptcha');
    grecaptcha.reset(el);
}

function submitReCaptcha(form) {
    const submit = form.querySelector('[type="submit"]');
    const el = form.querySelector('.g-recaptcha');
    if(submit) {
        submit.addEventListener('click', function(e) {
            e.preventDefault();
            grecaptcha.execute(el);
        });
    }
}