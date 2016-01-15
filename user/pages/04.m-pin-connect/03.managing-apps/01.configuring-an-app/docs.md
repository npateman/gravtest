---
title: Configuring an App
taxonomy:
    category: docs
---

**<span style="font-size:10.0pt;line-height:106%;font-family:
&quot;Verdana&quot;,sans-serif;color:black;background:white">(M-Pin Connect)</span>**

Summary
-------

This page explains how to configure an application for federated authentication using M-Pin Connect.

Adding and Configuring an Application – Overview
------------------------------------------------

To enable an application authenticate with M-Pin Connect, you need to first create a profile for that application in your M-Pin Connect account, and then, using the settings from this profile, configure M-Pin Connect as an OpenID Connect authentication provider in the application's management interface.

Adding and Configuring an Application – Procedure
-------------------------------------------------

Following is the detailed procedure to configuring an application with M-Pin Connect.

<a href="#5468" class="toggle-content"><strong>1.</strong> In your M-Pin Connect account, <strong>add and configure a profile for your</strong> <strong>application.</strong></a> »

To do this:

**1.1. Select the** *My Applications* **link**.

![](/images/screenshot_13(5).jpg)

This will display the *Registered Apps* page.

![](/images/screenshot_14.jpg)

**1.2.** In the *Registered Apps* page, **select the** *Register a new **** application* **button**. (See the picture above.) This will take you to the *M-Pin OIDC Management Console* page.

![](/images/screenshot_15.jpg)

**1.3. Fill in the profile’s fields** and then **use the** *Done* **button** to commit your changes.

Settings:

-   **Redirect URI:** *(Required)* **­**– the callback URL for the endpoint that M-Pin Connect calls back to. The URL should be available either in the application's admin interface or in its documentation and should be copied from there.
-   **Application name:** *(Required)* – a name with which this application profile will be listed in the M-Pin Connect account, e.g. <span class="CVXCodeinText"><span style="font-family:&quot;Courier New&quot;">Sample Application Profile</span></span>
-   **Logo** **URI:**<span style="line-height: 19.2000007629395px;"> </span>**­**<span style="line-height: 19.2000007629395px;">– URL of the image to use as a logo for this </span>this application profile<span style="line-height: 19.2000007629395px;">. (Should be the application's logo.) The logo will be displayed next to the profile name for easy distinguishing of the application wherever applications are listed in the account. If not provided, a default logo image will be used.</span>

After committing your changes, several values will be generated that are necessary for configuring your application and displayed on the page.

![](/images/screenshot_16(1).jpg?dc=201506251522-133)

For now, leave this page open while proceeding with step 2. (You'll need to get back this page several times to copy the values.)

<a href="#4818" class="toggle-content"><strong>2.</strong> In <span abp="659">your your </span>application's admin interface, using the data from the application's M-Pin Connect profile, <strong>set up M-Pin Connect as an OpenID Connect authentication provider for the application.</strong></a> »

**2.1. Copy the values from the** *M-Pin OIDC Management Console* **page** of the M-Pin Connect profile for your application <span style="line-height: 19.2000007629395px;">(See the picture in step 1.3.) **** </span>**<span style="line-height: 1.6em;">and paste them in the corresponding fields in the application's management interface</span>**<span style="line-height: 1.6em;">. The following settings are required.</span>

Settings:

-   **Authorization endpoint** – the value from the *Landing page URI:* field
-   **User info endpoint** – the value from the *OIDC userinfo endpoint:* field
-   **Client ID** – the value from the *Your client ID is:* field
-   **Clent Secret** – the value from the *Your client secret is:* field

For details on how to configure these settings, refer to your application user documentation.

**Note:**

In some cases, once your application's settings are configured, a custom Redirect URI value will be generated which you need to set in the M-Pin Connect profile for your application. In this case, copy the Redirect URI value for later use in the M-Pin Connect profile.

**2.2.** Navigate back to the M-Pin Connect profile for your application and, **in the** *M-Pin OIDC Management Console* page**, select the** *Done* button. <span style="line-height: 19.2000007629395px;">(See the picture in step 1.3.)</span>

<span style="line-height: 1.6em;">The </span>*M-Pin OIDC Management Console*<span style="line-height: 19.2000007629395px;"> page re-loads, now displaying all fields</span><span style="line-height: 19.2000007629395px;">.</span>

![](/images/screenshot_17a.jpg?dc=201506261344-94)

**2.3.** *(Conditional* – *only if the Redirect URI needs to be updated)* **Update the** ***Redirect URI*** **field** (now called *Edit your Redirect URI:)* with the newly generated value from the application's admin interface**.** ****

![](/images/screenshot_17(1).jpg?dc=201506261342-35)

**2.4. Select the** *Save changes* **button** **to finalize the procedure**. Your application should now be configured for single-sign-on authenticarion with M-Pin.


