<?php

declare(strict_types=1);

namespace SimpleSAML\TestUtils;

use PHPUnit\Framework\TestCase;
use ReflectionClass;
use SimpleSAML\Configuration;

/**
 * A test case that provides a certificate directory with public and private
 * keys.
 *
 * @package SimpleSAMLphp
 */
class SigningTestCase extends TestCase
{
    protected Configuration $config;

    protected string $root_directory;

    protected string $cert_directory = 'certificates/rsa-pem';

    protected string $ca_private_key_file = 'simplesamlphp.org-ca_nopasswd.key';

    protected string $ca_certificate_file = 'simplesamlphp.org-ca.crt';

    protected string $good_private_key_file = 'signed.simplesamlphp.org_nopasswd.key';

    protected string $good_certificate_file = 'signed.simplesamlphp.org.crt';

    // openssl genrsa -out example.org-ca.key 1024
    protected string $ca_private_key;

    // openssl req -key example.org-ca.key -new -x509 -days 36500 -out example.org-ca.crt
    protected string $ca_certificate;

    // openssl genrsa -out signed.example.org.key 1024
    protected string $good_private_key;

    // openssl req -key signed.example.org.key -new -out signed.example.org.crt
    protected string $good_certificate;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->root_directory = dirname(dirname(__FILE__));
        $base = $this->root_directory . DIRECTORY_SEPARATOR . $this->cert_directory;
        $this->ca_private_key = file_get_contents($base . DIRECTORY_SEPARATOR . $this->ca_private_key_file);
        $this->ca_certificate = file_get_contents($base . DIRECTORY_SEPARATOR . $this->ca_certificate_file);
        $this->good_private_key = file_get_contents($base . DIRECTORY_SEPARATOR . $this->good_private_key_file);
        $this->good_certificate = file_get_contents($base . DIRECTORY_SEPARATOR . $this->good_certificate_file);
    }


    /**
     */
    public function getCertDirContent(): array
    {
        return [
            $this->ca_private_key_file => $this->ca_private_key,
            $this->ca_certificate_file => $this->ca_certificate,
            $this->good_private_key_file => $this->good_private_key,
            $this->good_certificate_file => $this->good_certificate,
        ];
    }


    /**
     */
    public function setUp(): void
    {
        $this->config = Configuration::loadFromArray([
            'certdir' => $this->cert_directory,
        ], '[ARRAY]', 'simplesaml');
    }


    /**
     */
    public function tearDown(): void
    {
        $this->clearInstance($this->config, Configuration::class, []);
    }


    /**
     * @param \SimpleSAML\Configuration $service
     * @param class-string $className
     * @param mixed|null $value
     */
    protected function clearInstance(Configuration $service, string $className, $value = null): void
    {
        $reflectedClass = new ReflectionClass($className);
        $reflectedInstance = $reflectedClass->getProperty('instance');
        $reflectedInstance->setAccessible(true);
        $reflectedInstance->setValue($service, $value);
        $reflectedInstance->setAccessible(false);
    }
}
