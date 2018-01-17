<?php
namespace WorldDirect\AdditionalInformation\Hooks;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use TYPO3\CMS\Core\Utility\DebugUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;
use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Core\Imaging\Icon;
use TYPO3\CMS\Core\Imaging\IconFactory;

/**
 * Hook for implementing a icon to trigger the extended view.
 *
 * @author Klaus Hörmann-Engl <kho@world-direct.at>
 * @package TYPO3
 * @subpackage tx_additionalinformation
 */
class StatsInformation {

  protected $langPrefix = "LLL:EXT:additional_information/Resources/Private/Language/locallang_db.xlf:";

  /**
   * Function returns the html for the show extended view button in the TYPO3 backend
   *
   */
  function showExtendedViewButton($params, $ref) {
    $html = "";

    if ($params[0] == "tt_content" && GeneralUtility::_GP('M') == "web_layout") {

      // TODO: Add only when in "page" module (not in list module)

      $iconFactory = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconFactory::class);

      // Generate the button
      $html =
        '<a class="btn btn-default" ' .
        'href="#" ' .
        'data-toggle="collapse" ' .
        'data-target="#collapse' . $params[1] . '" ' .
        'aria-expanded="false" ' .
        'title="' . LocalizationUtility::translate($this->langPrefix . "tt_content.backend.showExtendedInfos", "additional_information") . '" ' .
        'aria-controls="collapse' . $params[1] . '">';

      // Add icon
      $html .=
        $iconFactory->getIcon('actions-document-info', Icon::SIZE_SMALL)->render();

      // Close the button
      $html .=
        '</a>';

      // Sourrounding divs with classes
      $html =
        '<div class="t3-page-ce-header-icons-left">' .
        '<div class="btn-toolbar">' .
        '<div class="btn-group btn-group-sm" role="group">' .
        $html .
        '</div>' .
        '</div>' .
        '</div>';
    }

    return $html;
  }
}
?>
