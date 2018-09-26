Feature: Hotel collection

    As an API client
    In order to get a hotel collection
    I need to request an API service

    Scenario: Getting hotel collection with pagination in a correct way
        Given I request the API route "/hotels"
        Then I should get the first "10" hotels

    Scenario: Creating a hotel in a correct way
        Given I request the API route "/hotels" using the HTTP method POST
        Then I should get the new hotel's ID
