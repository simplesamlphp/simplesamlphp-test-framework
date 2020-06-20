<?php

declare(strict_types=1);

namespace SimpleSAML\TestUtils;

use RobRichards\XMLSecLibs\XMLSecurityKey;

/**
 * Class \SimpleSAML\TestUtils\CertificatesMock
 */
class CertificatesMock
{
    public const CERTIFICATE_PATTERN = '/^-----BEGIN CERTIFICATE-----([^-]*)^-----END CERTIFICATE-----/m';

    /** Contents of ./certificates/pem/signed.example.org.crt */
    public const PUBLIC_KEY_PEM = '-----BEGIN CERTIFICATE-----
MIICqDCCAhECAQIwDQYJKoZIhvcNAQELBQAwgZgxCzAJBgNVBAYTAlVTMQ8wDQYD
VQQIDAZIYXdhaWkxETAPBgNVBAcMCEhvbm9sdWx1MRYwFAYDVQQKDA1TaW1wbGVT
QU1McGhwMRMwEQYDVQQLDApEZXZlbG9wZXJzMRQwEgYDVQQDDAtleGFtcGxlLm9y
ZzEiMCAGCSqGSIb3DQEJARYTbm9yZXBseUBleGFtcGxlLm9yZzAeFw0xOTA3MjAw
NzU4MDFaFw0zOTA3MTUwNzU4MDFaMIGfMQswCQYDVQQGEwJVUzEPMA0GA1UECAwG
SGF3YWlpMREwDwYDVQQHDAhIb25vbHVsdTEWMBQGA1UECgwNU2ltcGxlU0FNTHBo
cDETMBEGA1UECwwKRGV2ZWxvcGVyczEbMBkGA1UEAwwSc2lnbmVkLmV4YW1wbGUu
b3JnMSIwIAYJKoZIhvcNAQkBFhNub3JlcGx5QGV4YW1wbGUub3JnMIGfMA0GCSqG
SIb3DQEBAQUAA4GNADCBiQKBgQCcYmwkO1lHel3sFpQtVnCQInGac8MYVWiXKrxW
KsWAqrcsRnjGvIMQU5oz2KNhensx7C2Baa3yOmhyfoGEIoMnntQO6gqYAVskuAKG
JhUzpPP1qP4ZV/FjZZ224u9+25gOkZO3Hr5PVCNBPloc+K8ppjRoUbwxFos8i9xo
u5v6xQIDAQABMA0GCSqGSIb3DQEBCwUAA4GBAD5jvsrGp0rv33XwbfWwhTNSBzwa
61qr1fs1OjTfN2DJf/3i46uywHMZOfkDGstxmoqS7DcpNhMblv4eQDjYBADI1a6O
5atAbtdu3D9qN67Ucc20xwQdZ0fBO9prH6pl6dm4zeF0pboZRi1s1GbxgixCPT5U
QWvDnL7YM/pW8ttA
-----END CERTIFICATE-----';

    /** Contents of ./certificates/pem/signed.example.org_nopasswd.key */
    public const PRIVATE_KEY_PEM = '-----BEGIN RSA PRIVATE KEY-----
MIICdwIBADANBgkqhkiG9w0BAQEFAASCAmEwggJdAgEAAoGBAJxibCQ7WUd6XewW
lC1WcJAicZpzwxhVaJcqvFYqxYCqtyxGeMa8gxBTmjPYo2F6ezHsLYFprfI6aHJ+
gYQigyee1A7qCpgBWyS4AoYmFTOk8/Wo/hlX8WNlnbbi737bmA6Rk7cevk9UI0E+
Whz4rymmNGhRvDEWizyL3Gi7m/rFAgMBAAECgYB3V+0rYVdq4wmWSEzgpJzWglKs
CjgS8+sTofuEzrNW0/FiCo3VLLvg08xUULmuhGhL2u+HWXzz5HsdFUoF6sinXHvZ
SwOq1nsCRw9ZVJp/xyCjFgOp7rmfOs+FcTkeR7aEcBdJzUsvaaIC+a2W5sRaUaPK
CUmQVxdfq1LA+oL4QQJBAMh4/XaZn21E5LLFg4ybHkKY1+axR2EcJcVlmLaGKifk
dGUG1OwWtcRHL6+a6+doM28vt5N+CpFtnTRv/rMrBh0CQQDHs0CBsls5BKYIfENu
eLhUoDSgGq3QnBuGFHiLB8ikuxW2b4jGBf4rFpdWisZK2CuCbKuuNAchLArrgv7q
VYbJAkEAljVZrRDETOpO9chanfLoRHwjYT45voCJqJNMTo7ObV+W+s+YoGEPxsaT
618IHTaNO2UkhsXtAzR/kvfLftHg3QJBAI00TjRm7OHQS6ZMV1HRwmT0MsHSm3ya
JUwVRXbpNhJkxuGM0+VRb3sAKlpjHfrmBz3doTc4SqJGBiKpKZ6AgyECQA2DONNz
uUo0iFDLmaxHf04HR71KVQenJ7OFT5woEIJUYnQOwFHvQjrDT78xRwJpfjAIDs/w
rQ2PBSVdxnqMmUo=
-----END RSA PRIVATE KEY-----';

    /** Contents of ./certificates/pem/selfsigned.example.org.crt */
    public const PUBLIC_KEY_2_PEM = '-----BEGIN CERTIFICATE-----
MIICqDCCAhECAQIwDQYJKoZIhvcNAQELBQAwgZgxCzAJBgNVBAYTAlVTMQ8wDQYD
VQQIDAZIYXdhaWkxETAPBgNVBAcMCEhvbm9sdWx1MRYwFAYDVQQKDA1TaW1wbGVT
QU1McGhwMRMwEQYDVQQLDApEZXZlbG9wZXJzMRQwEgYDVQQDDAtleGFtcGxlLm9y
ZzEiMCAGCSqGSIb3DQEJARYTbm9yZXBseUBleGFtcGxlLm9yZzAeFw0xOTA3MjAw
NzU4MDFaFw0zOTA3MTUwNzU4MDFaMIGfMQswCQYDVQQGEwJVUzEPMA0GA1UECAwG
SGF3YWlpMREwDwYDVQQHDAhIb25vbHVsdTEWMBQGA1UECgwNU2ltcGxlU0FNTHBo
cDETMBEGA1UECwwKRGV2ZWxvcGVyczEbMBkGA1UEAwwSc2lnbmVkLmV4YW1wbGUu
b3JnMSIwIAYJKoZIhvcNAQkBFhNub3JlcGx5QGV4YW1wbGUub3JnMIGfMA0GCSqG
SIb3DQEBAQUAA4GNADCBiQKBgQCcYmwkO1lHel3sFpQtVnCQInGac8MYVWiXKrxW
KsWAqrcsRnjGvIMQU5oz2KNhensx7C2Baa3yOmhyfoGEIoMnntQO6gqYAVskuAKG
JhUzpPP1qP4ZV/FjZZ224u9+25gOkZO3Hr5PVCNBPloc+K8ppjRoUbwxFos8i9xo
u5v6xQIDAQABMA0GCSqGSIb3DQEBCwUAA4GBAD5jvsrGp0rv33XwbfWwhTNSBzwa
61qr1fs1OjTfN2DJf/3i46uywHMZOfkDGstxmoqS7DcpNhMblv4eQDjYBADI1a6O
5atAbtdu3D9qN67Ucc20xwQdZ0fBO9prH6pl6dm4zeF0pboZRi1s1GbxgixCPT5U
QWvDnL7YM/pW8ttA
-----END CERTIFICATE-----';

    /** Contents of ./certificates/pem/corrupted.example.org.crt */
    public const INVALID_PUBLIC_KEY_PEM = '-----BEGIN CERTIFICATE-----
1234qDCCAhECAQIwDQYJKoZIhvcNAQELBQAwgZgxCzAJBgNVBAYTAlVTMQ8wDQYD
VQQIDAZIYXdhaWkxETAPBgNVBAcMCEhvbm9sdWx1MRYwFAYDVQQKDA1TaW1wbGVT
QU1McGhwMRMwEQYDVQQLDApEZXZlbG9wZXJzMRQwEgYDVQQDDAtleGFtcGxlLm9y
ZzEiMCAGCSqGSIb3DQEJARYTbm9yZXBseUBleGFtcGxlLm9yZzAeFw0xOTA3MjAw
NzU4MDFaFw0zOTA3MTUwNzU4MDFaMIGfMQswCQYDVQQGEwJVUzEPMA0GA1UECAwG
SGF3YWlpMREwDwYDVQQHDAhIb25vbHVsdTEWMBQGA1UECgwNU2ltcGxlU0FNTHBo
cDETMBEGA1UECwwKRGV2ZWxvcGVyczEbMBkGA1UEAwwSc2lnbmVkLmV4YW1wbGUu
b3JnMSIwIAYJKoZIhvcNAQkBFhNub3JlcGx5QGV4YW1wbGUub3JnMIGfMA0GCSqG
SIb3DQEBAQUAA4GNADCBiQKBgQCcYmwkO1lHel3sFpQtVnCQInGac8MYVWiXKrxW
KsWAqrcsRnjGvIMQU5oz2KNhensx7C2Baa3yOmhyfoGEIoMnntQO6gqYAVskuAKG
JhUzpPP1qP4ZV/FjZZ224u9+25gOkZO3Hr5PVCNBPloc+K8ppjRoUbwxFos8i9xo
u5v6xQIDAQABMA0GCSqGSIb3DQEBCwUAA4GBAD5jvsrGp0rv33XwbfWwhTNSBzwa
61qr1fs1OjTfN2DJf/3i46uywHMZOfkDGstxmoqS7DcpNhMblv4eQDjYBADI1a6O
5atAbtdu3D9qN67Ucc20xwQdZ0fBO9prH6pl6dm4zeF0pboZRi1s1GbxgixCPT5U
QWvDnL7YM/pW8ttA
-----END CERTIFICATE-----';

    /** Contents of ./certificates/pem/corrupted.example.org_nopasswd.key */
    public const INVALID_PRIVATE_KEY_PEM = '-----BEGIN RSA PRIVATE KEY-----
1234dwIBADANBgkqhkiG9w0BAQEFAASCAmEwggJdAgEAAoGBAJxibCQ7WUd6XewW
lC1WcJAicZpzwxhVaJcqvFYqxYCqtyxGeMa8gxBTmjPYo2F6ezHsLYFprfI6aHJ+
gYQigyee1A7qCpgBWyS4AoYmFTOk8/Wo/hlX8WNlnbbi737bmA6Rk7cevk9UI0E+
Whz4rymmNGhRvDEWizyL3Gi7m/rFAgMBAAECgYB3V+0rYVdq4wmWSEzgpJzWglKs
CjgS8+sTofuEzrNW0/FiCo3VLLvg08xUULmuhGhL2u+HWXzz5HsdFUoF6sinXHvZ
SwOq1nsCRw9ZVJp/xyCjFgOp7rmfOs+FcTkeR7aEcBdJzUsvaaIC+a2W5sRaUaPK
CUmQVxdfq1LA+oL4QQJBAMh4/XaZn21E5LLFg4ybHkKY1+axR2EcJcVlmLaGKifk
dGUG1OwWtcRHL6+a6+doM28vt5N+CpFtnTRv/rMrBh0CQQDHs0CBsls5BKYIfENu
eLhUoDSgGq3QnBuGFHiLB8ikuxW2b4jGBf4rFpdWisZK2CuCbKuuNAchLArrgv7q
VYbJAkEAljVZrRDETOpO9chanfLoRHwjYT45voCJqJNMTo7ObV+W+s+YoGEPxsaT
618IHTaNO2UkhsXtAzR/kvfLftHg3QJBAI00TjRm7OHQS6ZMV1HRwmT0MsHSm3ya
JUwVRXbpNhJkxuGM0+VRb3sAKlpjHfrmBz3doTc4SqJGBiKpKZ6AgyECQA2DONNz
uUo0iFDLmaxHf04HR71KVQenJ7OFT5woEIJUYnQOwFHvQjrDT78xRwJpfjAIDs/w
rQ2PBSVdxnqMmUo=
-----END RSA PRIVATE KEY-----';


    /**
     * @return \RobRichards\XMLSecLibs\XMLSecurityKey
     */
    public static function getPublicKey(): XMLSecurityKey
    {
        $publicKey = new XMLSecurityKey(XMLSecurityKey::RSA_1_5, ['type' => 'public']);
        $publicKey->loadKey(self::PUBLIC_KEY_PEM);
        return $publicKey;
    }


    /**
     * @return \RobRichards\XMLSecLibs\XMLSecurityKey
     */
    public static function getPrivateKey(): XMLSecurityKey
    {
        $privateKey = new XMLSecurityKey(XMLSecurityKey::RSA_1_5, ['type' => 'private']);
        $privateKey->loadKey(self::PRIVATE_KEY_PEM);
        return $privateKey;
    }


    /**
     * @return \RobRichards\XMLSecLibs\XMLSecurityKey
     */
    public static function getPublicKeySha1(): XMLSecurityKey
    {
        $publicKey = new XMLSecurityKey(XMLSecurityKey::RSA_SHA1, ['type' => 'public']);
        $publicKey->loadKey(self::PUBLIC_KEY_PEM);
        return $publicKey;
    }


    /**
     * @return \RobRichards\XMLSecLibs\XMLSecurityKey
     */
    public static function getPublicKeySha256(): XMLSecurityKey
    {
        $publicKey = new XMLSecurityKey(XMLSecurityKey::RSA_SHA256, ['type' => 'public']);
        $publicKey->loadKey(self::PUBLIC_KEY_PEM);
        return $publicKey;
    }


    /**
     * @return \RobRichards\XMLSecLibs\XMLSecurityKey
     */
    public static function getPublicKey2(): XMLSecurityKey
    {
        $publicKey = new XMLSecurityKey(XMLSecurityKey::RSA_1_5, ['type' => 'public']);
        $publicKey->loadKey(self::PUBLIC_KEY_2_PEM);
        return $publicKey;
    }


    /**
     * @return \RobRichards\XMLSecLibs\XMLSecurityKey
     */
    public static function getPublicKey2Sha1(): XMLSecurityKey
    {
        $publicKey = new XMLSecurityKey(XMLSecurityKey::RSA_SHA1, ['type' => 'public']);
        $publicKey->loadKey(self::PUBLIC_KEY_2_PEM);
        return $publicKey;
    }


    /**
     * @return \RobRichards\XMLSecLibs\XMLSecurityKey
     */
    public static function getPublicKey2Sha256(): XMLSecurityKey
    {
        $publicKey = new XMLSecurityKey(XMLSecurityKey::RSA_SHA256, ['type' => 'public']);
        $publicKey->loadKey(self::PUBLIC_KEY_PEM_2);
        return $publicKey;
    }


    /**
     * @return string
     */
    public static function getPlainPublicKey(): string
    {
        return self::PUBLIC_KEY_PEM;
    }


    /**
     * @return string
     */
    public static function getPlainPrivateKey(): string
    {
        return self::PRIVATE_KEY_PEM;
    }


    /**
     * Returns just the certificate contents without the begin and end markings
     * @return string
     */
    public static function getPlainPublicKeyContents(): string
    {
        if (!preg_match(self::CERTIFICATE_PATTERN, self::PUBLIC_KEY_PEM, $matches)) {
            throw new Exception('Could not find PEM encoded certificate.');
        }

        return preg_replace('/\s+/', '', $matches[1]);
    }


    /**
     * Returns malformed public key.
     * @return string
     */
    public static function getInvalidPublicKey(): string
    {
        return self::INVALID_PUBLIC_KEY_PEM;
    }


    /**
     * Returns malformed private key.
     * @return string
     */
    public static function getInvalidPrivateKey(): string
    {
        return self::INVALID_PRIVATE_KEY_PEM;
    }
}
