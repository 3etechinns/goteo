<?php
/*
 * This file is part of the Goteo Package.
 *
 * (c) Platoniq y Fundación Goteo <fundacion@goteo.org>
 *
 * For the full copyright and license information, please view the README.md
 * and LICENSE files that was distributed with this source code.
 */

namespace Goteo\Util\MatcherProcessor;

use Goteo\Model\Matcher;
use Goteo\Model\Project;
use Goteo\Model\Invest;
use Goteo\Payment\Method\PaymentMethodInterface;

interface MatcherProcessorInterface {

    /**
     * Returns the unique ID for this processor
     * @return string ID
     */
    static public function getId();

    /**
     * Returns a friendly name for this processor
     * @return string name
     */
    static public function getName();

    /**
     * Returns a human understandable full description for the rules of this processor
     * @return string name
     */
    static public function getDesc();

    /**
     * Checks if the processor handles a $matcher campaign
     * @return bool true | false
     */
    static public function is(Matcher $matcher);

    /**
     * Creates and instance of the processor for the matcher
     * @return bool MatcherProcessorInterface class or Exception
     */
    static public function create(Matcher $matcher);

    /**
     * Array of variable_name => description_text of the custom vars used
     * @return array
     */
    static public function getVarLabels();

    /**
     * Gets the current custom vars for this processor (defaults or from Matcher model if exists)
     * @return array custom vars
     */
    public function getVars();

    /**
     * Sets the matcher
     * @param Matcher $matcher [description]
     */
    public function setMatcher(Matcher $matcher);

    /**
     * Gets the matcher
     * @return Matcher
     */
    public function getMatcher();

    /**
     * Sets the context project
     * @param Project $project
     */
    public function setProject(Project $project);

    /**
     * Gets the context project
     * @return Project
     */
    public function getProject();

    /**
     * Sets the context invest
     * @param Invest $invest
     */
    public function setInvest(Invest $invest);

    /**
     * Gets the context invest
     * @return Invest
     */
    public function getInvest();

    /**
     * Sets the context payment method
     * @param PaymentMethodInterface $method
     */
    public function setMethod(PaymentMethodInterface $method);

    /**
     * Gets the context payment method
     * @return PaymentMethodInterface
     */
    public function getMethod();

    /**
     * Returns the total amount to be added
     * @param string $error reason why is zero (if zero)
     * @return int amount to add in form of extra invests
     */
    public function getAmount(&$error = '');

    /**
     * Returns a list of additional invests corresponding to the totalAmount
     * @return array lists of invests
     */
    public function getInvests();

}
