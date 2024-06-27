
const paymentForm = document.querySelector("#payment-form");

function paymentFormSubmit(event){
    const ccOfile = event.target.dataset.ccOnFile;

    if (ccOfile == 'false') {
        event.preventDefault();
        const value = Stripe.setPublishableKey(event.target.dataset.stripePublishableKey);

        Stripe.createToken({
            number: document.querySelector('.card-number').value,
            cvc: document.querySelector('.card-cvc').value ,
            exp_month:  document.querySelector('.card-expiry-month').value ,
            exp_year:document.querySelector('.card-expiry-year').value
        },stripeResponseHandler);

    }


    function stripeResponseHandler(status,response) {

        if (response.error) {
            alert(response.error.message);
        } else {
            const token = response.id;
            const input = document.querySelector('#stripeToken');
            input.value = token;
            paymentForm.submit();

        }

    }

}

paymentForm.addEventListener('submit',paymentFormSubmit)
