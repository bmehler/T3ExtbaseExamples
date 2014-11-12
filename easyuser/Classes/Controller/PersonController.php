<?php
namespace Mehler\Easyuser\Controller;


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
 * PersonController
 */
class PersonController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * personRepository
	 *
	 * @var \Mehler\Easyuser\Domain\Repository\PersonRepository
	 * @inject
	 */
	protected $personRepository;    
    
    /**
	 * list action
	 *
	 * @return void
	 */
	public function listAction() {		    
        
        /* Gets the assigned user group of a certain user - findByUid */
        
        $userByUid = $this->objectManager->get(
            'TYPO3\\CMS\\Extbase\\Domain\\Repository\\FrontendUserRepository'
        )->findByUid(1);          
        
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($userByUid->getUsergroup());	
        
        /* Gets the assigned user group of a certain user - findByUsername */
        
        $userByName = $this->objectManager->get(
            'TYPO3\\CMS\\Extbase\\Domain\\Repository\\FrontendUserRepository'
        )->findByUsername('bernhardmehler');          
        
        foreach($userByName as $user) {
            $userDetails = $user->getUsergroup();
        }
        
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($userDetails);	
        
        /* Gets the currently logged in user - findByUid */
        
        $userLoggedIn = $this->objectManager->get(
            'TYPO3\\CMS\\Extbase\\Domain\\Repository\\FrontendUserRepository'
        )->findByUid($GLOBALS['TSFE']->fe_user->user['uid']);      
        
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($userLoggedIn);	
	}

}