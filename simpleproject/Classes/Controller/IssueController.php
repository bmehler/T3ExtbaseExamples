<?php
namespace Mehler\Simpleproject\Controller;


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
 * IssueController
 */
class IssueController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {
	
	/**
	 * issueRepository
	 *
	 * @var \Mehler\Simpleproject\Domain\Repository\IssueRepository
	 * @inject
	 */
	protected $issueRepository = NULL;
	
	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$issues = $this->issueRepository->findAll();
		$this->view->assign('issues', $issues);
	}
	
	/**
	 * action newForm
	 *
	 * @param \Mehler\Simpleproject\Domain\Model\Project $project
	 * @param \Mehler\Simpleproject\Domain\Model\Issue $issue
	 */
	public function newFormAction(\Mehler\Simpleproject\Domain\Model\Project $project, 
		\Mehler\Simpleproject\Domain\Model\Issue $issue = NULL ) {
		$this->view->assign('project', $project);
		$this->view->assign('issue', $issue);
	 }
	 
	 /**
	  * action new
	  * 
	  * @param \Mehler\Simpleproject\Domain\Model\Project $project
	  * @param \Mehler\Simpleproject\Domain\Model\Issue $issue
	  */
	public function newAction(\Mehler\Simpleproject\Domain\Model\Project $project,
	\Mehler\Simpleproject\Domain\Model\Issue $issue) {
		$this->issueRepository->add($issue);
		$project->addIssue($issue);
		$this->objectManager->get('Mehler\\Simpleproject\\Domain\\Repository\\ProjectRepository')->update($project);
		$this->redirect('show','Project',NULL, array('project' => $project));
	 }
	 
	 /**
	 * action updateForm
	 *
	 * @param \Mehler\Simpleproject\Domain\Model\Project $project
	 * @param \Mehler\Simpleproject\Domain\Model\Issue $issue
	 */
	public function updateFormAction(\Mehler\Simpleproject\Domain\Model\Project $project, 
		\Mehler\Simpleproject\Domain\Model\Issue $issue ) {
		$this->view->assign('project', $project);
		$this->view->assign('issue', $issue);
	 }
	 
	 /**
	  * action update
	  * 
	  * @param \Mehler\Simpleproject\Domain\Model\Project $project
	  * @param \Mehler\Simpleproject\Domain\Model\Issue $issue
	  */
	public function updateAction(\Mehler\Simpleproject\Domain\Model\Project $project,
	\Mehler\Simpleproject\Domain\Model\Issue $issue) {
		$this->issueRepository->update($issue);
		$project->addIssue($issue);
		$this->redirect('show','Project',NULL, array('project' => $project));
	 }
	 
	 /**
	 * action show
	 *
	 * @param \Mehler\Simpleproject\Domain\Model\Project $project
	 * @param \Mehler\Simpleproject\Domain\Model\Issue $issue
	 */
	public function showAction(\Mehler\Simpleproject\Domain\Model\Project $project, 
		\Mehler\Simpleproject\Domain\Model\Issue $issue) {
		$this->view->assign('project', $project);
		$this->view->assign('issue', $issue);
	 }

}