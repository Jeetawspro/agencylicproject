<?php
/*  
* Plugin Name: Nimbbl Checkout 
* Plugin URI:  
* Description: Fast payments for your customers, fewer drop-offs for you. Let your customers pay in a fast secure manner. Get higher conversions with a faster checkout experience
* Author: Nimbbl  
* Version: 2.0.3
* Author URI: https://nimbbl.biz/
* License: GPL3+  
* Text Domain:  Payment
*/

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

require_once __DIR__ . '/nimbbl-sdk/Nimbbl.php';

use Nimbbl\Api\NimbblApi;

/*
 * This action hook registers our PHP class as a WooCommerce payment gateway
 */

add_filter('woocommerce_payment_gateways', 'nimbbl_add_gateway_class');
function nimbbl_add_gateway_class($gateways)
{
	$gateways[] = 'WC_Nimbbl_Gateway'; // your class name is here
	return $gateways;
}

/*
 * The class itself, please note that it is inside plugins_loaded action hook
 */
add_action('plugins_loaded', 'nimbbl_init_gateway_class');
function nimbbl_init_gateway_class()
{

	class WC_Nimbbl_Gateway extends WC_Payment_Gateway
	{
		/**
		 * Class constructor, more about it in Step 3
		 */
		public function __construct()
		{
			$this->id = 'nimbbl'; // payment gateway plugin ID
			$this->icon = 'https://img1.wsimg.com/isteam/ip/b7256c3a-702d-4179-90af-860c089c0852/Logos%20%286%29.png/:/rs=w:100,h:100'; // URL of the icon that will be displayed on checkout page near your gateway name
			$this->has_fields = true; // in case you need a custom credit card form
			$this->method_title = 'Nimbbl Checkout';
			$this->method_description = 'Pay with your fastest payment mode within seconds. All payment options supported.'; // will be displayed on the options page

			// gateways can support subscriptions, refunds, saved payment methods,
			// but in this tutorial we begin with simple payments
			$this->supports = array(
				'products'
			);

			// Method with all the options fields
			$this->init_form_fields();

			// Load the settings.
			$this->init_settings();
			$this->version = '1.1.1';
			$this->title = $this->get_option('title');
			$this->description = $this->get_option('description');
			$this->enabled = $this->get_option('enabled');
			$this->testmode = 'yes' === $this->get_option('testmode');
			$this->private_key = $this->testmode ? $this->get_option('test_private_key') : $this->get_option('private_key');
			$this->publishable_key = $this->testmode ? $this->get_option('test_publishable_key') : $this->get_option('publishable_key');
			$this->end_point = $this->testmode ? $this->get_option('test_end_point') : $this->get_option('end_point');
			// $this->webhook_secret = $this->testmode ? $this->get_option('test_webhook_secret') : $this->get_option('webhook_secret');

			$this->api = new NimbblApi($this->publishable_key, $this->private_key);
			$this->statuses = ['pending' => 'pending','processing' => 'success','failed' => 'failed'];

			// This action hook saves the settings
			add_action('woocommerce_update_options_payment_gateways_' . $this->id, array($this, 'process_admin_options'));

			// We need custom JavaScript to obtain a token
			add_action('woocommerce_receipt_' . $this->id, array($this, 'receipt_page'));
			add_action('woocommerce_thankyou',  array($this, 'thankyou'));

			// https://<domain>/wc-api/nimbblcallback/
			add_action('woocommerce_api_nimbblcallback', array($this, 'webhook'));
			
			// if (array_key_exists('nimbbl_status',$_POST) && sanitize_text_field($_POST['nimbbl_status']) == "failed") {
			// 	// Show the reason.
			// 	$this->add_notice(esc_attr('Reason: ' . sanitize_text_field($_POST['nimbbl_reason'])), 'error');

			// 	$orderWcId = sanitize_text_field($_POST['nimbbl_wc_order_id']);
			// 	$order = wc_get_order($orderWcId);
			// 	if ($order) {
			// 		$order->update_status('failed', __('Reason: ' . sanitize_text_field($_POST['nimbbl_reason']), false));
			// 		if (sanitize_text_field($_POST['nimbbl_order_id']))
			// 			$order->add_order_note('Nimbbl order ID: "' . sanitize_text_field($_POST['nimbbl_order_id']) . '"');
			// 		if (sanitize_text_field($_POST['nimbbl_transaction_id']))
			// 			$order->add_order_note('Nimbbl transaction ID: "' . sanitize_text_field($_POST['nimbbl_transaction_id']) . '"');
			// 		if (sanitize_text_field($_POST['nimbbl_reason']))
			// 			$order->add_order_note('Reason: "' . sanitize_text_field($_POST['nimbbl_reason']) . '"');
			// 	}
			// }
		}

		/**
		 * Plugin options, we deal with it in Step 3 too
		 */
		public function init_form_fields()
		{

			$this->form_fields = array(
				'enabled' => array(
					'title'       => 'Enable/Disable',
					'label'       => 'Enable Nimbbl Checkout',
					'type'        => 'checkbox',
					'description' => '',
					'default'     => 'no'
				),
				'title' => array(
					'title'       => 'Title',
					'type'        => 'text',
					'description' => 'This controls the title which the user sees during checkout.',
					'default'     => 'Nimbbl Checkout',
					'desc_tip'    => true,
				),
				'description' => array(
					'title'       => 'Description',
					'type'        => 'textarea',
					'description' => 'This controls the description which the user sees during checkout.',
					'default'     => 'Pay with your fastest payment mode within seconds. All payment options supported.',
				),
				'testmode' => array(
					'title'       => 'Test mode',
					'label'       => 'Enable Test Mode',
					'type'        => 'checkbox',
					'description' => 'Place the payment gateway in test mode using test API keys.',
					'default'     => 'yes',
					'desc_tip'    => true,
				),
				'test_end_point' => array(
					'title'       => 'Test Endpoint',
					'type'        => 'text',
					'description' => 'This controls the endpoint which will be used internally to communicate with Nimbbl checkout.',
					'default'     => 'https://api.nimbbl.tech',
					'desc_tip'    => true,
				),
				'test_publishable_key' => array(
					'title'       => 'Test Publishable Key',
					'type'        => 'text'
				),
				'test_private_key' => array(
					'title'       => 'Test Private Key',
					'type'        => 'password',
				),
				// 'test_webhook_secret' => array(
				// 	'title'       => 'Test Webhook Secret',
				// 	'type'        => 'text'
				// ),
				'end_point' => array(
					'title'       => 'Live Endpoint',
					'type'        => 'text',
					'description' => 'This controls the endpoint which will be used internally to communicate with Nimbbl checkout.',
					'default'     => 'https://api.nimbbl.tech',
					'desc_tip'    => true,
				),
				'publishable_key' => array(
					'title'       => 'Live Publishable Key',
					'type'        => 'text'
				),
				'private_key' => array(
					'title'       => 'Live Private Key',
					'type'        => 'password'
				),
				// 'webhook_secret' => array(
				// 	'title'       => 'Webhook Secret',
				// 	'type'        => 'text'
				// )
			);
		}

		/*
		 * We're processing the payments here, everything about it is in Step 5
		 */
		public function process_payment($order_id)
		{
			global $woocommerce;

			// we need it to get any order detailes
			$order = wc_get_order($order_id);

			$orderKey = $this->getOrderKey($order);

			return array(
				'result' => 'success',
				'redirect' => add_query_arg('key', $orderKey, $order->get_checkout_payment_url(true))
			);
		}

		/**
		 * Add a woocommerce notification message
		 *
		 * @param string $message Notification message
		 * @param string $type Notification type, default = notice
		 */
		protected function add_notice($message, $type = 'notice')
		{
			global $woocommerce;
			$type = in_array($type, array('notice', 'error', 'success'), true) ? $type : 'notice';
			// Check for existence of new notification api. Else use previous add_error
			if (function_exists('wc_add_notice')) {
				wc_add_notice($message, $type);
			} else {
				// Retrocompatibility WooCommerce < 2.1
				switch ($type) {
					case "error":
						$woocommerce->add_error($message);
						break;
					default:
						$woocommerce->add_message($message);
						break;
				}
			}
		}

		public function thankyou($order_id)
		{
			global $woocommerce;
			
			// we need it to get any order detailes
			$order = wc_get_order($order_id);
			//$logger->info(wc_print_r("Posted Data : " .json_encode($_POST), true ), array( 'source' => 'callback-call' ) );

			$order_data = $order->get_data(); 
			//$logger->info(wc_print_r( "Order Data : ".json_encode($order_data), true ), array( 'source' => 'callback-call' ) );

			if(isset($_POST['nimbbl_signature']) && !empty($_POST['nimbbl_signature'])){
				$verified = $this->api->util->verifyPaymentSignature([
					'nimbbl_signature' => sanitize_text_field($_POST['nimbbl_signature']),
					'nimbbl_transaction_id' => sanitize_text_field($_POST['nimbbl_transaction_id']),
					'merchant_order_id' => sanitize_text_field($_POST['nimbbl_wc_order_id']),
				]);

				if($verified){
					$order_status = $this->statuses[$order_data['status']];
					if ($order && $order_data && $order_status != $_POST['nimbbl_status'] && sanitize_text_field($_POST['nimbbl_status']) == "success") {
						$order->payment_complete(sanitize_text_field($_POST['nimbbl_transaction_id']));
						$woocommerce->cart->empty_cart();
						
						//$logger->info(wc_print_r( "Order Updated and status changed", true ), array( 'source' => 'callback-call' ) );
						// $order->reduce_order_stock();
						// $order->update_status( 'pending', '', true );
						// The text for the note
						// $note = __("Payment Trasaction Id (Nimbbl): " . $_POST['nimbbl_transaction_id']);
						// Add the note
						// $order->add_order_note($note);
		
						if (sanitize_text_field($_POST['nimbbl_order_id']))
							$order->add_order_note('Nimbbl order ID: "' . sanitize_text_field($_POST['nimbbl_order_id']) . '"');
						if (sanitize_text_field($_POST['nimbbl_transaction_id']))
							$order->add_order_note('Nimbbl transaction ID: "' . sanitize_text_field($_POST['nimbbl_transaction_id']) . '"');
						
						
						// $this->add_notice('Order Successful', 'success');
						wp_redirect($order->get_checkout_order_received_url());
					}
					// Ideally this should never get executed.
					elseif ($order && $order_data && $order_status != $_POST['nimbbl_status']  && sanitize_text_field($_POST['nimbbl_status']) == "failed") {
						$order->update_status('failed', __('Payment has been cancelled.', false));
						$order->add_order_note('Nimbbl payment failed<br/> Data (Nimbbl) - : "' . sanitize_text_field($_POST['nimbbl_transaction_id']) ? sanitize_text_field($_POST['nimbbl_transaction_id']) : sanitize_text_field($_POST['nimbbl_order_id']) . '"<br/>Fail Reason: "' . sanitize_text_field($_POST['message']) . '"');
						$woocommerce->cart->empty_cart();
						
						//$logger->info(wc_print_r( "Order Updated and status changed", true ), array( 'source' => 'callback-call' ) );

						$this->add_notice(esc_attr('Nimbbl payment failed<br/> Data (Nimbbl) - : "' . sanitize_text_field($_POST['nimbbl_transaction_id']) ? sanitize_text_field($_POST['nimbbl_transaction_id']) : sanitize_text_field($_POST['nimbbl_order_id']) . '"<br/>Fail Reason: "' . sanitize_text_field($_POST['message']) . '"'), 'error');
						wp_redirect(esc_url(get_site_url().'/checkout/'));
					}
				}else{
					$order->add_order_note('Nimbbl Callback signature verification failed.');
					$this->add_notice(esc_attr('Nimbbl Callback signature verification failed.'), 'error');
					wp_redirect(esc_url(get_site_url().'/checkout/'));
				}
			}	
		}

		/*
		 * In case you need a webhook, like PayPal IPN etc
		 */
		public function webhook()
		{
			$post = file_get_contents('php://input');
			//$logger = wc_get_logger();
			$webhook_data = json_decode($post, true);

			//$logger->info( wc_print_r( "webhook data" . $post, true ), array( 'source' => 'webhook-call' ) );
			//$logger->info( wc_print_r( "webhook data decoded " . $webhook_data, true ), array( 'source' => 'webhook-call' ) );
			//$logger->info( wc_print_r( "webhook order id " . $webhook_data['order']['invoice_id'], true ), array( 'source' => 'webhook-call' ) );

			$order = wc_get_order($webhook_data['order']['invoice_id']);
			$order_data = $order->get_data(); 
			//$logger->info(wc_print_r( "Order Data : ". json_encode($order_data), true ), array( 'source' => 'webhook-call' ) );
			// $order = new WC_Order($webhook_data['order']['invoice_id']);

			$order->add_order_note('Nimbbl webhook received.');
			// The Order data
			// $order_data = $order->get_data();
			$order_status = $this->statuses[$order_data['status']];
			if (isset($order) && isset($order_data) && (!in_array($order_status,["processing","success"])) && $order_status != $webhook_data['status']) {
				//$logger->info(wc_print_r( "Order Updated and status changed", true ), array( 'source' => 'webhook-call' ) );
				// Use the webhook secret to validate the payload.
				$verified = $this->api->util->verifyPaymentSignature([
					'nimbbl_signature' => $webhook_data['nimbbl_signature'],
					'nimbbl_transaction_id' => $webhook_data['nimbbl_transaction_id'],
					'merchant_order_id' => $webhook_data['order']['invoice_id'],
				]);

				if ($verified) {
					$order->add_order_note('Nimbbl webhook signature verified.');
					
					// Based on transaction status change this to complete or failed.
					if ($webhook_data['transaction']['status'] === 'succeeded') {

						if ($webhook_data['nimbbl_order_id'])
							$order->add_order_note('Nimbbl order ID: "' . $webhook_data['nimbbl_order_id'] . '"');
						if ($webhook_data['nimbbl_transaction_id'])
							$order->add_order_note('Nimbbl transaction ID: "' . $webhook_data['nimbbl_transaction_id'] . '"');
						if ($webhook_data['message'])
							$order->add_order_note('Reason: "' . $webhook_data['message'] . '"');

						$order->add_order_note('Webhook: Received status "succeeded".');
						$order->payment_complete($webhook_data['nimbbl_transaction_id']);
					}
					if ($webhook_data['transaction']['status'] === 'failed') {
						$order->add_order_note('Webhook: Received status "failed".');
						$order->update_status('failed', $webhook_data['message']);
					}
				}
				else {
					$order->add_order_note('Nimbbl webhook signature verification failed.');
				}
			}
		}

		// public function webhook()
		// {
		// 	$webhook_data = json_decode(file_get_contents('php://input'), true);

		// 	$order = wc_get_order($webhook_data['order']['invoice_id']);

		// 	if (isset($order)) {
		// 		// Use the webhook secret to validate the payload.
		// 		$nimbbl_signature = $webhook_data['nimbbl_signature'];
		// 		$generated_signature = hash_hmac('sha256', $webhook_data['order']['invoice_id'] . '|' . $webhook_data['nimbbl_transaction_id'], $this->private_key);
		// 		if ($generated_signature == $nimbbl_signature) {
		// 			$order->add_order_note('Nimbbl webhook signature verified.');
		// 		} else {
		// 			$order->add_order_note('Nimbbl webhook signature verification failed.');
		// 		}

		// 		// Based on transaction status change this to complete or failed.
		// 		if ($webhook_data['transaction']['status'] === 'succeeded') {
		// 			$order->add_order_note('Webhook: Received status "succeeded".');
		// 			// $order->payment_complete();
		// 			$order->payment_complete($webhook_data['nimbbl_transaction_id']);
		// 		}
		// 		if ($webhook_data['transaction']['status'] === 'failed') {
		// 			$order->add_order_note('Webhook: Received status "failed".');
		// 			$order->update_status('failed', $webhook_data['message']);
		// 		}

		// 		$order->add_order_note('Nimbbl webhook received.');
		// 	}
		// }

		protected function getOrderKey($order)
		{
			$orderKey = null;

			if (version_compare(WOOCOMMERCE_VERSION, '3.0.0', '>=')) {
				return $order->get_order_key();
			}

			return $order->order_key;
		}

		public function get_token_create_order_on_nimbbl($orderId)
		{

			// get order details from woo
			$order = wc_get_order($orderId);
			// The Order data
			$order_data = $order->get_data();

			// Gather the user details.
			$billing_data = $order_data['billing'];
			$arg_wp_user_data = array(
				"mobile_number" => (isset($billing_data['phone']) ? $billing_data['phone'] : ''),
				"email" => $billing_data['email'],
				"first_name" => (isset($billing_data['first_name']) ? $billing_data['first_name'] : ''),
				"last_name" => (isset($billing_data['last_name']) ? $billing_data['last_name'] : ''),
			);

			// Gather the shipping details.
			$shipping_data = $order_data['shipping'];
			$address_1 = (isset($billing_data['address_1']) ? $billing_data['address_1'] : $shipping_data['address_1']);
			$address_2 = (isset($billing_data['address_2']) ? $billing_data['address_2'] : $shipping_data['address_2']);
			$arg_wp_shipping_address_data = [
				'area' => $address_1 . ', ' . $address_2,
				'city' => (isset($billing_data['city']) ? $billing_data['city'] : $shipping_data['city']),
				'state' => (isset($billing_data['state']) ? $billing_data['state'] : $shipping_data['state']),
				'pincode' => (isset($billing_data['postcode']) ? $billing_data['postcode'] : $shipping_data['postcode']),
				'address_type' => 'home'
			];

			// Gather the order line items.
			$arg_order_item_data = array();
			// The loop to get the order items which are WC_Order_Item_Product objects since WC 3+
			foreach ($order->get_items() as $item_id => $item) {
				$wc_product = wc_get_product($item['product_id']);
				$wc_product_image_url = wp_get_attachment_url($wc_product->get_image_id());

				$product = array(
					// $product_id    = $item['product_id']; // Get the product ID
					// $variation_id  = $item['variation_id']; // Get the variation ID

					"title" => $item['name'], // The product name
					"quantity" => $item['quantity'],
					'uom' => '',
					'image_url' => $wc_product_image_url,
					'description' => strip_tags($wc_product->get_description()),
					'sku_id' => $wc_product->get_sku(),

					// Get line item totals (non discounted)
					// $line_total     = $item['subtotal']; // or $item['line_subtotal'] -- The line item non discounted total
					// $line_total_tax = $item['subtotal_tax']; // or $item['line_subtotal_tax'] -- The line item non discounted tax total

					// Get line item totals (discounted)
					// 'rate' => $wc_product->get_sale_price(),
					'amount_before_tax' => $item['total'] - $item['total_tax'],
					'tax' => $item['total_tax'],
					"total_amount" => $item['total'], // or $item['line_total'] -- The line item non discounted total
					// $line_total_tax2 = $item['total_tax']; // The line item non discounted tax total

				);

				$salePrice = $wc_product->get_sale_price();
				if (isset($salePrice)) {
					$product['rate'] = $wc_product->get_sale_price();
				}

				array_push($arg_order_item_data, $product);
			}

			// echo $arg_order_item_data;
			$arg_nimbbl_order_data = array(
				'referrer_platform' => 'woocommerce',
				'referrer_platform_version' => 'v2.0.3',
				'merchant_shopfront_domain' => esc_url(get_site_url()),
				'invoice_id' => $order_data['id'],
				'order_date' => $order_data['date_created']->date('Y-m-d H:i:s'),
				'currency' => $order_data['currency'],
				'amount_before_tax' => $order_data['total'] - $order_data['total_tax'],
				'tax' => $order_data['total_tax'],
				'total_amount' => $order_data['total'],
				"user" => $arg_wp_user_data,
				'shipping_address' => $arg_wp_shipping_address_data,
				"order_line_items" => $arg_order_item_data,
				'description' => $order_data['customer_note'],
			);

			$newOrder = $this->api->order->create($arg_nimbbl_order_data);

			// $logger = wc_get_logger();
			// $logger->info(wc_print_r( "Order data" . json_encode($newOrder), true ), array( 'source' => 'webhook-call' ) );

			if ($newOrder->error) {
				wc_add_notice(esc_attr($newOrder->error), 'error');
				return false;
			}

			return $newOrder->attributes;
		}

		// public function get_token_create_order_on_nimbbl($orderId)
		// {

		// 	$token_url = $this->end_point . '/api/v2/generate-token';

		// 	$arg_token_data = array('access_key' => $this->publishable_key, 'access_secret' => $this->private_key,);

		// 	$token_data = json_encode($arg_token_data);

		// 	$args_token_data = array('headers' => array('Content-Type' => 'application/json'), 'body' => $token_data);
		// 	$token_response = wp_remote_post(esc_url_raw($token_url), $args_token_data);

		// 	$token_response_code = wp_remote_retrieve_response_code($token_response);

		// 	$token_response_body = wp_remote_retrieve_body($token_response);

		// 	if (!is_wp_error($token_response_body)) {
		// 		$token_result = json_decode($token_response_body, true);

		// 		// get order details from woo
		// 		$order = wc_get_order($orderId);

		// 		$order_data = $order->get_data(); // The Order data

		// 		$nimbbl_order_url = $this->end_point . '/api/v2/create-order';

		// 		// Gather the user details.
		// 		$billing_data = $order_data['billing'];
		// 		$arg_wp_user_data = array(
		// 			"mobile_number" => (isset($billing_data['phone']) ? $billing_data['phone'] : ''),
		// 			"email" => $billing_data['email'],
		// 			"first_name" => (isset($billing_data['first_name']) ? $billing_data['first_name'] : ''),
		// 			"last_name" => (isset($billing_data['last_name']) ? $billing_data['last_name'] : ''),
		// 		);

		// 		// Gather the shipping details.
		// 		$shipping_data = $order_data['shipping'];
		// 		$address_1 = (isset($shipping_data['address_1']) ? $shipping_data['address_1'] : $billing_data['address_1']);
		// 		$address_2 = (isset($shipping_data['address_2']) ? $shipping_data['address_2'] : $billing_data['address_2']);
		// 		$arg_wp_shipping_address_data = [
		// 			'area' => $address_1 . ', ' . $address_2,
		// 			'city' => (isset($shipping_data['city']) ? $shipping_data['city'] : $billing_data['city']),
		// 			'state' => (isset($shipping_data['state']) ? $shipping_data['state'] : $billing_data['state']),
		// 			'pincode' => (isset($shipping_data['postcode']) ? $shipping_data['postcode'] : $billing_data['postcode']),
		// 			'address_type' => 'home'
		// 		];

		// 		// Gather the order line items.
		// 		$arg_order_item_data = array();
		// 		// The loop to get the order items which are WC_Order_Item_Product objects since WC 3+
		// 		foreach ($order->get_items() as $item_id => $item) {
		// 			$wc_product = wc_get_product($item['product_id']);
		// 			$wc_product_image_url = wp_get_attachment_url($wc_product->get_image_id());

		// 			$product = array(
		// 				// $product_id    = $item['product_id']; // Get the product ID
		// 				// $variation_id  = $item['variation_id']; // Get the variation ID

		// 				"title" => $item['name'], // The product name
		// 				"quantity" => $item['quantity'],
		// 				'uom' => '',
		// 				'image_url' => $wc_product_image_url,
		// 				'description' => strip_tags($wc_product->get_description()),
		// 				'sku_id' => $wc_product->get_sku(),

		// 				// Get line item totals (non discounted)
		// 				// $line_total     = $item['subtotal']; // or $item['line_subtotal'] -- The line item non discounted total
		// 				// $line_total_tax = $item['subtotal_tax']; // or $item['line_subtotal_tax'] -- The line item non discounted tax total

		// 				// Get line item totals (discounted)
		// 				// 'rate' => $wc_product->get_sale_price(),
		// 				'amount_before_tax' => $item['total'] - $item['total_tax'],
		// 				'tax' => $item['total_tax'],
		// 				"total_amount" => $item['total'], // or $item['line_total'] -- The line item non discounted total
		// 				// $line_total_tax2 = $item['total_tax']; // The line item non discounted tax total

		// 			);

		// 			$salePrice = $wc_product->get_sale_price();
		// 			if (isset($salePrice)) {
		// 				$product['rate'] = $wc_product->get_sale_price();
		// 			}

		// 			array_push($arg_order_item_data, $product);
		// 		}

		// 		// echo $arg_order_item_data;
		// 		$arg_nimbbl_order_data = array(
		// 			'referrer_platform' => 'woocommerce',
		// 			'merchant_shopfront_domain' => get_site_url(),
		// 			// 'invoice_id' => $order_data['order_key'],
		// 			'invoice_id' => $order_data['id'],
		// 			'order_date' => $order_data['date_created']->date('Y-m-d H:i:s'),
		// 			'currency' => $order_data['currency'],
		// 			'amount_before_tax' => $order_data['total'] - $order_data['total_tax'],
		// 			'tax' => $order_data['total_tax'],
		// 			'total_amount' => $order_data['total'],
		// 			"user" => $arg_wp_user_data,
		// 			'shipping_address' => $arg_wp_shipping_address_data,
		// 			"order_line_items" => $arg_order_item_data,
		// 			'description' => $order_data['customer_note'],
		// 		);

		// 		$nimbbl_order_data = json_encode($arg_nimbbl_order_data);

		// 		$args_nimbbl_order_data = array(
		// 			'headers' => array(
		// 				'Content-Type' => 'application/json',
		// 				'Authorization' =>  'Bearer ' . $token_result['token'],
		// 			),
		// 			'body' => $nimbbl_order_data
		// 		);

		// 		$nimbbl_order_response = wp_remote_post(esc_url_raw($nimbbl_order_url), $args_nimbbl_order_data);

		// 		$nimbbl_order_response_code = wp_remote_retrieve_response_code($nimbbl_order_response);

		// 		$nimbbl_order_response_body = wp_remote_retrieve_body($nimbbl_order_response);

		// 		if (!is_wp_error($nimbbl_order_response_body)) {
		// 			$nimbbl_order_result = json_decode($nimbbl_order_response_body, true);
		// 			return $nimbbl_order_result;
		// 		} else {
		// 			wc_add_notice($nimbbl_order_response_body, 'error');
		// 			return false;
		// 		}
		// 	} else {
		// 		wc_add_notice($token_response_body, 'error');
		// 		return false;
		// 	}

		// 	//token end

		// }

		private function enqueueCheckoutScripts($data)
		{
			wp_register_script(
				'nimbbl_wc_script',
				plugin_dir_url(__FILE__)  . 'nimbbl.js',
				array('nimbbl_checkout'),
				$this->version
			);

			wp_register_script(
				'nimbbl_checkout',
				$this->end_point . '/static/assets/js/checkout.js',
				null,
				$this->version
			);

			wp_localize_script(
				'nimbbl_wc_script',
				'nimbbl_wc_checkout_vars',
				$data
			);

			wp_enqueue_script('nimbbl_wc_script');
		}

		function receipt_page($orderId)
		{
			echo $this->generate_nimbbl_form($orderId);
		}

		public function generate_nimbbl_form($orderId)
		{
			$order = new WC_Order($orderId);

			try {
				$params = $this->getNimbblPaymentParams($orderId);
			} catch (Exception $e) {
				return $e->getMessage();
			}

			// $checkoutArgs = $this->getCheckoutArguments($order, $params);

			// $html = '<p>' . __('Thank you for your order, please click the button below to pay with Nimbbl.') . '</p>';
			$html = '';

			$html .= $this->generateOrderForm($order, $params);

			return $html;
		}

		public function getNimbblPaymentParams($orderId)
		{

			$nimbblpayOrder = $this->get_token_create_order_on_nimbbl($orderId);
			return [
				'order_id'  =>  $nimbblpayOrder['order_id'],
				'access_key' => $this->publishable_key
			];
		}

		private function getCheckoutArguments($order, $params)
		{
			return $params;
		}

		private function getRedirectUrl()
		{
			return add_query_arg('wc-api', $this->id, trailingslashit(get_home_url()));
		}

		function generateOrderForm($order, $data)
		{
			$redirectUrl = $this->get_return_url($order); //= $this->getRedirectUrl();

			$cancelUrl = wc_get_checkout_url();

			$this->enqueueCheckoutScripts($data);
			return <<<EOT
<form id="nimbbl_form" name='nimbblform' action="$redirectUrl" method="POST">
	<input type="hidden" name="nimbbl_order_id" id="nimbbl_order_id">
	<input type="hidden" name="nimbbl_transaction_id" id="nimbbl_transaction_id">
    <input type="hidden" name="nimbbl_signature" id="nimbbl_signature">
	<input type="hidden" name="nimbbl_status" id="nimbbl_status">
	<input type="hidden" name="nimbbl_reason" id="nimbbl_reason">
	<!-- This distinguishes all our various wordpress plugins -->
    <input type="hidden" name="nimbbl_wc_form_submit" value="1">
    <input type="hidden" name="nimbbl_wc_order_id" id="nimbbl_wc_order_id" value="$order->id">
    <input type="hidden" name="nimbbl_cancel_url" id="nimbbl_cancel_url" value="$cancelUrl">
</form>

<p id="msg-nimbbl-success" class="woocommerce-info woocommerce-message" style="display: none !important;">
    Please wait while we are processing your payment.
</p>
<p style="display: none !important;">
    <button id="pay-with-nimbbl">Pay Now</button>
    <button id="btn-nimbbl-cancel" onclick="document.getElementById('nimbbl_status').setAttribute('value', 'failed'); document.getElementById('nimbbl_reason').setAttribute('value', 'User Cancelled'); document.nimbblform.action='$cancelUrl'; document.nimbblform.submit()">Cancel</button>
</p>
EOT;
		}
	}
}
