<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function($extKey)
    {
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($extKey, 'Configuration/TypoScript', 'Additional Information');
    },
    $_EXTKEY
);

// Include hook for backend page preview of the additional information
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['tt_content_drawItem'][] = 'EXT:additional_information/Classes/Hooks/DrawItem.php:WorldDirect\\AdditionalInformation\\Hooks\\DrawItem';

// Include hook for extending the backend content element action buttons
$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['GLOBAL']['recStatInfoHooks']['showExtendedViewButton'] = 'EXT:additional_information/Classes/Hooks/StatsInformation.php:&WorldDirect\\AdditionalInformation\\Hooks\\StatsInformation->showExtendedViewButton';
