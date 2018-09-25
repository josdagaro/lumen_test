<?php

namespace Tests\Features;

use Behat\Behat\Tester\Exception\PendingException,
    Behat\Behat\Context\Context,
    Behat\Behat\Context\SnippetAcceptingContext,
    Behat\MinkExtension\Context\MinkContext,
    Behat\Mink\Driver\GoutteDriver,
    Behat\Mink\Session;

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
    }

    /**
     * @Given I request the API route :path
     */
    public function iRequestTheApiRoute($path)
    {
        // $this->visitPath(self::$baseUrl . $path);
    }

    /**
     * @Then I should get the first :amount hotels
     */
    public function iShouldGetTheFirstHotels($amount)
    {
        throw new PendingException();
    }
}
