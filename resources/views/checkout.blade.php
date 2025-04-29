<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Stripe Paiement</title>
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body>

@if(session('success_message'))
    <h1 style="color: green;">{{ session('success_message') }}</h1>
@endif

<form action="{{ route('payment') }}" method="POST" id="payment-form">
    @csrf
    <div id="card-element"></div>
    <button type="submit">Payer 10€</button>
</form>

<script>
    const stripe = Stripe("{{ env('STRIPE_KEY') }}");
    const elements = stripe.elements();
    const card = elements.create('card');
    card.mount('#card-element');

    const form = document.getElementById('payment-form');
    form.addEventListener('submit', async (event) => {
        event.preventDefault();

        const {token, error} = await stripe.createToken(card);

        if (error) {
            alert(error.message);
        } else {
            const hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);
            form.submit();
        }
    });
</script>

</body>
</html>
