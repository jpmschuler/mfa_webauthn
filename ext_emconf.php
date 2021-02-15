<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'MFA Security Tokens',
    'description' => 'TYPO3 MFA WebAuthn support for FIDO2 and U2F security tokens',
    'state' => 'beta',
    'author' => 'Benjamin Franzke',
    'author_email' => 'benjaminfranzke@gmail.com',
    'version' => '0.0.1',
    'constraints' => [
        'depends' => [
            'typo3' => '11.1.0-11.1.99',
        ],
    ],
];
