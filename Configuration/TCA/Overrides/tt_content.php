<?php

// ---------------------------------------------------------------------------------------------------------------------
// Icon Text Module von TT-Content
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(
	array(
		'LLL:EXT:ce_marker/Resources/Private/Language/locallang_tca.xlf:tx_ce_marker.title',
		'ce_marker',
		'ps14-content-marker'
	),
	'CType',
	'ce_marker'
);

$GLOBALS['TCA']['tt_content']['types']['ce_marker'] = [
	'showitem' => '
			--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.general;general,
			--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.header;xoHeader, tx_xo_file, tx_xo_elements,
		--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:tabs.appearance,
			--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.frames;frames,
		--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:tabs.access,
			--palette--;;hidden,
			--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.visibility;visibility,
			--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.access;access,
		--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:tabs.extended
	',
];

$GLOBALS['TCA']['tt_content']['types']['ce_marker']['columnsOverrides']['tx_xo_file'] = [
	'l10n_mode' => 'exclude',
	'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
		'tx_xo_file',
		[
			'appearance' => [
				'collapseAll' => 1,
				'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:media.addFileReference'
			],
			'overrideChildTca' => [
				'types' => [
					'0' => [
						'showitem' => '
									--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
									--palette--;;filePalette'
					],
					\TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
						'showitem' => '
									--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
									--palette--;;filePalette'
					],
				],
				'columns' => [
					'crop' => [
						'config' => [
							'cropVariants' => [
								'mobile' => [
									'title' => 'LLL:EXT:xo/Resources/Private/Language/locallang_tca.xlf:tx_xo_crop_variant.mobile',
									'allowedAspectRatios' => [
										'16_9' => [
											'title' => 'LLL:EXT:core/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.16_9',
											'value' => 16 / 9
										],
										'4_3' => [
											'title' => 'LLL:EXT:core/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.4_3',
											'value' => 4 / 3
										],
										'NaN' => [
											'title' => 'LLL:EXT:core/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.free',
											'value' => 0.0
										],
									],
									'selectedRatio' => '16_9',
								],
								'desktop' => [
									'title' => 'LLL:EXT:xo/Resources/Private/Language/locallang_tca.xlf:tx_xo_crop_variant.desktop',
									'allowedAspectRatios' => [
										'16_9' => [
											'title' => 'LLL:EXT:core/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.16_9',
											'value' => 16 / 9
										],
										'4_3' => [
											'title' => 'LLL:EXT:core/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.4_3',
											'value' => 4 / 3
										],
										'NaN' => [
											'title' => 'LLL:EXT:core/Resources/Private/Language/locallang_wizards.xlf:imwizard.ratio.free',
											'value' => 0.0
										],
									],
									'selectedRatio' => '4_3',
								],
							]
						]
					]
				]
			],
			'maxitems' => 1
		],
		$GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
	),
];

$GLOBALS['TCA']['tt_content']['types']['ce_marker']['columnsOverrides']['tx_xo_elements']['config']['overrideChildTca'] = [
	'columns' => [
		'record_type' => [
			'config' => [
				'items' => [
					['LLL:EXT:ce_accordion/Resources/Private/Language/locallang_tca.xlf:tx_xo_domain_model_elements.record_type.default', 'ce_marker_default'],
				],
				'default' => 'ce_marker_default'
			]
		]
	],
	'types' => [
		'ce_marker_default' => [
			'showitem' => '
				l10n_diffsource, record_type, --palette--;;header, description,
				--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:tabs.access,
				--palette--;;visibility,
				--palette--;;access',
		],
	]
];