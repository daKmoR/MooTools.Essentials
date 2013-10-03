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
 * A ViewHelper which registers its requirements in order to build the appropriate JavaScript
 */
class IfLoadedViewHelper extends \TYPO3\Fluid\Core\ViewHelper\AbstractConditionViewHelper {

	/**
	 * @Flow\Inject
	 * @var \MooTools\Essentials\Service\BuildService
	 */
	protected $pageBuildService;

	/**
	 * @param array $condition A JSON string what modules to require
	 * @return string
	 */
	public function render($condition = array()) {

		var_dump($this->pageBuildService->getToBuildComponents());
		var_dump($condition);
		if ($condition) {
			return $this->renderThenChild();
		} else {
			return $this->renderElseChild();
		}
	}

}
?>