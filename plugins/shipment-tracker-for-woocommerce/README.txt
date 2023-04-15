=== Shipment Tracker for Woocommerce ===
Contributors: amitmital,rakeshmali011
Tags: shiprocket, shyplite, nimbuspost, order tracking, shipment tracking
Requires at least: 4.6
Tested up to: 6.0
Requires PHP: 5.6
Stable tag: trunk
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Automatically synchronize woocommerce orders' shipment tracking information from Shiprocket, Shyplite and Nimbuspost.

== Description ==
This plugin integrates with Shiprocket, Shyplite and Nimbuspost web apis to synchronize tracking information of your Woocommerce orders. Easy setup, many configurable options for sync frequency, default provider etc.

Disclaimer: Woocommerce, Shiprocket, Shyplite &amp; Nimbuspost are registered trademarks and belong to their respective owners. This plugin is not affiliated with them in any way.
== Installation ==
1. In your WordPress admin panel, go to Plugins > New Plugin, search for \'Shipment Tracker\' and click “Install now“
2. Alternatively, download the plugin and upload the contents of shipment-tracker.zip to your plugins directory, which usually is /wp-content/plugins/.
3. Activate the plugin
4. Enable the desired shipment aggregator (Shiprocket, Shyplite, Nimbuspost or Manual), then click Save.
4. Set your API keys of enabled shipping providers in their respective Tab.

== Screenshots ==
1. Enable the shipping providers and set other basic configurations in "General Settings".
2. Shiprocket specific settings (only appears if Shiprocket is enabled in General Settings).
3. Shyplite specific settings (only appears if Shyplite is enabled in General Settings).
4. Tracking information in Woocommerce->Orders page in admin.
5. Tracking information in Order details page.

== Changelog ==
= 1.3.2 - 2022.06.01 =
1) Fix in Shiprocket syncing for orders when its shipment has not been picked up by the courier.
2) Better Developer Docs
3) Wordpress 6.0 support
4) Few bug fixes
= 1.3.1 - 2022.03.10 =
1) Fix empty settings page issue on some wordpress installations.
2) Implemented Feedback/Review system for users.
3) Fix to support custom order statuses. There was a limitation due to which orders with non default status were not synced.
4) Bug fix in php function 'get_tracking_by_order_id'.
5) Fixes in shipment tracking shortcode for front-end.
6) Several other improvements & fixes.
= 1.2.4 - 2022.01.31 =
1) Dedicated metabox for shipment tracking. Now get all your shipment tracking information in one place.
2) Ability to explicitly set awb number to orders, useful in many scenarios.
3) Fixes in nimbuspost syncing and webhook receiver.
4) Fixes in shiprocket syncing and webhook receiver.
5) Added support to track orders via awb.
6) Several code improvements & cleanup.
7) Added hook "bt_shipment_status_changed" which is called whenever order status is changed.
= 1.2.3 - 2021.11.06 =
1) Add nimnubspost shipping provider integration.
2) Feature to force sync shipment tracking information of the order.
3) Support for fallback webhook url for shiprocket.
4) Added shortcode [bt_shipping_tracking_form] of shippment tracking for website.
5) Added a "manual" shipping provider for custom shipment of the order.
6) Added new functions bt_get_shipping_tracking() and bt_force_sync_order_tracking() for developers.
7) Added hook "bt_shipment_status_changed" which is called whenever order status is changed.
= 1.2.0 - 2021.06.11 =
1) Added tracking info in my-account->orders
2) Feature to add tracking updates as order notes.
3) Support for fallback webhook url for shiprocket.
= 1.1.0 - 2021.03.05 =
* Wordpress 5.7 support. 
* Fixes in Shyplite syncing.
= 1.0.0 - 2021.02.03 =
* Initial release!