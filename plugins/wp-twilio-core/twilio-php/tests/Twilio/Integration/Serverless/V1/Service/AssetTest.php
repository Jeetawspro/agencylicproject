<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Serverless\V1\Service;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class AssetTest extends HolodeckTestCase {
    public function testReadRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->serverless->v1->services("ZSXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                         ->assets->read();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://serverless.twilio.com/v1/Services/ZSXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Assets'
        ));
    }

    public function testReadEmptyResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "assets": [],
                "meta": {
                    "first_page_url": "https://serverless.twilio.com/v1/Services/ZS00000000000000000000000000000000/Assets?PageSize=50&Page=0",
                    "key": "assets",
                    "next_page_url": null,
                    "page": 0,
                    "page_size": 50,
                    "previous_page_url": null,
                    "url": "https://serverless.twilio.com/v1/Services/ZS00000000000000000000000000000000/Assets?PageSize=50&Page=0"
                }
            }
            '
        ));

        $actual = $this->twilio->serverless->v1->services("ZSXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                               ->assets->read();

        $this->assertNotNull($actual);
    }

    public function testFetchRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->serverless->v1->services("ZSXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                         ->assets("ZHXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://serverless.twilio.com/v1/Services/ZSXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Assets/ZHXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'
        ));
    }

    public function testFetchResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "sid": "ZH00000000000000000000000000000000",
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "service_sid": "ZS00000000000000000000000000000000",
                "friendly_name": "test-asset",
                "date_created": "2018-11-10T20:00:00Z",
                "date_updated": "2018-11-10T20:00:00Z",
                "url": "https://serverless.twilio.com/v1/Services/ZS00000000000000000000000000000000/Assets/ZH00000000000000000000000000000000",
                "links": {
                    "asset_versions": "https://serverless.twilio.com/v1/Services/ZS00000000000000000000000000000000/Assets/ZH00000000000000000000000000000000/Versions"
                }
            }
            '
        ));

        $actual = $this->twilio->serverless->v1->services("ZSXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                               ->assets("ZHXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->fetch();

        $this->assertNotNull($actual);
    }

    public function testDeleteRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->serverless->v1->services("ZSXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                         ->assets("ZHXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->delete();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'delete',
            'https://serverless.twilio.com/v1/Services/ZSXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Assets/ZHXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'
        ));
    }

    public function testDeleteResponse() {
        $this->holodeck->mock(new Response(
            204,
            null
        ));

        $actual = $this->twilio->serverless->v1->services("ZSXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                               ->assets("ZHXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->delete();

        $this->assertTrue($actual);
    }

    public function testCreateRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->serverless->v1->services("ZSXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                         ->assets->create("friendly_name");
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $values = array('FriendlyName' => "friendly_name", );

        $this->assertRequest(new Request(
            'post',
            'https://serverless.twilio.com/v1/Services/ZSXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Assets',
            null,
            $values
        ));
    }

    public function testCreateResponse() {
        $this->holodeck->mock(new Response(
            201,
            '
            {
                "sid": "ZH00000000000000000000000000000000",
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "service_sid": "ZS00000000000000000000000000000000",
                "friendly_name": "asset-friendly",
                "date_created": "2018-11-10T20:00:00Z",
                "date_updated": "2018-11-10T20:00:00Z",
                "url": "https://serverless.twilio.com/v1/Services/ZS00000000000000000000000000000000/Assets/ZH00000000000000000000000000000000",
                "links": {
                    "asset_versions": "https://serverless.twilio.com/v1/Services/ZS00000000000000000000000000000000/Assets/ZH00000000000000000000000000000000/Versions"
                }
            }
            '
        ));

        $actual = $this->twilio->serverless->v1->services("ZSXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                               ->assets->create("friendly_name");

        $this->assertNotNull($actual);
    }

    public function testUpdateRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->serverless->v1->services("ZSXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                         ->assets("ZHXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->update("friendly_name");
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $values = array('FriendlyName' => "friendly_name", );

        $this->assertRequest(new Request(
            'post',
            'https://serverless.twilio.com/v1/Services/ZSXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Assets/ZHXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX',
            null,
            $values
        ));
    }

    public function testUpdateResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "sid": "ZH00000000000000000000000000000000",
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "service_sid": "ZS00000000000000000000000000000000",
                "friendly_name": "asset-friendly-update",
                "date_created": "2018-11-10T20:00:00Z",
                "date_updated": "2018-11-10T20:00:00Z",
                "url": "https://serverless.twilio.com/v1/Services/ZS00000000000000000000000000000000/Assets/ZH00000000000000000000000000000000",
                "links": {
                    "asset_versions": "https://serverless.twilio.com/v1/Services/ZS00000000000000000000000000000000/Assets/ZH00000000000000000000000000000000/Versions"
                }
            }
            '
        ));

        $actual = $this->twilio->serverless->v1->services("ZSXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                               ->assets("ZHXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->update("friendly_name");

        $this->assertNotNull($actual);
    }
}