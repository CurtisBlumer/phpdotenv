<?php

namespace Dotenv;

use Dotenv\Environment\FactoryInterface;
use Dotenv\Exception\InvalidPathException;
use Dotenv\Regex\Regex;
use PhpOption\Option;

/**
 * This is the loader class.
 *
 * It's responsible for loading variables by reading a file from disk and:
 * - stripping comments beginning with a `#`,
 * - parsing lines that look shell variable setters, e.g `export key = value`, `key="value"`.
 * - multiline variable look always start with a " and end with it, e.g: `key="value
 *                                                                             value"`
 */
abstract class AbstractLoader implements LoaderInterface
{

    abstract public function __construct(array $filePaths, FactoryInterface $envFactory, $immutable = false);

    /**
     * Set immutable value.
     *
     * @param bool $immutable
     *
     * @return $this
     */
    abstract public function setImmutable($immutable = false);

    /**
     * Load the environment file from disk.
     *
     * @throws \Dotenv\Exception\InvalidPathException|\Dotenv\Exception\InvalidFileException
     *
     * @return array<string|null>
     */
    abstract public function load();

    /**
     * Directly load the given string.
     *
     * @param string $content
     *
     * @throws \Dotenv\Exception\InvalidFileException
     *
     * @return array<string|null>
     */
    abstract public function loadDirect($content);

    /**
     * Attempt to read the files in order.
     *
     * @param string[] $filePaths
     *
     * @throws \Dotenv\Exception\InvalidPathException
     *
     * @return string[]
     */
    abstract private static function findAndRead(array $filePaths);

    /**
     * Read the given file.
     *
     * @param string $filePath
     *
     * @return \PhpOption\Option
     */
    abstract private static function readFromFile($filePath);

    /**
     * Process the environment variable entries.
     *
     * We'll fill out any nested variables, and acually set the variable using
     * the underlying environment variables instance.
     *
     * @param string[] $entries
     *
     * @throws \Dotenv\Exception\InvalidFileException
     *
     * @return array<string|null>
     */
    abstract private function processEntries(array $entries);

    /**
     * Resolve the nested variables.
     *
     * Look for ${varname} patterns in the variable value and replace with an
     * existing environment variable.
     *
     * @param string|null $value
     *
     * @return string|null
     */
    abstract private function resolveNestedVariables($value = null);

    /**
     * Search the different places for environment variables and return first value found.
     *
     * @param string $name
     *
     * @return string|null
     */
    abstract public function getEnvironmentVariable($name);

    /**
     * Set an environment variable.
     *
     * @param string      $name
     * @param string|null $value
     *
     * @return void
     */
    abstract public function setEnvironmentVariable($name, $value = null);

    /**
     * Clear an environment variable.
     *
     * This method only expects names in normal form.
     *
     * @param string $name
     *
     * @return void
     */
    abstract public function clearEnvironmentVariable($name);

    /**
     * Get the list of environment variables names.
     *
     * @return string[]
     */
    abstract public function getEnvironmentVariableNames();
}
