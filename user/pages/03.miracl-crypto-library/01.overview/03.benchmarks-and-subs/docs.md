---
title: Benchmarks and Subs
taxonomy:
    category: docs
---

Benchmarks and Subs
===================

**Performance is the biggest single issue for implementors, and MIRACL allows a variety of techniques (algorithmic tricks and/or assembly language) to be used to squeeze maximum performance from a particular environment. So use MIRACL in your cryptographic API for a performance boost - you may not need that expensive Cryptographic accelerator!**

This diagram below shows timings for modular exponentiation, that is the calculation of *x<sup>y</sup>* *mod n*, for *x*, *y* and *n* all the same size in bits - the size shown along the horizontal axis. The exponent *y* is chosen at random. This is the bottleneck calculation in many cryptographic protocols. Five different methods are implemented for the Intel 80x86/Pentium family. Timings on the horizontal axes are correct in seconds for 8192 bit exponentiation. For 4096 bits divide by 8, for 2048 bits divide by 8 again, etc. For a paper describing the methods in more details see [timings.doc](https://MIRACL.org/download/attachments/2458880/timings.doc?version=1&modificationDate=1350574490000&api=v2).

The following timings were obtained using the Borland C/C++ Compiler/assembler, for modular exponentiation.

Times in milliseconds for optimal technique

<table>
<colgroup>
<col width="20%" />
<col width="20%" />
<col width="20%" />
<col width="20%" />
<col width="20%" />
</colgroup>
<thead>
<tr class="header">
<th align="left"><div class="tablesorter-header-inner">
<span> </span>
</div></th>
<th align="left"><div class="tablesorter-header-inner">
<span>512 bits</span>
</div></th>
<th align="left"><div class="tablesorter-header-inner">
<span>1024 bits</span>
</div></th>
<th align="left"><div class="tablesorter-header-inner">
<span>2048 bits</span>
</div></th>
<th align="left"><div class="tablesorter-header-inner">
<span>4096 bits</span>
</div></th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left">33MHz 80486DX</td>
<td align="left">370</td>
<td align="left">2833</td>
<td align="left">17833</td>
<td align="left">111000</td>
</tr>
<tr class="even">
<td align="left">60MHz Pentium</td>
<td align="left">48</td>
<td align="left">353</td>
<td align="left">2452</td>
<td align="left">18500</td>
</tr>
<tr class="odd">
<td align="left">180MHz Pentium Pro</td>
<td align="left">12</td>
<td align="left">90</td>
<td align="left">564</td>
<td align="left">3551</td>
</tr>
<tr class="even">
<td align="left">233MHz Pentium II</td>
<td align="left">10</td>
<td align="left">80</td>
<td align="left">510</td>
<td align="left">3250</td>
</tr>
</tbody>
</table>

**On a 233 Mhz Pentium II - Best times (without precomputation).**

A 1024-bit RSA decryption/signature takes 20ms. \*
A 2048-bit RSA decryption takes 160 ms. +
A 1024 bit (160 bit exponent) DSS verification takes 16ms. +
A 2048 bit (256 bit exponent) DSS verification takes 79ms +
A 160-bit Elliptic Curve ECS verification takes 11 ms. \*
A 256-bit Elliptic Curve ECS verification takes 26ms.\*
A 192-bit Elliptic Curve ECS verification takes 9ms (NIST Standard Curve - Special Modulus) \*
A 224-bit Elliptic Curve ECS verification takes 13ms (NIST Standard Curve - Special Modulus) \*

**On 80MHz ARM7TDMI - Best times (without precomputation)**

A 1024-bit RSA decryption/signature takes 120ms \*
A 192-bit Elliptic Curve point multiplication takes 38ms (NIST Standard Curve - Special Modulus) \*
A 224-bit Elliptic Curve point multiplication takes 53ms (NIST Standard Curve - Special Modulus) \*

MIRACL contains fast experimental implementations of <a href="http://crypto.stanford.edu/ibe/" class="external-link">Identity-Based Encryption</a>.
Timings include all number theoretic components of encrypt/decrypt processing. The most time-consuming component is the calculation of the Tate Pairing*. The discrete logarithm bit-length security of a pairing-based system is a function of the product of the \_security multiplier k* and the bit length of the base field. In these cases *k=2* and the base field is 512-bits, for 1024-bit security.

**On a 1GHz Pentium III**

A 1024-bit IBE encrypt takes 35ms \*
A 1024-bit IBE decrypt takes 27ms \*
A 1024-bit IBE encrypt takes 22ms (with precomputation) \*
A 1024-bit IBE decrypt takes 17ms (with precomputation) \*
A 1024-bit Tate pairing takes 20ms \*
A 1024-bit Tate pairing takes 8.6ms (with precomputation) \*

-   - Using Comba Method for modular multiplication
    + - Using KCM Method for modular multiplication

Output of the BMARK program
---------------------------

Below is the output of the BMARK program, on a single core of a 2.4GHz Intel i5 520 processor, compiled with GCC, with standard /O2 compiler optimisation.
*Note that this is for the standard version of MIRACL, with no special optimizations.*

------------------------------------------------------------------------

MIRACL - 64 bit version
Little Endian processor
Using some assembly language
No special optimizations
Precomputation uses fixed Window size = 8
So 256 values are precomputed and stored
NOTE: No optimizations/assembly language apply to GF(2^m) Elliptic Curves
NOTE: times are elapsed real-times - so make sure nothing else is running!

<span>Modular exponentiation benchmarks - calculating g^e mod p
From these figures it should be possible to roughly estimate the time
required for your favourite PK algorithm, RSA, DSA, DH, etc.
**Key**
R - random base bits/random exponent bits
V - random base bits/(small exponent e)
S - (small base g) /random exponent bits
P - exponentiation with precomputation (fixed base g)
D - double exponentiation g^e.a^b mod p
F3 = 257, F4 = 65537
RSA - Rivest-Shamir-Adleman
DH - Diffie Hellman Key exchange
DSA - Digital Signature Algorithm</span>

<span>512 bit prime....
R - 54945 iterations of 512/ 160 0.18 ms per iteration
D - 45015 iterations of 512/ 160 0.22 ms per iteration
R - 18292 iterations of 512/ 512 0.55 ms per iteration
S - 67125 iterations of g=3/ 160 0.15 ms per iteration
P - 281436 iterations of 512/ 160 0.04 ms per iteration</span>

<span>1024 bit RSA decryption 1.09 ms</span>

<span> 512 bit DH 160 bit exponent:-
offline, no precomputation 0.18 ms
offline, small base 0.15 ms
offline, w. precomputation 0.04 ms
online 0.18 ms
512 bit DSA 160 bit exponent:-
signature no precomputation 0.18 ms
signature w. precomputation 0.04 ms
verification 0.22 ms</span>

<span>1024 bit prime....
R - 17875 iterations of 1024/ 160 0.56 ms per iteration
D - 14859 iterations of 1024/ 160 0.67 ms per iteration
R - 3021 iterations of 1024/1024 3.31 ms per iteration
V - 1163058 iterations of 1024/e= 3 0.01 ms per iteration
V - 154892 iterations of 1024/e=F4 0.06 ms per iteration
S - 22799 iterations of g=3/ 160 0.44 ms per iteration
P - 89730 iterations of 1024/ 160 0.11 ms per iteration</span>

<span>2048 bit RSA decryption 6.62 ms
1024 bit RSA encryption e=3 0.01 ms
1024 bit RSA encryption e=65537 0.06 ms
1024 bit DH 160 bit exponent:-
offline, no precomputation 0.56 ms
offline, small base 0.44 ms
offline, w. precomputation 0.11 ms
online 0.56 ms
1024 bit DSA 160 bit exponent:-
signature no precomputation 0.56 ms
signature w. precomputation 0.11 ms
verification 0.67 ms</span>

<span>2048 bit prime....
R - 2982 iterations of 2048/ 256 3.35 ms per iteration
D - 2335 iterations of 2048/ 256 4.28 ms per iteration
R - 398 iterations of 2048/2048 25.13 ms per iteration
V - 366871 iterations of 2048/e= 3 0.03 ms per iteration
V - 48125 iterations of 2048/e=F4 0.21 ms per iteration
S - 4223 iterations of g=3/ 256 2.37 ms per iteration
P - 15500 iterations of 2048/ 256 0.65 ms per iteration</span>

<span>2048 bit RSA encryption e=3 0.03 ms
2048 bit RSA encryption e=65537 0.21 ms
2048 bit DH 256 bit exponent:-
offline, no precomputation 3.35 ms
offline, small base 2.37 ms
offline, w. precomputation 0.65 ms
online 3.35 ms
2048 bit DSA 256 bit exponent:-
signature no precomputation 3.35 ms
signature w. precomputation 0.65 ms
verification 4.28 ms</span>

------------------------------------------------------------------------

Elliptic Curve point multiplication
-----------------------------------

**Elliptic Curve point multiplication benchmarks - calculating r.P**
From these figures it should be possible to roughly estimate the time required for your favourite EC PK algorithm, ECDSA, ECDH, etc.

------------------------------------------------------------------------

<span>**Key -**
ER - Elliptic Curve point multiplication r.P
ED - Elliptic Curve double multiplication r.P + s.Q
EP - Elliptic Curve multiplication with precomputation
EC - Elliptic curve GF(p) - p of no special form
ECDH - Diffie Hellman Key exchange
ECDSA - Digital Signature Algorithm</span>

<span>160 bit GF(p) Elliptic Curve....
ER - 22280 iterations 0.45 ms per iteration
ED - 17217 iterations 0.58 ms per iteration
EP - 96332 iterations 0.10 ms per iteration</span>

<span> 160 bit ECDH :-
offline, no precomputation 0.45 ms
offline, w. precomputation 0.10 ms
online 0.45 ms
160 bit ECDSA :-
signature no precomputation 0.45 ms
signature w. precomputation 0.10 ms
verification 0.58 ms</span>

<span>192 bit GF(p) Elliptic Curve....
ER - 17095 iterations 0.58 ms per iteration
ED - 12936 iterations 0.77 ms per iteration
EP - 74904 iterations 0.13 ms per iteration</span>

<span> 192 bit ECDH :-
offline, no precomputation 0.58 ms
offline, w. precomputation 0.13 ms
online 0.58 ms
192 bit ECDSA :-
signature no precomputation 0.58 ms
signature w. precomputation 0.13 ms
verification 0.77 ms</span>

<span>224 bit GF(p) Elliptic Curve....
ER - 11832 iterations 0.85 ms per iteration
ED - 9486 iterations 1.05 ms per iteration
EP - 52869 iterations 0.19 ms per iteration</span>

<span> 224 bit ECDH :-
offline, no precomputation 0.85 ms
offline, w. precomputation 0.19 ms
online 0.85 ms
224 bit ECDSA :-
signature no precomputation 0.85 ms
signature w. precomputation 0.19 ms
verification 1.05 ms</span>

<span>256 bit GF(p) Elliptic Curve....
ER - 9410 iterations 1.06 ms per iteration
ED - 7124 iterations 1.40 ms per iteration
EP - 41546 iterations 0.24 ms per iteration</span>

<span> 256 bit ECDH :-
offline, no precomputation 1.06 ms
offline, w. precomputation 0.24 ms
online 1.06 ms
256 bit ECDSA :-
signature no precomputation 1.06 ms
signature w. precomputation 0.24 ms
verification 1.40 ms</span>

<span>163 bit GF(2^m) Elliptic Curve....
ER - 27160 iterations 0.37 ms per iteration
ED - 20689 iterations 0.48 ms per iteration
EP - 107712 iterations 0.09 ms per iteration</span>

<span> 163 bit ECDH :-
offline, no precomputation 0.37 ms
offline, w. precomputation 0.09 ms
online 0.37 ms
163 bit ECDSA :-
signature no precomputation 0.37 ms
signature w. precomputation 0.09 ms
verification 0.48 ms</span>

<span>163 bit GF(2^m) Koblitz Elliptic Curve....
ER - 43413 iterations 0.23 ms per iteration
ED - 23882 iterations 0.42 ms per iteration
EP - 111239 iterations 0.09 ms per iteration</span>

<span> 163 bit ECDH :-
offline, no precomputation 0.23 ms
offline, w. precomputation 0.09 ms
online 0.23 ms
163 bit ECDSA :-
signature no precomputation 0.23 ms
signature w. precomputation 0.09 ms
verification 0.42 ms</span>

<span>233 bit GF(2^m) Elliptic Curve....
ER - 16703 iterations 0.60 ms per iteration
ED - 12460 iterations 0.80 ms per iteration
EP - 62551 iterations 0.16 ms per iteration</span>

<span> 233 bit ECDH :-
offline, no precomputation 0.60 ms
offline, w. precomputation 0.16 ms
online 0.60 ms
233 bit ECDSA :-
signature no precomputation 0.60 ms
signature w. precomputation 0.16 ms
verification 0.80 ms</span>

<span>233 bit GF(2^m) Koblitz Elliptic Curve....
ER - 27404 iterations 0.36 ms per iteration
ED - 13872 iterations 0.72 ms per iteration
EP - 62887 iterations 0.16 ms per iteration</span>

<span> 233 bit ECDH :-
offline, no precomputation 0.36 ms
offline, w. precomputation 0.16 ms
online 0.36 ms
233 bit ECDSA :-
signature no precomputation 0.36 ms
signature w. precomputation 0.16 ms
verification 0.72 ms</span>

<span>283 bit GF(2^m) Elliptic Curve....
ER - 9870 iterations 1.01 ms per iteration
ED - 7095 iterations 1.41 ms per iteration
EP - 37435 iterations 0.27 ms per iteration</span>

<span> 283 bit ECDH :-
offline, no precomputation 1.01 ms
offline, w. precomputation 0.27 ms
online 1.01 ms
283 bit ECDSA :-
signature no precomputation 1.01 ms
signature w. precomputation 0.27 ms
verification 1.41 ms</span>

<span>283 bit GF(2^m) Koblitz Elliptic Curve....
ER - 19687 iterations 0.51 ms per iteration
ED - 8968 iterations 1.12 ms per iteration
EP - 37505 iterations 0.27 ms per iteration</span>

<span> 283 bit ECDH :-
offline, no precomputation 0.51 ms
offline, w. precomputation 0.27 ms
online 0.51 ms
283 bit ECDSA :-
signature no precomputation 0.51 ms
signature w. precomputation 0.27 ms
verification 1.12 ms</span>

<span>571 bit GF(2^m) Elliptic Curve....
ER - 2227 iterations 4.49 ms per iteration
ED - 1504 iterations 6.65 ms per iteration
EP - 8231 iterations 1.21 ms per iteration</span>

<span> 571 bit ECDH :-
offline, no precomputation 4.49 ms
offline, w. precomputation 1.21 ms
online 4.49 ms
571 bit ECDSA :-
signature no precomputation 4.49 ms
signature w. precomputation 1.21 ms
verification 6.65 ms</span>

<span>571 bit GF(2^m) Koblitz Elliptic Curve....
ER - 5035 iterations 1.99 ms per iteration
ED - 2242 iterations 4.46 ms per iteration
EP - 8247 iterations 1.21 ms per iteration</span>

<span> 571 bit ECDH :-
offline, no precomputation 1.99 ms
offline, w. precomputation 1.21 ms
online 1.99 ms
571 bit ECDSA :-
signature no precomputation 1.99 ms
signature w. precomputation 1.21 ms
verification 4.46 ms</span>

------------------------------------------------------------------------

Pairing-based Crypto
--------------------

Processor: 2.4 GHz Intel i5 520M

AES refers to equivalent AES bits of security. For example 128 bits refers to AES with a128-bit key.

For G1, G2 and GT precomputation, 8-bit windows are used.

All timings are in milli-seconds. Maximum optimization applied.

"One More" refers to the cost of one more pairing in a multi-pairing. The (p) means that precomputation is used.

<span style="text-decoration: underline;">**+Timings for Type-1 pairings G1 X G1 = GT+**</span>

These pairing friendly curves are used, where \_k\_ is the embedding degree

SSP - Super-singular Curve over GF(\_p\_) (512-bit modulus \_p\_, \_k\_=2)

SSP - Super-singular Curve over GF(\_p\_) (1536-bit modulus \_p\_, \_k\_=2)

SS2 - Supersingular Curve over GF(2^\_m\_) (\_m\_=379, \_k\_=4)

SS2 - Supersingular Curve over GF(2^\_m\_) (\_m\_=1223, \_k\_=4)

G1 mul
1.49
0.38
13.57
2.57
G1 mul (p)
0.30
-
3.01
-
Pairing
3.34
1.18
40.95
19.00
Pairing (p)
1.65
-
25.22
-
GT pow
0.36
0.29
3.76
2.09
GT Pow (p)
0.08
-
0.78
-
One More
2.29
1.01
20.80
17.80
One More (p)
0.60
-
5.31
-
<span>AES/Curve</span>

<span>80/SSP</span>

<span>80/SS2</span>

<span>128/SSP</span>

<span>128/SSP</span>

<span style="text-decoration: underline;">**+Timings for Type-3 pairings G2 X G1 = GT+**</span>

These pairing friendly curves are used, where \_k\_ is the embedding degree

CP - Cocks-Pinch Curve over GF(\_p\_) (512-bit modulus \_p\_, \_k\_=2)

MNT - MNT Curve over GF(\_p\_) (160-bit modulus \_p\_, \_k\_=6)

BN - Barreto-Naehrig Curve over GF(\_p\_) (256-bit modulus \_p\_, k=12)

KSS - Kachisa-Schaefer-Scott Curve over GF(\_p\_) (512-bit modulus \_p\_, \_k\_=18)

BLS - Barreto-Lynn-Scott Curve over GF(\_p\_) (640-bit modulus \_p\_, \_k\_=24)

<table style="width:100%;">
<colgroup>
<col width="16%" />
<col width="16%" />
<col width="16%" />
<col width="16%" />
<col width="16%" />
<col width="16%" />
</colgroup>
<thead>
<tr class="header">
<th align="left"><div class="tablesorter-header-inner">
<span>AES/Curve</span>
</div></th>
<th align="left"><div class="tablesorter-header-inner">
<span>80/CP</span>
</div></th>
<th align="left"><div class="tablesorter-header-inner">
<span>80/MNT</span>
</div></th>
<th align="left"><div class="tablesorter-header-inner">
<span>128/BN</span>
</div></th>
<th align="left"><div class="tablesorter-header-inner">
<span>192/KSS</span>
</div></th>
<th align="left"><div class="tablesorter-header-inner">
<span>256/BLS</span>
</div></th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left">G1 mul</td>
<td align="left">0.51</td>
<td align="left">0.19</td>
<td align="left">0.22</td>
<td align="left">0.70</td>
<td align="left">1.26</td>
</tr>
<tr class="even">
<td align="left">G1 mul (p)</td>
<td align="left">0.10</td>
<td align="left">0.04</td>
<td align="left">0.07</td>
<td align="left">0.24</td>
<td align="left">0.43</td>
</tr>
<tr class="odd">
<td align="left">G2 mul</td>
<td align="left">0.51</td>
<td align="left">1.15</td>
<td align="left">0.44</td>
<td align="left">5.53</td>
<td align="left">16.04</td>
</tr>
<tr class="even">
<td align="left">G2 mul(p)</td>
<td align="left">0.10</td>
<td align="left">0.35</td>
<td align="left">0.19</td>
<td align="left">2.81</td>
<td align="left">5.44</td>
</tr>
<tr class="odd">
<td align="left">Pairing</td>
<td align="left">1.14</td>
<td align="left">1.90</td>
<td align="left">2.32</td>
<td align="left">20.55</td>
<td align="left">33.91</td>
</tr>
<tr class="even">
<td align="left">Pairing (p)</td>
<td align="left">0.58</td>
<td align="left">0.69</td>
<td align="left">2.09</td>
<td align="left">18.05</td>
<td align="left">30.45</td>
</tr>
<tr class="odd">
<td align="left">GT pow</td>
<td align="left">0.12</td>
<td align="left">0.24</td>
<td align="left">0.95</td>
<td align="left">6.20</td>
<td align="left">24.87</td>
</tr>
<tr class="even">
<td align="left">GT pow (p)</td>
<td align="left">0.03</td>
<td align="left">0.08</td>
<td align="left">0.43</td>
<td align="left">2.73</td>
<td align="left">6.47</td>
</tr>
<tr class="odd">
<td align="left">One More</td>
<td align="left">0.81</td>
<td align="left">1.57</td>
<td align="left">0.75</td>
<td align="left">4.65</td>
<td align="left">6.59</td>
</tr>
<tr class="even">
<td align="left">One More (p)</td>
<td align="left">0.23</td>
<td align="left">0.34</td>
<td align="left">0.41</td>
<td align="left">2.38</td>
<td align="left">3.42</td>
</tr>
</tbody>
</table>


