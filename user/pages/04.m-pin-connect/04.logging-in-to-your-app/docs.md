---
title: Logging in to Your App
taxonomy:
    category: docs
---

**<span style="font-size:10.0pt;line-height:106%;font-family:
&quot;Verdana&quot;,sans-serif;color:black;background:white">(M-Pin Connect)</span>**

Summary
-------

This page explains how end users log in to applications that have been configured for authentication with the M-Pin Connect service.

Overview
--------

When an application uses the M-Pin Connect federated authentication service, end users log in to it the following ways:

-   **From the application's Redirect URI** – this is the Redirect URI with which the application is configured in its M-Pin Connect profile
-   **From the user's M-Pin Connect account**

Each of these is discussed in further detail below.

<a href="" id="Logging in to an Application from the Redirect URI"></a>Logging-In to an Application from the Redirect URI
-------------------------------------------------------------------------------------------------------------------------

This is the standard way. The user accesses the application's Redirect URI page where they are exposed to the [M-Pin PIN Pad](#M-Pin%20PIN-Pad) and follow the standard M-Pin authentication procedure. If you need help on how this process works and how to operate the M-Pin PIN-Pad, refer to the following pages:

-   [Using the M-Pin PIN-Pad with Browser](#)
-   [Using the M-Pin PIN-Pad with a Mobile Device](#)

Logging-In to an Application from an M-Pin Connect Account
----------------------------------------------------------

End users can also log in to an application by following the Proceed link for that application if the application is listed in the Authenticated Apps list.

![](/images/screenshot_4(3).jpg?dc=201507081724-88)

Since the user has already been authenticated upon their log-in to the M-Pin Connect account, when they select the Proceed link, they access the respective application directly, without being asked for credentials again.

Accessing an application from an M-Pin Connect account is possible only if the application is listed as an Authenticated App. An application gets listed as an Authenticated App upon user's first successful log-in to the application. Obviously, this first log-in has to be done [the standard way by following the application's Redirect URI](#Logging%20in%20to%20an%20Application%20from%20the%20Redirect%20URI). By the same token, if the user removes the application from the Authenticated Apps list, they won't be able to log in to it from their M-Pin Connect account (Until they log in to it with its Redirect URI again; this will restore the application on the Authenticated Apps list.).
