# simplesamlphp-test-framework
Test framework for SimpleSAMLphp and related repositories

All encrypted keys use '1234' as passphrase.

The following keys will be generated:
  - signed      - A CA-signed certificate
  - other       - Another CA-signed certificate
  - selfsigned  - A self-signed certificate
  - broken      - A file with a broken PEM-structure (all spaces are removed from the headers)
  - corrupted   - This looks like a proper certificate (every first & last character of every line has been swapped)
  - expired     - This CA-signed certificate expires the moment it is generated
