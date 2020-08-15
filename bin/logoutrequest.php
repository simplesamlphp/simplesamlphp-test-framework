#!/usr/bin/env php
<?php

require_once(dirname(dirname(__FILE__)) . '/vendor/autoload.php');

use RobRichards\XMLSecLibs\XMLSecurityKey;
use SAML2\Compat\ContainerSingleton;
use SAML2\Compat\MockContainer;
use SAML2\XML\saml\EncryptedID;
use SAML2\XML\saml\Issuer;
use SAML2\XML\saml\NameID;
use SAML2\XML\samlp\LogoutRequest;
use SimpleSAML\TestUtils\PEMCertificatesMock;

ContainerSingleton::setContainer(new MockContainer());

$publicKey = PEMCertificatesMock::getPublicKey(XMLSecurityKey::RSA_OAEP_MGF1P, PEMCertificatesMock::SELFSIGNED_PUBLIC_KEY);
$nid = new NameID('very secret');
$eid = EncryptedID::fromUnencryptedElement($nid, $publicKey);

$logoutRequest = new LogoutRequest(
    $eid,
    null,
    null,
    ['SomeSessionIndex1', 'SomeSessionIndex2'],
    new Issuer('TheIssuer')
);

$logoutRequest = $logoutRequest->toXML();

echo strval($logoutRequest->ownerDocument->saveXML());
