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
class ScriptViewHelper extends \TYPO3\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper {

	protected $tagName = 'script';

	/**
	 * @Flow\Inject
	 * @var \MooTools\Essentials\Service\BuildService
	 */
	protected $buildService;

	/**
	 * Initialize arguments
	 *
	 * @return void
	 * @api
	 */
	public function initializeArguments() {
		$this->registerUniversalTagAttributes();
	}

	/**
	 * @param array $require A JSON string what modules to require
	 * @return string
	 */
	public function render($require = array()) {
//		foreach ($require as $requiredComponent) {
//			$this->buildService->getPackager()->$requiredComponent);
//		}

		$this->tag->setContent($this->renderChildren());
		$this->tag->forceClosingTag(TRUE);

		return $this->tag->hasContent() ? $this->tag->render() : '';
	}

}
?>