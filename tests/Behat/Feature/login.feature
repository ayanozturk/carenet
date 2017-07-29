Feature: Login Functionality

  Scenario: Unauthenticated user is redirected to login page
    Given I am on "/"
    Then I should be on "/user/login"