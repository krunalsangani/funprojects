<?php
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;
    
/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements Context, SnippetAcceptingContext
{
    /**
    * Initializes context.
    *
    * Every scenario gets its own context instance.
    * You can also pass arbitrary arguments to the
    * context constructor through behat.yml.
    */
    public function __construct()
    {
        
    }

    /**
    * @Given /^wait for the page to load$/
    */
    public function waitForThePageToLoad()
    {
        $this->getSession()->wait('5000');
    }

    /**
    * @Given /^wait for the page to loadmore$/
    */
    public function waitForThePageToLoadMore()
    {
        $this->getSession()->wait('250000');
    }

    /**
    * @Given /^I fill hidden field "([^"]*)" with "([^"]*)"$/
    */
    public function iFillHiddenFieldWith($field, $value)
    {
            //$value= "\"" . $value . "\"";
            $value = str_replace("'", '"', $value);
            $javascript = "document.getElementById('".$field . "').value='". $value . "'";
            $this->getSession()->executeScript($javascript);
            var_dump($javascript);
    }

    /**
    * @When I fill invisible field  :arg1 with :arg2
    */
    public function iFillInvisibleFieldWith($field, $value)
    {
            $javascript = "document.getElementById('".$field . "').value='". $value . "'";
            $this->getSession()->executeScript($javascript);
            var_dump($javascript);
    }

    /**
    * @Given /^I Press Submit "([^"]*)" inside "([^"]*)"$/
    */
    public function iPressSubmitInside($btn,$form)
    {
        $javascript = "var testContainer = document.querySelector(\"form[name='" . $form ."']\");";
        $javascript .= "var button = testContainer.querySelector('.btn-primary');button.click();";
        $this->getSession()->executeScript($javascript);
        var_dump($javascript);
    }

     /**
     * @When I filter airline :arg1
     */
    public function IFilterAirline($airline)
    {
        $javascript = "var button = document.querySelector(\"input[value='" . $airline ."']\");";
        $javascript .= "button.click();";
        $this->getSession()->executeScript($javascript);
        var_dump($javascript);
    }

    /**
     * @When I filter for stops :arg1
     */
    public function IFilterForStops($stops)
    {
        $javascript = "var button = document.querySelector(\".custom-control-input[value='". $stops . "']\");";
        $javascript .= "button.click();";
        $this->getSession()->executeScript($javascript);
        var_dump($javascript);
    }
}