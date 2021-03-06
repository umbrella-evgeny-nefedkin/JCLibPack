<?php
/**
 * Created by PhpStorm.
 * User: omni
 * Date: 24.07.2018
 * Time: 0:29
 */

namespace Umbrella\JCLibPack\Exception;

/**
 * Thrown when a file was not found.
 *
 * @see \Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException
 */
class FileNotFoundException extends \Exception
{
	/**
	 * @param string $path The path to the file that was not found
	 */
	public function __construct(string $path)
	{
		parent::__construct(sprintf('The file "%s" does not exist', $path));
	}
}
