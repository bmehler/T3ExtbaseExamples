<?php
namespace Mehler\Simpleproject\Domain\Model;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014 Bernhard Mehler <bernhard.mehler@gmail.com>, 30gradwarm
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * This is a project
 */
class Project extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * This is the project title
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $title = '';

	/**
	 * Project issues
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Mehler\Simpleproject\Domain\Model\Issue>
	 * @cascade remove
	 * @lazy
	 */
	protected $issues = NULL;

	/**
	 * __construct
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all ObjectStorage properties
	 * Do not modify this method!
	 * It will be rewritten on each save in the extension builder
	 * You may modify the constructor of this class instead
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		$this->issues = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Returns the title
	 *
	 * @return string $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the title
	 *
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Adds a Issue
	 *
	 * @param \Mehler\Simpleproject\Domain\Model\Issue $issue
	 * @return void
	 */
	public function addIssue(\Mehler\Simpleproject\Domain\Model\Issue $issue) {
		$this->issues->attach($issue);
	}

	/**
	 * Removes a Issue
	 *
	 * @param \Mehler\Simpleproject\Domain\Model\Issue $issueToRemove The Issue to be removed
	 * @return void
	 */
	public function removeIssue(\Mehler\Simpleproject\Domain\Model\Issue $issueToRemove) {
		$this->issues->detach($issueToRemove);
	}

	/**
	 * Returns the issues
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Mehler\Simpleproject\Domain\Model\Issue> $issues
	 */
	public function getIssues() {
		return $this->issues;
	}

	/**
	 * Sets the issues
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Mehler\Simpleproject\Domain\Model\Issue> $issues
	 * @return void
	 */
	public function setIssues(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $issues) {
		$this->issues = $issues;
	}

}