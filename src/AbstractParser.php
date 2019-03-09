<?php

namespace Dotenv;

use Dotenv\Exception\InvalidFileException;

abstract class AbstractParser implements ParserInterface
{

    /**
     * Parse the given environment variable entry into a name and value.
     *
     * @param string $entry
     *
     * @throws \Dotenv\Exception\InvalidFileException
     *
     * @return array
     */
    abstract public static function parse($entry);

    /**
     * Split the compound string into parts.
     *
     * @param string $line
     *
     * @throws \Dotenv\Exception\InvalidFileException
     *
     * @return array
     */
    abstract private static function splitStringIntoParts($line);

    /**
     * Strips quotes and the optional leading "export " from the variable name.
     *
     * @param string $name
     *
     * @throws \Dotenv\Exception\InvalidFileException
     *
     * @return string
     */
    abstract private static function parseName($name);

    /**
     * Is the given variable name valid?
     *
     * @param string $name
     *
     * @return bool
     */
    abstract private static function isValidName($name);

    /**
     * Strips quotes and comments from the environment variable value.
     *
     * @param string|null $value
     *
     * @throws \Dotenv\Exception\InvalidFileException
     *
     * @return string|null
     */
    abstract private static function parseValue($value);

    /**
     * Generate a friendly error message.
     *
     * @param string $cause
     * @param string $subject
     *
     * @return string
     */
    abstract private static function getErrorMessage($cause, $subject);

}
