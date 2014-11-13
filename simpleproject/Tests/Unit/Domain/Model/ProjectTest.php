<?php

namespace Mehler\Simpleproject\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Bernhard Mehler <bernhard.mehler@gmail.com>, 30gradwarm
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class \Mehler\Simpleproject\Domain\Model\Project.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Bernhard Mehler <bernhard.mehler@gmail.com>
 */
class ProjectTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Mehler\Simpleproject\Domain\Model\Project
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Mehler\Simpleproject\Domain\Model\Project();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getTitleReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getTitle()
		);
	}

	/**
	 * @test
	 */
	public function setTitleForStringSetsTitle() {
		$this->subject->setTitle('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'title',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getIssuesReturnsInitialValueForIssue() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getIssues()
		);
	}

	/**
	 * @test
	 */
	public function setIssuesForObjectStorageContainingIssueSetsIssues() {
		$issue = new \Mehler\Simpleproject\Domain\Model\Issue();
		$objectStorageHoldingExactlyOneIssues = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneIssues->attach($issue);
		$this->subject->setIssues($objectStorageHoldingExactlyOneIssues);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneIssues,
			'issues',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addIssueToObjectStorageHoldingIssues() {
		$issue = new \Mehler\Simpleproject\Domain\Model\Issue();
		$issuesObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$issuesObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($issue));
		$this->inject($this->subject, 'issues', $issuesObjectStorageMock);

		$this->subject->addIssue($issue);
	}

	/**
	 * @test
	 */
	public function removeIssueFromObjectStorageHoldingIssues() {
		$issue = new \Mehler\Simpleproject\Domain\Model\Issue();
		$issuesObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$issuesObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($issue));
		$this->inject($this->subject, 'issues', $issuesObjectStorageMock);

		$this->subject->removeIssue($issue);

	}
}
