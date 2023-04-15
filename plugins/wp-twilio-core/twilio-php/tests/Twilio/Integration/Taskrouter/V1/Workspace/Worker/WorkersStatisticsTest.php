<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Taskrouter\V1\Workspace\Worker;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class WorkersStatisticsTest extends HolodeckTestCase {
    public function testFetchRequest() {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->taskrouter->v1->workspaces("WSXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                         ->workers
                                         ->statistics()->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://taskrouter.twilio.com/v1/Workspaces/WSXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Workers/Statistics'
        ));
    }

    public function testFetchResponse() {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "cumulative": {
                    "reservations_created": 0,
                    "reservations_accepted": 0,
                    "reservations_rejected": 0,
                    "reservations_timed_out": 0,
                    "reservations_canceled": 0,
                    "reservations_rescinded": 0,
                    "activity_durations": [
                        {
                            "max": 0,
                            "min": 900,
                            "sid": "WAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                            "friendly_name": "Offline",
                            "avg": 1080,
                            "total": 5400
                        },
                        {
                            "max": 0,
                            "min": 900,
                            "sid": "WAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                            "friendly_name": "Busy",
                            "avg": 1012,
                            "total": 8100
                        },
                        {
                            "max": 0,
                            "min": 0,
                            "sid": "WAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                            "friendly_name": "Idle",
                            "avg": 0,
                            "total": 0
                        },
                        {
                            "max": 0,
                            "min": 0,
                            "sid": "WAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                            "friendly_name": "Reserved",
                            "avg": 0,
                            "total": 0
                        }
                    ],
                    "start_time": "2008-01-02T00:00:00Z",
                    "end_time": "2008-01-02T00:00:00Z"
                },
                "realtime": {
                    "total_workers": 15,
                    "activity_statistics": [
                        {
                            "friendly_name": "Idle",
                            "workers": 0,
                            "sid": "WAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
                        },
                        {
                            "friendly_name": "Busy",
                            "workers": 9,
                            "sid": "WAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
                        },
                        {
                            "friendly_name": "Offline",
                            "workers": 6,
                            "sid": "WAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
                        },
                        {
                            "friendly_name": "Reserved",
                            "workers": 0,
                            "sid": "WAaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa"
                        }
                    ]
                },
                "workspace_sid": "WSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "url": "https://taskrouter.twilio.com/v1/Workspaces/WSaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Workers/Statistics"
            }
            '
        ));

        $actual = $this->twilio->taskrouter->v1->workspaces("WSXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                               ->workers
                                               ->statistics()->fetch();

        $this->assertNotNull($actual);
    }
}