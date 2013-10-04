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
use TYPO3\Flow\Resource\Resource;
use TYPO3\Flow\Utility\Files;

/**
 * @Flow\Scope("singleton")
 */
class BuildService {

	/**
	 * @var \Packager
	 */
	protected $packager;

	/**
	 * @var \TYPO3\Fluid\ViewHelpers\Uri\ResourceViewHelper
	 * @Flow\Inject
	 */
	protected $resourceViewHelper;

	/**
	 * @var array
	 */
	protected $settings;

	/**
	 * @var array
	 */
	protected $fullRequirement = NULL;

	/**
	 * @var array
	 */
	protected $require = array();

	/**
	 * @param array $settings
	 * @return void
	 */
	public function injectSettings(array $settings) {
		$this->settings = $settings;
	}

	public function __construct() {
		require_once FLOW_PATH_PACKAGES . 'Application/MooTools.Essentials/Resources/Private/Php/Packager/packager.php';
		$this->packager = new \Packager(array());
	}

	/**
	 * return String
	 */
	public function build() {
		foreach ($this->settings['Manifests'] as $manifest) {
			$this->getPackager()->add_package($manifest);
		}

		$html = '';
		foreach($this->getFullRequirement() as $requirement) {
			$path = $this->resourceViewHelper->render($this->getPackager()->get_file_path($requirement), 'MooTools.Essentials');
			$html .= '<script type="text/javascript" src="' . $path . '"></script>' . "\n";
		}

		return $html;
	}

	/**
	 * @param mixed $require the stuff to require array or string
	 * @return bool
	 */
	public function addRequire($require) {
		if (is_array($require) || is_string($require)) {
			if (is_array($require)) {
				$this->setRequire(array_merge($this->getRequire(), $require));
			}
			if (is_string($require)) {
				$this->require[] = $require;
				$this->require = array_unique($this->require);
			}

			$this->setFullRequirement(NULL);
			return TRUE;
		}
		return FALSE;
	}

	/**
	 * @param array $fullRequirement
	 */
	public function setFullRequirement($fullRequirement) {
		$this->fullRequirement = $fullRequirement;
	}

	/**
	 * @return array
	 */
	public function getFullRequirement() {
		if ($this->fullRequirement === NULL && count($this->getRequire()) > 0) {
			$this->fullRequirement = $this->getPackager()->complete_files($this->getPackager()->components_to_files($this->getRequire()));
		}
		return $this->fullRequirement;
	}

	/**
	 * @param $require
	 */
	public function setRequire($require) {
		$this->require = $require;
		$this->require = array_unique($this->require);
	}

	/**
	 * @return array
	 */
	public function getRequire() {
		return $this->require;
	}

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