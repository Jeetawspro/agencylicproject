// jQuery('#pay-with-nimbbl').click(function (event) {
//     event.preventDefault();
//     var data = nimbbl_wc_checkout_vars;
//     console.log(data);

//     // Options for the nimbbl checkout.
//     var options = {
//         "access_key": data.access_key, // Enter the Key ID generated from the Dashboard
//         "order_id": data.order_id,
//         // "callback_url": "http://faaeb87f9229.ngrok.io/wc-api/nimbblcallback/",
//         "callback_handler": function (response) {
//             console.log("callback_handler - ", response);

//             if (response.status === "success") {
//                 var successMsg = document.getElementById('msg-nimbbl-success');
//                 successMsg.style.display = 'block';
//                 document.getElementById('nimbbl_order_id').value = response.order_id;
//                 document.getElementById('nimbbl_transaction_id').value = response.transaction_id;
//                 document.getElementById('nimbbl_signature').value = response.signature;
//                 document.getElementById('nimbbl_status').value = response.status;
//                 document.nimbblform.submit();
//             } else {
//                 document.nimbblform.action = document.getElementById('nimbbl_cancel_url').value;
//                 document.getElementById('nimbbl_order_id').value = response.order_id;
//                 document.getElementById('nimbbl_status').value = response.status;
//                 document.getElementById('nimbbl_reason').value = response.reason;
//                 document.nimbblform.submit();
//             }
//         },
//         "custom": {
//             "key_1": "val_1",
//             "key_2": "val_2"
//         },
//     };

//     window.checkout = new NimbblCheckout(options);
//     window.checkout.open(data.order_id);

// });

jQuery(document).ready(function() {
    openModal();
});

jQuery('#pay-with-nimbbl').click(function (event) {
    event.preventDefault();
    openModal();
});

function openModal() {
    var data = nimbbl_wc_checkout_vars;
    console.log(data);

    // Options for the nimbbl checkout.
    var options = {
        "access_key": data.access_key, // Enter the Key ID generated from the Dashboard
        "order_id": data.order_id,
        // "callback_url": "http://faaeb87f9229.ngrok.io/wc-api/nimbblcallback/",
        "callback_handler": function (response) {
            console.log("callback_handler - ", response);

            if (response.status === "success") {
                var successMsg = document.getElementById('msg-nimbbl-success');
                successMsg.style.display = 'block';
                document.getElementById('nimbbl_order_id').value = response.order_id;
                document.getElementById('nimbbl_transaction_id').value = response.transaction_id;
                document.getElementById('nimbbl_signature').value = response.signature;
                document.getElementById('nimbbl_status').value = response.status;
                document.nimbblform.submit();
            } else {
                document.nimbblform.action = document.getElementById('nimbbl_cancel_url').value;
                document.getElementById('nimbbl_order_id').value = response.order_id;
                document.getElementById('nimbbl_status').value = response.status;
                document.getElementById('nimbbl_reason').value = response.reason;
                document.nimbblform.submit();
            }
        },
        "custom": {
            "key_1": "val_1",
            "key_2": "val_2"
        },
    };

    window.checkout = new NimbblCheckout(options);
    window.checkout.open(data.order_id);
}