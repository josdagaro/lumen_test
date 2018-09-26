<?php

namespace Tests\Features;

use Behat\Behat\Tester\Exception\PendingException,
    Behat\Behat\Context\Context,
    Behat\Behat\Context\SnippetAcceptingContext,
    Behat\MinkExtension\Context\MinkContext,
    Behat\Mink\Driver\GoutteDriver,
    Behat\Mink\Session,
    App\Http\Controllers\HotelController,
    PHPUnit\Framework\Assert;

/**
 * Defines application features from the specific context.
 */
class HotelFeatureContext extends MinkContext implements Context, SnippetAcceptingContext
{
    private static $baseUrl = 'http://localhost';

    private $session;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->session = new Session(new GoutteDriver());
        $this->session->start();
    }

    /**
     * @Given I request the API route :path
     */
    public function iRequestTheApiRoute($path)
    {
        $this->session->visit(self::$baseUrl . $path);
    }

    /**
     * @Then I should get the first :amount hotels
     */
    public function iShouldGetTheFirstHotels($amount)
    {
        $amount = (int)$amount;
        $page = $this->session->getPage();
        $content = json_decode($page->getContent());
        
        if (!empty($content)) {
            if (isset($content->data)) {
                Assert::assertCount(
                    $amount, 
                    $content->data, 
                    "The amount of hotels (" . count($content->data) 
                    . ") you got isn't equal to the expected amount ($amount)"
                );
                
                $id = 0;

                foreach($content->data as $hotel) {
                    Assert::assertEquals(++$id, $hotel->id, "The hotel ID's you got aren't the expected");
                }
            } else {
                throw new \Exception("The property 'data' doesn't exists in response\n" . $content);     
            }
        } else {
           throw new \Exception("Response was not JSON\n" . $page->getContent());
        }
    }

    /**
     * @Given I request the API route :arg1 using the HTTP method POST
     */
    public function iRequestTheApiRouteUsingTheHttpMethodPost($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then I should get the new hotel's ID
     */
    public function iShouldGetTheNewHotelsId()
    {
        throw new PendingException();
    }
}
