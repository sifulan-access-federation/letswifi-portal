<?php return [
	'auth.service' => 'SimpleSAMLFeideAuth',
	'auth.params' => [
			'autoloadInclude' => dirname( __DIR__ ) . '/simplesamlphp/lib/_autoload.php',
			'authSource' => 'default-sp',
		],
	'realm.selector' => 'getparam', // one of null, getparam or hostname
	'realm.default' => 'demo.eduroam.no', // used when realm.selector = null
	'realm.auth' => [
			'uninett.geteduroam.no' => [
					'userIdAttribute' => 'eduPersonPrincipalName',
					'homeOrgAttribute' => 'schacHomeOrganization',
					'samlIdp' => 'https://idp-test.feide.no',
					'feideHomeOrg' => 'uninett.no',
					'feideHostname' => 'idp-test.feide.no',
				],
			'demo.eduroam.no' => [
					'userIdAttribute' => 'eduPersonPrincipalName',
					'samlIdp' => 'https://idp-test.feide.no',
				],
		],
	'pdo.dsn' => 'sqlite:' . dirname( __DIR__ ) . '/var/letswifi-dev.sqlite',
	'pdo.username' => null,
	'pdo.password' => null,
	'oauth.clients' => (require __DIR__ . DIRECTORY_SEPARATOR . 'letswifi.clients.php') + [
			[
				'clientId' => 'no.fyrkat.oauth', 
				'redirectUris' => ['http://[::1]/callback/'], 
				'scopes' => ['eap-metadata', 'testscope'],
				'refresh' => false,
			],
		],
];
