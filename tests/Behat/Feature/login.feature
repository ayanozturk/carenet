Feature: Login Functionality

  Scenario: Login page can load
    Given I am on "/login"
    Then I should see "Sign In"
    And I should see "I am a new user"

  Scenario: Register page can load
    Given I am on "/register"
    And I should see "Register"
    And I should see "I already have an account"

  Scenario: Login and registration switch
    Given I am on "/login"
    When I follow "I am a new user"
    Then I should be on "/register"
    When I follow "I already have an account"
    Then I should be on "/login"
