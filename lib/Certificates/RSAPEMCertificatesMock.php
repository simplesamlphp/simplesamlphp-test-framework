<?php

declare(strict_types=1);

namespace SimpleSAML\TestUtils\Certificates;

use Exception;
use RobRichards\XMLSecLibs\XMLSecurityKey;

/**
 * Class \SimpleSAML\TestUtils\CertificatesMock
 */
class RSAPEMCertificatesMock
{
    public const PUBLIC_KEY_PATTERN = '/^-----BEGIN CERTIFICATE-----([^-]*)^-----END CERTIFICATE-----/m';
    public const PRIVATE_KEY_PATTERN = '/^-----BEGIN RSA PRIVATE KEY-----([^-]*)^-----END RSA PRIVATE KEY-----/m';
    public const CERTIFICATE_DIR = '/certificates/rsa-pem/';

    public const PUBLIC_KEY = 'signed.simplesamlphp.org.crt';
    public const PRIVATE_KEY = 'signed.simplesamlphp.org_nopasswd.key';
    public const PRIVATE_KEY_PROTECTED = 'signed.simplesamlphp.org.key';
    public const OTHER_PUBLIC_KEY = 'other.simplesamlphp.org.crt';
    public const OTHER_PRIVATE_KEY = 'other.simplesamlphp.org_nopasswd.key';
    public const OTHER_PRIVATE_KEY_PROTECTED = 'other.simplesamlphp.org.key';
    public const SELFSIGNED_PUBLIC_KEY = 'selfsigned.simplesamlphp.org.crt';
    public const SELFSIGNED_PRIVATE_KEY = 'selfsigned.simplesamlphp.org_nopasswd.key';
    public const SELFSIGNED_PRIVATE_KEY_PROTECTED = 'selfsigned.simplesamlphp.org.key';
    public const BROKEN_PUBLIC_KEY = 'broken.simplesamlphp.org.crt';
    public const BROKEN_PRIVATE_KEY = 'broken.simplesamlphp.org.key';
    public const CORRUPTED_PUBLIC_KEY = 'corrupted.simplesamlphp.org.crt';
    public const CORRUPTED_PRIVATE_KEY = 'corrupted.simplesamlphp.org.key';

    /**
     * @param string $key The PEM-encoded key
     * @param bool $private
     * @return string The stripped key
     */
    private static function stripHeaders(string $key, bool $private) {
        if ($private === false && !preg_match(self::PUBLIC_KEY_PATTERN, $key, $matches)) {
            throw new Exception('Could not find PEM encoded certificate.');
        } else if ($private === true && !preg_match(self::PRIVATE_KEY_PATTERN, $key, $matches)) {
            throw new Exception('Could not find PEM encoded key.');
        }

        return preg_replace('/\s+/', '', $matches[1]);
    }


    /**
     * @param string $file The file we should load
     * @return string The file contents
     */
    public static function loadPlainCertificateFile(string $file) {
        return file_get_contents(dirname(dirname(dirname(__FILE__))) . self::CERTIFICATE_DIR . $file);
    }


    /**
     * @param string $algorithm
     * @param string The file to use
     * @return \RobRichards\XMLSecLibs\XMLSecurityKey
     */
    public static function getPublicKey(string $algorithm, string $file): XMLSecurityKey
    {
        $publicKey = new XMLSecurityKey($algorithm, ['type' => 'public']);
        $publicKey->loadKey(self::getPlainPublicKey($file));
        return $publicKey;
    }


    /**
     * @param string $algorithm
     * @param string The file to use
     * @return \RobRichards\XMLSecLibs\XMLSecurityKey
     */
    public static function getPrivateKey(string $algorithm, string $file): XMLSecurityKey
    {
        $privateKey = new XMLSecurityKey($algorithm, ['type' => 'private']);
        $privateKey->loadKey(self::getPlainPrivateKey($file));
        return $privateKey;
    }


    /**
     * @param string $file The file to use
     * @return string
     */
    public static function getPlainPublicKey(string $file = self::PUBLIC_KEY): string
    {
        return self::loadPlainCertificateFile($file);
    }


    /**
     * @param string $file The file to use
     * @return string
     */
    public static function getPlainPrivateKey(string $file = self::PRIVATE_KEY): string
    {
        return self::loadPlainCertificateFile($file);
    }


    /**
     * @param string $file The file to use
     * @return string
     */
    public static function getPlainPublicKeyContents(string $file = self::PUBLIC_KEY): string
    {
        return self::stripHeaders(self::loadPlainCertificateFile($file), false);
    }


    /**
     * @param string $file The file to use
     * @return string
     */
    public static function getPlainPrivateKeyContents(string $file = self::PRIVATE_KEY): string
    {
        return self::stripHeaders(self::loadPlainCertificateFile($file), true);
    }
}
