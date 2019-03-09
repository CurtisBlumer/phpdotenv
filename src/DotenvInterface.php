<?php

namespace Dotenv;

use Dotenv\Environment\DotenvFactory;
use Dotenv\Environment\FactoryInterface;
use Dotenv\Exception\InvalidPathException;

/**
 * This is the dotenv class.
 *
 * It's responsible for loading a `.env` file in the given directory and
 * setting the environment variables.
 */
interface DotenvInterface
{

    /**
     * Create a new dotenv instance.
     *
     * @param \Dotenv\Loader $loader
     *
     * @return void
     */
    public function __construct(Loader $loader);

    /**
     * Create a new dotenv instance.
     *
     * @param string|string[]                           $paths
     * @param string|null                               $file
     * @param \Dotenv\Environment\FactoryInterface|null $envFactory
     *
     * @return \Dotenv\Dotenv
     */
    public static function create($paths, $file = null, FactoryInterface $envFactory = null);

    /**
     * Returns the full paths to the files.
     *
     * @param string[] $paths
     * @param string   $file
     *
     * @return string[]
     */
    private static function getFilePaths(array $paths, $file);

    /**
     * Load environment file in given directory.
     *
     * @throws \Dotenv\Exception\InvalidPathException|\Dotenv\Exception\InvalidFileException
     *
     * @return array<string|null>
     */
    public function load();

    /**
     * Load environment file in given directory, silently failing if it doesn't exist.
     *
     * @throws \Dotenv\Exception\InvalidFileException
     *
     * @return array<string|null>
     */
    public function safeLoad();

    /**
     * Load environment file in given directory.
     *
     * @throws \Dotenv\Exception\InvalidPathException|\Dotenv\Exception\InvalidFileException
     *
     * @return array<string|null>
     */
    public function overload();

    /**
     * Required ensures that the specified variables exist, and returns a new validator object.
     *
     * @param string|string[] $variables
     *
     * @return \Dotenv\Validator
     */
    public function required($variables);

    /**
     * Get the list of environment variables declared inside the 'env' file.
     *
     * @return string[]
     */
    public function getEnvironmentVariableNames();
}
