---
title: "SAML2 Okta Authentication Plugin"
slug: "john-rivera-gonzalez-saml2-okta"
description: "A comprehensive Filament plugin for SAML2 authentication with Okta identity provider. Provides secure SSO integration with a user-friendly configuration interface."
author: "john-rivera-gonzalez"
github_url: "https://github.com/Johnrivera7/filamentSaml2Okta"
packagist_url: "https://packagist.org/packages/johnriveragonzalez/saml2-okta"
version: "1.0.0"
filament_version: "^3.0"
laravel_version: "^10.0|^11.0"
category: "panel-authentication"
tags:
  - "saml2"
  - "okta"
  - "authentication"
  - "sso"
  - "security"
  - "enterprise"
  - "identity-provider"
  - "filament"
  - "laravel"
  - "oauth"
---

## Overview

The **SAML2 Okta Authentication Plugin** is a powerful Filament v3 plugin that seamlessly integrates SAML2 authentication with Okta identity provider. This plugin provides enterprise-grade Single Sign-On (SSO) capabilities with a comprehensive configuration interface, making it easy to set up secure authentication for your Filament applications.

## Features

### 🔐 **Enterprise Authentication**
- **SAML2 Protocol Support**: Full SAML2 authentication flow implementation
- **Okta Integration**: Native support for Okta identity provider
- **Secure SSO**: Single Sign-On functionality with proper security measures
- **Certificate Management**: Built-in certificate and key management

### 🎛️ **User-Friendly Configuration**
- **Admin Panel Integration**: Seamless integration with Filament admin panel
- **Visual Configuration**: Intuitive settings page for easy setup
- **Real-time Testing**: Test SAML2 configuration before going live
- **Environment Variables**: Secure configuration through environment variables

### 🛡️ **Security Features**
- **Encrypted Storage**: Sensitive data stored securely in database
- **Certificate Validation**: Automatic certificate validation and verification
- **Secure Redirects**: Protected authentication redirects
- **Session Management**: Proper session handling and security

### 🔧 **Developer Experience**
- **Easy Installation**: Simple Composer installation
- **Clear Documentation**: Comprehensive setup and usage guides
- **Error Handling**: Detailed error messages and debugging support
- **Customizable**: Flexible configuration options

## Installation

### 1. Install via Composer

```bash
composer require johnriveragonzalez/saml2-okta
```

### 2. Publish Configuration

```bash
php artisan vendor:publish --tag="saml2-okta-config"
```

### 3. Run Migrations

```bash
php artisan migrate
```

### 4. Register Plugin

Add the plugin to your Filament panel provider:

```php
// app/Providers/Filament/AdminPanelProvider.php
use JohnRiveraGonzalez\Saml2Okta\Saml2OktaPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            // ... other plugins
            Saml2OktaPlugin::make(),
        ]);
}
```

## Configuration

### 1. Plugin Configuration

The plugin stores all configuration in the database through a user-friendly interface. No environment variables are required for basic functionality.

### 2. Admin Panel Configuration

1. Navigate to your Filament admin panel
2. Go to **Configuración SAML2** in the **Autenticación** navigation group
3. Configure the following sections:

#### **Identity Provider (IdP) Configuration**
- **Client ID**: Your Okta application client ID
- **Client Secret**: Your Okta application client secret
- **Callback URL**: Your application's callback URL (usually `/saml2/callback`)
- **IdP Entity ID**: Okta application entity ID
- **IdP SSO URL**: Okta Single Sign-On URL
- **IdP SLO URL**: Okta Single Logout URL
- **IdP Metadata URL**: Okta application metadata URL
- **IdP X.509 Certificate**: Okta application certificate

#### **Service Provider (SP) Configuration**
- **SP Entity ID**: Your application's entity ID
- **SP X.509 Certificate**: Your application's certificate
- **SP Private Key**: Your application's private key

#### **Interface Configuration**
- **Activate Authentication**: Enable/disable SAML2 authentication
- **Button Label**: Customize the login button text (default: "Iniciar sesión con Okta")

## Usage

### 1. Basic Authentication Flow

Once configured, users can:

1. Click the **"Iniciar sesión con Okta"** button on the login page
2. Be redirected to Okta for authentication
3. Return to your application after successful authentication
4. Access the admin panel with their Okta credentials

### 2. Custom Login Button

The plugin automatically adds a SAML2 login button to your Filament login page. You can customize the button appearance and behavior through the settings page.

### 3. User Management

The plugin integrates with your existing user management system:

- **Automatic User Creation**: New users are automatically created upon first login
- **Role Assignment**: Users can be assigned roles based on Okta group membership
- **Profile Synchronization**: User profiles are synchronized with Okta data

## Advanced Configuration

### 1. Database Configuration

The plugin stores all configuration in the `saml2_okta_configs` table. You can have multiple configurations but only one can be active at a time.

### 2. Configuration Management

- **Multiple Configurations**: Create different configurations for different environments
- **Active Configuration**: Only one configuration can be active at a time
- **Secure Storage**: Sensitive data like private keys and certificates are stored securely
- **Admin Access**: Only users with `super_admin` role can access configuration

### 3. Automatic Configuration

The plugin automatically configures Laravel Socialite with the active configuration when needed, without requiring manual environment variable setup.

## Troubleshooting

### Common Issues

#### 1. Certificate Errors
- **Problem**: Certificate validation failures
- **Solution**: Ensure certificates are properly formatted and valid
- **Check**: Verify certificate expiration dates

#### 2. Redirect Issues
- **Problem**: Authentication redirects not working
- **Solution**: Check callback URL configuration
- **Check**: Verify domain and SSL certificate

#### 3. User Creation Issues
- **Problem**: Users not being created automatically
- **Solution**: Check user mapping configuration
- **Check**: Verify Okta user data format

### Debug Mode

The plugin includes comprehensive logging for debugging SAML2 authentication issues. Check your Laravel logs for detailed information about the authentication flow.

### Log Files

Check the following log files for debugging information:

- `storage/logs/laravel.log` - Contains all SAML2 authentication logs

## Requirements

### System Requirements
- **PHP**: 8.1 or higher
- **Laravel**: 10.0 or higher
- **Filament**: 3.0 or higher
- **Composer**: 2.0 or higher

### Dependencies
- `laravel/socialite` (^5.0)
- `socialiteproviders/saml2` (^4.7)
- `filament/filament` (^3.0)
- `spatie/laravel-package-tools` (^1.16)

### Okta Requirements
- **Okta Account**: Active Okta developer or enterprise account
- **SAML Application**: Configured SAML application in Okta
- **Certificates**: Valid X.509 certificates for both IdP and SP

## Security Considerations

### 1. Certificate Management
- **Regular Updates**: Keep certificates updated and valid
- **Secure Storage**: Store private keys securely
- **Access Control**: Limit access to configuration settings

### 2. Network Security
- **HTTPS Required**: Always use HTTPS for SAML2 communication
- **Firewall Rules**: Configure appropriate firewall rules
- **IP Restrictions**: Consider IP restrictions for admin access

### 3. Data Protection
- **Database Storage**: Configuration stored securely in database
- **Hidden Fields**: Sensitive fields are hidden from serialization
- **Admin Access Control**: Only super_admin users can configure SAML2
- **Session Security**: Secure session management

## Contributing

We welcome contributions to improve this plugin! Here's how you can help:

### 1. Reporting Issues
- **Bug Reports**: Report bugs with detailed information
- **Feature Requests**: Suggest new features and improvements
- **Documentation**: Help improve documentation

### 2. Code Contributions
- **Fork Repository**: Fork the repository on GitHub
- **Create Branch**: Create a feature branch for your changes
- **Submit PR**: Submit a pull request with your changes

### 3. Testing
- **Test Cases**: Add test cases for new features
- **Bug Fixes**: Test bug fixes thoroughly
- **Compatibility**: Ensure compatibility with different versions

## Support

### Getting Help
- **Documentation**: Check the comprehensive documentation
- **GitHub Issues**: Report issues on GitHub
- **Community**: Join the Filament community for support

### Professional Support
- **Enterprise Support**: Available for enterprise customers
- **Custom Development**: Custom development services available
- **Training**: Training and consultation services

## License

This plugin is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Changelog

### Version 1.0.0
- **Initial Release**: First stable release
- **SAML2 Support**: Full SAML2 authentication implementation
- **Okta Integration**: Native Okta identity provider support
- **Admin Interface**: User-friendly configuration interface
- **Security Features**: Enterprise-grade security features
- **Documentation**: Comprehensive documentation and guides

## Author

**John Rivera Gonzalez**
- **GitHub**: [@Johnrivera7](https://github.com/Johnrivera7)
- **Email**: johnriveragonzalez7@gmail.com
- **Website**: [Campus Digital TDX](https://campusdigital.tdx.education)

---

*This plugin is actively maintained and regularly updated. For the latest updates and features, please check the [GitHub repository](https://github.com/Johnrivera7/filamentSaml2Okta) and [Packagist page](https://packagist.org/packages/johnriveragonzalez/saml2-okta).*
