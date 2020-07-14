# Docker Test SAML 2.0

Docker container with a plug and play SAML 2.0 for development and testing.

Built with [SimpleSAMLphp](https://simplesamlphp.org). Based on official PHP7 Apache [images](https://hub.docker.com/_/php/).

**Warning!**: Do not use this container in production! The container is not configured for security and contains static user credentials and SSL keys.

SimpleSAMLphp is logging to stdout on debug log level. Apache is logging error and access log to stdout.

The contained version of SimpleSAMLphp is 1.15.2.

## Usage

```
docker run --name=testsaml2 \
-p 8888:8888 \
-p 8443:8443 \
-e SIMPLESAMLPHP_SP_ENTITY_ID=https://localhost:8000/saml/metadata \
-e SIMPLESAMLPHP_SP_ASSERTION_CONSUMER_SERVICE=https://localhost:8000/saml/acs \
-e SIMPLESAMLPHP_SP_SINGLE_LOGOUT_SERVICE=https://localhost:8000/saml/logout \
-d docker.pkg.github.com/enabel/docker-saml/saml2:1.0.0
```

There are two static users configured in the IdP with the following data:

| UID | Username | Password | Display name | Email |
|---|---|---|---|---|
| 1 | user.field | password | FIELD, User | user.field@enabel.be |
| 2 | user.hq | password | HQ, User | user.hq@enabel.be |

However you can define your own users by mounting a configuration file:

```
-v /users.php:/var/www/simplesamlphp/config/authsources.php
```

You can access the SimpleSAMLphp web interface of the IdP under `http://localhost:8888/`. The admin password is `secret`.


## Use the Identity Provider (IdP) in Symfony 

### Symfony requirement
- hslavich/oneloginsaml-bundle

### OneLoginSaml configuration

```
IDP_ENTITY_ID='https://localhost:8443/saml2/idp/metadata.php'
IDP_SIGN_ON_URL='https://localhost:8443/saml2/idp/SSOService.php'
IDP_SIGN_ON_BINDING='urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect'
IDP_LOGOUT_URL='https://localhost:8443/saml2/idp/SingleLogoutService.php'
IDP_LOGOUT_BINDING='urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect'
IDP_X509='MIIDXTCCAkWgAwIBAgIJALmVVuDWu4NYMA0GCSqGSIb3DQEBCwUAMEUxCzAJBgNVBAYTAkFVMRMwEQYDVQQIDApTb21lLVN0YXRlMSEwHwYDVQQKDBhJbnRlcm5ldCBXaWRnaXRzIFB0eSBMdGQwHhcNMTYxMjMxMTQzNDQ3WhcNNDgwNjI1MTQzNDQ3WjBFMQswCQYDVQQGEwJBVTETMBEGA1UECAwKU29tZS1TdGF0ZTEhMB8GA1UECgwYSW50ZXJuZXQgV2lkZ2l0cyBQdHkgTHRkMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAzUCFozgNb1h1M0jzNRSCjhOBnR+uVbVpaWfXYIR+AhWDdEe5ryY+CgavOg8bfLybyzFdehlYdDRgkedEB/GjG8aJw06l0qF4jDOAw0kEygWCu2mcH7XOxRt+YAH3TVHa/Hu1W3WjzkobqqqLQ8gkKWWM27fOgAZ6GieaJBN6VBSMMcPey3HWLBmc+TYJmv1dbaO2jHhKh8pfKw0W12VM8P1PIO8gv4Phu/uuJYieBWKixBEyy0lHjyixYFCR12xdh4CA47q958ZRGnnDUGFVE1QhgRacJCOZ9bd5t9mr8KLaVBYTCJo5ERE8jymab5dPqe5qKfJsCZiqWglbjUo9twIDAQABo1AwTjAdBgNVHQ4EFgQUxpuwcs/CYQOyui+r1G+3KxBNhxkwHwYDVR0jBBgwFoAUxpuwcs/CYQOyui+r1G+3KxBNhxkwDAYDVR0TBAUwAwEB/zANBgkqhkiG9w0BAQsFAAOCAQEAAiWUKs/2x/viNCKi3Y6blEuCtAGhzOOZ9EjrvJ8+COH3Rag3tVBWrcBZ3/uhhPq5gy9lqw4OkvEws99/5jFsX1FJ6MKBgqfuy7yh5s1YfM0ANHYczMmYpZeAcQf2CGAaVfwTTfSlzNLsF2lW/ly7yapFzlYSJLGoVE+OHEu8g5SlNACUEfkXw+5Eghh+KzlIN7R6Q7r2ixWNFBC/jWf7NKUfJyX8qIG5md1YUeT6GBW9Bm2/1/RiO24JTaYlfLdKK9TYb8sG5B+OLab2DImG99CJ25RkAcSobWNF5zD0O6lgOo3cEdB/ksCq3hmtlC/DlLZ/D8CJ+7VuZnS1rR2naQ=='

SP_ENTITY_ID='https://localhost:8000/saml/metadata'
SP_ACS_URL='https://localhost:8000/saml/acs'
SP_ACS_BINDING='urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST'
SP_LOGOUT_URL='https://localhost:8000/saml/logout'
SP_LOGOUT_BINDING='urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect'
SP_KEY=''

BASE_URL='https://localhost:8000'
```

## License

This project is open-sourced software licensed under the [GPL-3.0 License](LICENSE.md).