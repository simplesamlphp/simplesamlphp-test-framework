#!/usr/bin/env php
<?php

require_once(dirname(dirname(__FILE__)) . '/vendor/autoload.php');

use RobRichards\XMLSecLibs\XMLSecurityKey;
use SAML2\Compat\ContainerSingleton;
use SAML2\Compat\MockContainer;
use SAML2\XML\saml\EncryptedID;
use SAML2\XML\saml\Issuer;
use SAML2\XML\saml\NameID;
use SAML2\XML\saml\Subject;
use SAML2\XML\samlp\AuthnRequest;
use SimpleSAML\TestUtils\PEMCertificatesMock;

ContainerSingleton::setContainer(new MockContainer());

$publicKey = PEMCertificatesMock::getPublicKey(XMLSecurityKey::RSA_SHA256, PEMCertificatesMock::SELFSIGNED_PUBLIC_KEY);
$nid = new NameID('very secret');
$eid = EncryptedID::fromUnencryptedElement($nid, $publicKey);

$issuer = new Issuer('https://gateway.example.org/saml20/sp/metadata');
$subject = new Subject($eid);

$authnRequest = new AuthnRequest(
    null,
    $subject,
    null,
    null,
    null,
    null,
    null,
    null,
    null,
    null,
    $issuer,
    "123",
    null,
    'https://tiqr.example.org/idp/profile/saml2/Redirect/SSO'
);

$authnRequest = $authnRequest->toXML();

echo strval($authnRequest->ownerDocument->saveXML());
