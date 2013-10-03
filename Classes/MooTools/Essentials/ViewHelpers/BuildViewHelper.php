<?php
namespace MooTools\Essentials\ViewHelpers;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "MooTools.Essentials".     *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 * of the License, or (at your option) any later version.                 *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;

/**
 * This ViewHelper places a replaceable hash at the desired place on the page,
 * and after rendering is totally complete, this hash is substituted with
 * a reference to the appropriately built JavaScript file
 *
 * @Flow\Scope("singleton")
 */
class BuildViewHelper extends \TYPO3\Fluid\Core\ViewHelper\AbstractViewHelper {

	/**
	 * @Flow\Inject
	 * @var \MooTools\Essentials\Service\BuildService
	 */
	protected $pageBuildService;

	/**
	 * @param string $jsFileName
	 * @throws \TYPO3\Fluid\Core\ViewHelper\Exception\InvalidVariableException
	 * @return string
	 */
	public function render($jsFileName = NULL) {
//		if ($jsFileName === NULL && $this->pageBuildConfiguration->getJsFileName() === NULL) {
//			throw new \TYPO3\Fluid\Core\ViewHelper\Exception\InvalidVariableException('The page build configuration for the MooTools packager does not contain a JavaScript file name, so does not the ViewHelper. However, such a file name is necessary.', 1366642448);
//		} elseif ($jsFileName !== NULL) {
//			$this->pageBuildConfiguration->setJsFileName($jsFileName);
//		}
//		return $this->pageBuildService->getSubstitutionString();
	}

}
?>