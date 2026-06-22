<!DOCTYPE html>
<html>
<head>
    <title>Pay with PayPal</title>

    <script src="https://www.paypal.com/sdk/js?client-id=Ae5I6C5Xpag16zaTVTL2CYU_5y2WIIROOwCqx3remkQzEu3nZpBHCO4pFjVIAlF_xzT3sZ3a2Ml5k9xd&currency=USD"></script>
</head>
<body>

<h2>Pay with PayPal</h2>

<div id="paypal-button-container"></div>

<script>

paypal.Buttons({

    createOrder: function(data, actions) {
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: '0.01'
                }
            }]
        });
    },

    onApprove: function(data, actions) {
        return actions.order.capture().then(function(details) {

            alert('Payment completed by ' + details.payer.name.given_name);

            window.location.href = "success.php";

        });
    },

    onError: function(err) {

        console.log(err);

        alert("PayPal Error");

    }

}).render('#paypal-button-container');

</script>

</body>
</html>
