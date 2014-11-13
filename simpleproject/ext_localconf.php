<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Mehler.' . $_EXTKEY,
	'Projectlisting',
	array(
		'Project' => 'list, newForm, new, show, updateForm, update, deleteConfirm, delete',
		'Issue' => 'newForm, new, show, updateForm, update, deleteConfirm, delete',
		
	),
	// non-cacheable actions
	array(
		'Project' => 'list, newForm, new, show, updateForm, update, deleteConfirm, delete',
		'Issue' => 'newForm, new, show, updateForm, update, deleteConfirm, delete'
		
	)
);
