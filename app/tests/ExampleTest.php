<?php

class ExampleTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testBasicExample()
	{
        $response = $this->call('GET', '/');

		//$this->assertTrue($this->client->getResponse()->isOk());

        $this->assertEquals('Homep', $response->getContent());
	}

}