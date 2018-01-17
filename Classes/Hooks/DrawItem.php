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

/**
 * Hook for implementing a backend preview for the additional informations.
 *
 * @author Klaus Hörmann-Engl <kho@world-direct.at>
 * @package TYPO3
 * @subpackage tx_additionalinformation
 */
class DrawItem implements \TYPO3\CMS\Backend\View\PageLayoutViewDrawItemHookInterface {

  protected $langPrefix = "LLL:EXT:additional_information/Resources/Private/Language/locallang_db.xlf:";

  protected $langLabels;

  /*
   * Preprocesses the preview rendering of a content element
   *
   * @param \TYPO3\CMS\Backend\View\PageLayoutView $parentObject: Calling parent object
   * @param boolean $drawItem: Whether to draw the item using the default functions
   * @param string $headerContent: Header content
   * @param string $itemContent: Item content
   * @param array $row: Record row of tt_content
   * @return void
   */
  public function preProcess(\TYPO3\CMS\Backend\View\PageLayoutView &$parentObject, &$drawItem, &$headerContent, &$itemContent, array &$row) {
    $itemContent = $this->getExtendedView($parentObject, $row) . $itemContent;
  }

  /*
   * Creates a collapsible panel which holds the extended information about the content element.
   * It gets triggered using a button in the header of the content element
   *
   * @param object $parentObject
   * @param array $row
   * @return string $html
   */
  private function getExtendedView($parentObject, $row) {
    $fluidTmpl = GeneralUtility::makeInstance('TYPO3\CMS\Fluid\View\StandaloneView');
    $fluidTmpl->setTemplatePathAndFilename(GeneralUtility::getFileAbsFileName("typo3conf/ext/additional_information/Resources/Private/Templates/ExtendedView.html"));
    $fluidTmpl->assign('row', $row);
    return $parentObject->linkEditContent($fluidTmpl->render(), $row);
  }
}
?>