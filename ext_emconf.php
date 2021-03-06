<?php

/***************************************************************
 * Extension Manager/Repository config file for ext: "additional_information"
 *
 * Auto generated by Extension Builder 2018-01-15
 *
 * Manual updates:
 * Only the data in the array - anything else is removed by next write.
 * "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = [
    'title' => 'Additional Information',
    'description' => 'The extension provides additional information on a tt_content element in the backend. For backend editors it can be very annoying to open up eacy tt_content element to show the settings concerning space before or after as well as the layout. This extension shows an additional collapsible panel in the backend attached to each element. It can be collapsed to show these informations, without reloading the page properties page.',
    'category' => 'be',
    'author' => 'Klaus Hörmann-Engl',
    'author_email' => 'klaus.hoermann-engl@world-direct.at',
    'state' => 'alpha',
    'internal' => '',
    'uploadfolder' => '0',
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'version' => '1.0.3',
    'constraints' => [
        'depends' => [
            'typo3' => '8.7.0-8.7.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
