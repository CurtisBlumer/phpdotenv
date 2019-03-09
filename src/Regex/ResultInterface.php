<?php

namespace Dotenv\Regex;

interface ResultInterface
{
    /**
     * Get the success option value.
     *
     * @return \PhpOption\Option
     */
    public function success();

    /**
     * Get the error value, if possible.
     *
     * @return string
     */
    public function getSuccess();

    /**
     * Map over the success value.
     *
     * @param callable $f
     *
     * @return \Dotenv\Regex\Result
     */
    public function mapSuccess(callable $f);

    /**
     * Get the error option value.
     *
     * @return \PhpOption\Option
     */
    public function error();

    /**
     * Get the error value, if possible.
     *
     * @return string
     */
    public function getError();

    /**
     * Map over the error value.
     *
     * @param callable $f
     *
     * @return \Dotenv\Regex\Result
     */
    public function mapError(callable $f);
}
