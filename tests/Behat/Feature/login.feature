Feature: Login Functionality

  Scenario: Unauthenticated user is redirected to login page
    Given I am on "/"
    Then I should be on "/login"
    And I should see "Sign In"