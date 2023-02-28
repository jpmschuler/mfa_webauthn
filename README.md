# WebAuthn Provider for TYPO3 Multi Factor Authentication

This TYPO3 extension integrates into the experimental TYPO3 v11.1 Multi Factor Authentication (MFA) API,
adding authenticators using the [WebAuthn standard](https://webauthn.io). It provides support for
FIDO2/U2F Hardware tokens and Internal Authenticators (e.g. Android Screenlock or Windows hello) as
second factor during authentication.

*This is extensions is provided as a demo and as not intended to stay. It is planned to integrate WebAuthn
support into core in future TYPO3 releases. This extension will be marked abandoned, once that is done.*

## Installation

```
composer require bnf/mfa-webauthn
```

## Prerequisites and Limitations

The WebAuthn API has some design-driven limitations.
Authentication is reserved for secure environments in order to prevent spoofing of credentials,
and therefore a WebAuthn credential is additonally bound to a domain.

This puts the following limitations on usages of this provider:

 * Requires HTTPS or a localhost environment
   (therefore use `http://{myproject}.localhost` as local development URL)
 * WebAuthn API is bound to one domain which is used as the application ID. In general the backend for a system should
   be available via one primary domain only. If that is not the case or if you want to share the WebAuthn tokens e.g.
   between a production system and its copies, there is an extension configuration item which can be used to enforce a
   specific domain instead of deriving it from the backend request:
```
$GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['mfa_webauthn']['appId'] = 'primarydomain.example.com`;
```

## Alternative Extensions

If this extension is too limiting, consider using [mfa_yubikey](https://github.com/derhansen/mfa_yubikey)
 or [mfa_hotp](https://github.com/o-ba/mfa_hotp) instead. Note, both providers are less secure than webauthn, as the user
can be spoofed with a faked domain name, but they are more flexible and both allow to use hardware tokens with a multi
domain setup.
(`mfa_hotp` is intended for software HOTP authenticators, but the HOTP secret can also be burned to cheap HOTP hardware tokens.)
