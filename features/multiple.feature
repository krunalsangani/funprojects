Feature: Check for multiple logins

@javascript
Scenario: I am able to navigate to home page

Given I am on "/about"
And I follow "Join NEMA"
And wait for the page to load
Then I should see "Joining NEMA"
#this is a comment change
