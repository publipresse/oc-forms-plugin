var onloadCallback = function() {
    var recaptchas = document.querySelectorAll('.g-recaptcha');

    recaptchas.forEach(function(el) {
        if(el.dataset.size == 'invisible') {
            const form = el.closest('form');
            const alias = form.dataset.request.split('::')[0];
            const widgetId = grecaptcha.render(el, {
                callback: function(token) {
                    oc.request(form, (alias+'::onFormSubmit'), {
                        complete: function(data) {
                            grecaptcha.reset(widgetId);
                        }
                    });
                }
            });
            submitReCaptcha(form, widgetId);
        } else {
            grecaptcha.render(el);
        }
    });
}

function submitReCaptcha(form, widgetId) {
    const submit = form.querySelector('[type="submit"]');
    if(submit) {
        submit.addEventListener('click', function(e) {
            e.preventDefault();
            grecaptcha.execute(widgetId);
        });
    }
}