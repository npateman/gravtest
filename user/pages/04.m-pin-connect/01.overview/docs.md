---
title: Overview
taxonomy:
    category: docs
---

**<span style="font-size:10.0pt;line-height:106%;font-family:
&quot;Verdana&quot;,sans-serif;color:black;background:white">(M-Pin Connect)</span>**

Summary
-------

This page explains the M-Pin Connect service and provides links to pages that will help you get started with it.

On This Page
------------

-   [Introduction to M-Pin Connect](#introduction-to-m-pin-connect)
-   [How M-Pin Connect Works](#how-m-pin-connect-works)
-   [M-Pin Connect Accounts Overview](#m-pin-connect-accounts-overview)
-   [Getting Started](#getting-started)

Introduction to M-Pin Connect
-------------------------------------------------------------------------------

M-Pin Connect is a web application hosted by MIRACL and <span style="line-height: 19.2000007629395px;">based on the M-Pin technology, </span><span style="line-height: 19.2000007629395px;">that federates strong authentication using the [OpenID Connect](http://openid.net/connect/faq/) protocol</span><span style="line-height: 1.6em;">. M-Pin Connect operates like other similar services, </span>such as [Facebook Connect](https://en.wikipedia.org/wiki/Facebook_Platform#Facebook_Connect), but because it employs the [M-Pin Technology](#M-Pin%20Technology), the single sign-on authentication is performed with a PIN number (using the [M-Pin PIN-Pad](#M-Pin%20PIN-Pad)) and not with a password.

<span style="line-height: 19.2000007629395px;">MIRACL</span><span style="line-height: 19.2000007629395px;"> uses </span><span style="line-height: 1.6em;">M-Pin Connect to</span> federate authentication <span style="line-height: 1.6em;">to a number of its services, including the MIRACL Community web site and the MIRACL Management Console. **The M-Pin Connect service is open to developers for federating the authentication of their own applications**</span>**<span style="line-height: 1.6em;">.</span>**

The M-Pin Connect service is available from the [m-pin.my.id](https://m-pin.my.id/) domain.

<a href="" id="How M-Pin Connect Works"></a>How M-Pin Connect Works
-------------------------------------------------------------------

To enable authentication with M-Pin Connect for an application, this application must have a profile configured inside an M-Pin Connect account. Once this is done, every end user accessing the application's Redirect URI will be exposed to the [M-Pin Pin-Pad](#M-Pin%20PIN-Pad) where they will follow the M-Pin registration and authentication flow for logging in to the application. (User log-in access can be further restricted for the application, as with an LDAP directory. However, this is part the application's management and not controllable through the M-Pin Connect service.) For details on the M-Pin registration and authentication flow, see the [Logging-In to Your Application](#) page.

M-Pin Connect Accounts Overview
-----------------------------------------------------------------------------------

When an end-user attempts to access M-Pin-Connect-enabled application for the first time, they are required to register with their email address to the [M-Pin Pin-Pad](#M-Pin%20PIN-Pad) in order to proceed with their authentication to the application. This registration <span style="line-height: 19.2000007629395px;">allows them to access this account through M-Pin Connect, too, </span><span style="line-height: 1.6em;">once they create their M-Pin Connect account. </span>

From their account, each M-Pin Connect user can:

-   View the M-Pin Connect applications to which they have been loggin-in (The so called "Authenticated Apps".)
-   Log-in to their Authenticated Apps, which means that a user's M-Pin Connect profile can be used as an alternative log-in point for an application
-   Discontinue an application's permission to access their personal data
-   Add and configure applications for authentication with the M-Pin Connect service. The applications that a user adds to their profile are called "Registered Apps". (For details, see [Managing Your Registered Applications](#).)
-   Access the subscription, billing, and statistical about the MIRACL products in the MIRACL Management Console they use if they have admin rights in these products or have been granted access to the MIRACL Management Console for these particular products by the product administrators.

**Note**:

For an application to become accessible through M-Pin Connect, in must be added <span style="line-height: 19.2000007629395px;">to </span><span style="line-height: 1.6em;">and configured in only one M-Pin Connect user profile. After that, all other users of that application will have access to the M-Pin-based authentication for that application through the application's </span>Redirect URI and from their M-Pin Connect profiles.

By the same token, to be able to access an application's M-Pin-based log-in, a user doesn't need to have it configured in their own M-Pin Connect profile, i.e. it doesn't have to be a Registered App in that particular profile. All they have to do is to access that aplication through its Redirect URI (the Redirect URI with which the application is configured in the M-Pin Connect system). The application will be then automatically listed as an Authenticated App in that user's profile.

An application's Redirect URI must be unique for the entire M-Pin Connect system. This means that once a user configures an application in their account, no other user can register that application with the same Redirect URI: an attempt tp do so will return an error message. They can however register the same application with a different Redirect URI.

Getting Started
---------------------------------------------------

To get started with M-Pin Connect, see the following topics:

-   [Registering and Logging In](/m-pin-connect/registering-and-logging-in)
-   [Adding and Configuring an Application](/m-pin-connect/managing-apps/configuring-an-app)

