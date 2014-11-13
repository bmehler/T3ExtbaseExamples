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
 * ProjectController
 */
class ProjectController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * projectRepository
	 *
	 * @var \Mehler\Simpleproject\Domain\Repository\ProjectRepository
	 * @inject
	 */
	protected $projectRepository = NULL;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$projects = $this->projectRepository->findAll();
		$this->view->assign('projects', $projects);
	}
	
	/**
	 * action newForm
	 *
	 * @param \Mehler\Simpleproject\Domain\Model\Project $project
	 */
	public function newFormAction(\Mehler\Simpleproject\Domain\Model\Project $project = NULL) {
		$this->view->assign('project', $project);
	 }
	 
	 /**
	  * action new
	  * 
	  * @param \Mehler\Simpleproject\Domain\Model\Project $project
	  */
	public function newAction(\Mehler\Simpleproject\Domain\Model\Project $project) {
		$this->projectRepository->add($project);
		$this->redirect('list');
	 }
	 
	 /**
	  * action show
	  *
	  * @param \Mehler\Simpleproject\Domain\Model\Project $project
	  */
	public function showAction(\Mehler\Simpleproject\Domain\Model\Project $project) {
		$this->view->assign('project', $project);
	}
	
	/**
	 * action updateForm
	 *
	 * @param \Mehler\Simpleproject\Domain\Model\Project $project
	 */
	public function updateFormAction(\Mehler\Simpleproject\Domain\Model\Project $project) {
		$this->view->assign('project', $project);
	 }
	 
	  /**
	  * action update
	  * 
	  * @param \Mehler\Simpleproject\Domain\Model\Project $project
	  */
	public function updateAction(\Mehler\Simpleproject\Domain\Model\Project $project) {
		$this->projectRepository->update($project);
		$this->redirect('list');
	 }
	 
	 /**
	 * action deleteConfirm
	 *
	 * @param \Mehler\Simpleproject\Domain\Model\Project $project
	 */
	public function deleteConfirmAction(\Mehler\Simpleproject\Domain\Model\Project $project) {
		$this->view->assign('project', $project);
	 }
	 
	  /**
	  * action delete
	  * 
	  * @param \Mehler\Simpleproject\Domain\Model\Project $project
	  */
	public function deleteAction(\Mehler\Simpleproject\Domain\Model\Project $project) {
		$this->projectRepository->remove($project);
		$this->redirect('list');
	 }
	
	 

}