<?php

    namespace Tests;

    class ChronopostTest extends Wrapper{

        public function testSuccessTracking(){
            $this->beforeTest();
            $response = $this->generate(
                $this->getRequest("GET", "/service/chronopost/track", "code=7J00142296712")
            );
            $json = $this->parseJsonResponse($response);
            $this->assertEquals(200, $response->getStatusCode());
            $this->assertEquals(true, $json['success']);
        }

        public function testErrorTracking(){
            $this->beforeTest();
            $response = $this->generate(
                $this->getRequest("GET", "/service/chronopost/track", "code=ABCD")
            );
            $json = $this->parseJsonResponse($response);
            $this->assertEquals(500, $response->getStatusCode());
            $this->assertEquals(false, $json['success']);
        }

    }