---
title: MIRACL IoT Crypto Library
taxonomy:
    category: docs
---

MIRACL IoT Crypto Library
=========================

![CLINT](/images/CLINT-landing.jpg)

**We are currently working hard getting MIRACL IoT Crypto Library ready for it's public release, however you can jump the queue and be one of the first to access MIRACL IoT Crypto Library by joining the MIRACL IoT Crypto Library mailing list, [simply complete the join up form on this page to get access first](http://www.MIRACL.com/clint).**

MIRACL IoT Crypto Library is a completely self-contained cryptographic library (except for the requirement for an external entropy source for random number generation).

MIRACL IoT Crypto Library is portable - there is no assembly language – and extremely easy to configure and deploy. The original version is written in C using only generic programming constructs. At launch there will be compatible versions available in Java and Javascript.

MIRACL IoT Crypto Library is fast, but does not attempt to set speed records (a particular academic obsession). In general the speed is expected to be \`\`good enough''. However MIRACL IoT Crypto Library is small - <span class="s1">MIRACL IoT Crypto Library</span> takes up the minimum of ROM/RAM resources in order to fit into the smallest possible embedded footprint, consistent with other design constraints. It is expected that this will be vital for implementations that support security in the Internet of Things.

Only one level of security is supported, equivalent to 128-bit AES (Advanced Encryption Standard). This is the current standard level for cryptography that is expected to be unbreakable. And MIRACL IoT Crypto Library makes most of the choices for you as to which primitives to use, based on the best available current advice. For public key methods, the full range of Elliptic Curve Cryptography protocols are supported, as is Pairing-Based cryptography.

Resistance to side-channel attacks is designed-in, as such cryptanalytic attacks may be realistic in the embedded setting.
