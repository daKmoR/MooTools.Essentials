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
	protected $buildService;

	/**
	 * @return string
	 */
	public function render() {
		return $this->buildService->build();
	}

}
?>