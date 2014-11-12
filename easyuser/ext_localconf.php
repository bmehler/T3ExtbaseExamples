<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Mehler.' . $_EXTKEY,
	'Userlisting',
	array(
		'Person' => 'list',
		
	),
	// non-cacheable actions
	array(
		'Person' => 'list',
		
	)
);
