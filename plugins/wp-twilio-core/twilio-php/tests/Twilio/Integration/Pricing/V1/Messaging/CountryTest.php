<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Pricing\V1\Messaging;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class CountryTest extends HolodeckTestCase {
    public function testReadRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->pricing->v1->messaging
                                      ->countries->read();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://pricing.twilio.com/v1/Messaging/Countries'
        ));
    }

    public function testReadEmptyResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "countries": [],
                "meta": {
                    "first_page_url": "https://pricing.twilio.com/v1/Messaging/Countries?PageSize=50&Page=0",
                    "key": "countries",
                    "next_page_url": null,
                    "page": 0,
                    "page_size": 50,
                    "previous_page_url": null,
                    "url": "https://pricing.twilio.com/v1/Messaging/Countries?PageSize=50&Page=0"
                }
            }
            '
        ));

        $actual = $this->twilio->pricing->v1->messaging
                                            ->countries->read();

        $this->assertNotNull($actual);
    }

    public function testReadFullResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "countries": [
                    {
                        "country": "country",
                        "iso_country": "US",
                        "url": "https://pricing.twilio.com/v1/Messaging/Countries/US"
                    }
                ],
                "meta": {
                    "first_page_url": "https://pricing.twilio.com/v1/Messaging/Countries?PageSize=50&Page=0",
                    "key": "countries",
                    "next_page_url": null,
                    "page": 0,
                    "page_size": 50,
                    "previous_page_url": null,
                    "url": "https://pricing.twilio.com/v1/Messaging/Countries?PageSize=50&Page=0"
                }
            }
            '
        ));

        $actual = $this->twilio->pricing->v1->messaging
                                            ->countries->read();

        $this->assertGreaterThan(0, \count($actual));
    }

    public function testFetchRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->pricing->v1->messaging
                                      ->countries("US")->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://pricing.twilio.com/v1/Messaging/Countries/US'
        ));
    }

    public function testFetchResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "country": "country",
                "inbound_sms_prices": [
                    {
                        "base_price": "0.05",
                        "current_price": "0.05",
                        "number_type": "mobile"
                    }
                ],
                "iso_country": "US",
                "outbound_sms_prices": [
                    {
                        "carrier": "att",
                        "mcc": "foo",
                        "mnc": "bar",
                        "prices": [
                            {
                                "base_price": "0.05",
                                "current_price": "0.05",
                                "number_type": "mobile"
                            }
                        ]
                    }
                ],
                "price_unit": "USD",
                "url": "https://pricing.twilio.com/v1/Messaging/Countries/US"
            }
            '
        ));

        $actual = $this->twilio->pricing->v1->messaging
                                            ->countries("US")->fetch();

        $this->assertNotNull($actual);
    }
}