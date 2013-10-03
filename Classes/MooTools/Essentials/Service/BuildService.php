<?php
namespace MooTools\Essentials\Service;

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
 * @Flow\Scope("singleton")
 */
class BuildService {

	/**
	 * @var \Packager
	 */
	protected $packager;

	/**
	 * @param \Packager $packager
	 */
	public function setPackager($packager) {
		$this->packager = $packager;
	}

	/**
	 * @return \Packager
	 */
	public function getPackager() {
		return $this->packager;
	}

}
?>