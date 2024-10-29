@extends('cliente.layout.index')
@section('principal')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <br><br><br><br><br><br>
    <h1>Pagamento Mercado Pago</h1>
    <button id="checkout-button"></button>






    <script>
        const mp = new MercadoPago("{{ config('services.mercadopago.public_key') }}", {
            locale: 'pt-BR'
        });

        mp.checkout({
            preference: {
                id: '{{ $preference->id }}'
            },
            render: {
                container: '#checkout-button',
                label: 'Pagar com Mercado Pago'
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
@stop
