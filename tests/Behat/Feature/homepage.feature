Feature: Homepage

  Scenario: Homepage displays welcome message
    Given I am on "/"
    Then I should see "Expert Network"
    And I should see "Welcome"
    And I should see "Login"