<?php

namespace Dotenv;

use Dotenv\Exception\ValidationException;

/**
 * This is the validator interface.
 *
 * It's responsible for applying validations against a number of variables.
 */
interface ValidatorInterface
{

    /**
     * Create a new validator instance.
     *
     * @param string[]       $variables
     * @param \Dotenv\Loader $loader
     *
     * @throws \Dotenv\Exception\ValidationException
     *
     * @return void
     */
    public function __construct(array $variables, Loader $loader);

    /**
     * Assert that each variable is not empty.
     *
     * @throws \Dotenv\Exception\ValidationException
     *
     * @return \Dotenv\Validator
     */
    public function notEmpty();

    /**
     * Assert that each specified variable is an integer.
     *
     * @throws \Dotenv\Exception\ValidationException
     *
     * @return \Dotenv\Validator
     */
    public function isInteger();

    /**
     * Assert that each specified variable is a boolean.
     *
     * @throws \Dotenv\Exception\ValidationException
     *
     * @return \Dotenv\Validator
     */
    public function isBoolean();

    /**
     * Assert that each variable is amongst the given choices.
     *
     * @param string[] $choices
     *
     * @throws \Dotenv\Exception\ValidationException
     *
     * @return \Dotenv\Validator
     */
    public function allowedValues(array $choices);

}
