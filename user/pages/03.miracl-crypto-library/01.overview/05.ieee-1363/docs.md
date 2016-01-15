---
title: IEEE 1363
taxonomy:
    category: docs
---

The IEEE P1363 standard for Public key Cryptography <a href="http://grouper.ieee.org/groups/1363/" class="external-link">P1363</a> is now complete. A fully multi-threaded IEEE 1363 "wrapper" for MIRACL is available which implements all the cryptographic primitives in this popular standard. It also supports point compression for elliptic curves, and precomputation for faster Digital Signature. GF(p) and GF(2<sup>m</sup>) curves are treated separately. The implemented primitives (some from P1363a) are:-

<table>
<colgroup>
<col width="25%" />
<col width="25%" />
<col width="25%" />
<col width="25%" />
</colgroup>
<thead>
<tr class="header">
<th align="left"><span><strong>DLSVDP-DH</strong></span></th>
<th align="left"><span><strong>DLSVDP-DHC</strong></span></th>
<th align="left"><span><strong>DLSVDP-MQV</strong></span></th>
<th align="left"><span><strong>DLSVDP-MQVC</strong></span></th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left">DLSP-NR</td>
<td align="left">DLVP-NR</td>
<td align="left">DLSP-DSA</td>
<td align="left">DLVP-DSA</td>
</tr>
<tr class="even">
<td align="left">ECSVDP-DH</td>
<td align="left">ECSVDP-DHC</td>
<td align="left">ECSVDP-MQV</td>
<td align="left">ECSVDP-MQVC</td>
</tr>
<tr class="odd">
<td align="left">ECSP-NR</td>
<td align="left">ECVP-NR</td>
<td align="left">ECSP-DSA</td>
<td align="left">ECVP-DSA</td>
</tr>
<tr class="even">
<td align="left">IFEP-RSA</td>
<td align="left">IFDP-RSA</td>
<td align="left">IFSP-RSA1</td>
<td align="left">IFVP-RSA1</td>
</tr>
<tr class="odd">
<td align="left">IFSP-RSA2</td>
<td align="left">IFVP-RSA2</td>
<td align="left">IFSP-RW</td>
<td align="left">IFVP-RW</td>
</tr>
<tr class="even">
<td align="left">DLPSP-NR2/PV</td>
<td align="left">DLSP-NR2</td>
<td align="left">DLVP-NR2</td>
<td align="left">DLSP-PV</td>
</tr>
<tr class="odd">
<td align="left">DLVP-PV</td>
<td align="left">ECPSP-NR2/PV</td>
<td align="left">ECSP-NR2</td>
<td align="left">ECVP-NR2</td>
</tr>
<tr class="even">
<td align="left">ECSP-PV</td>
<td align="left">ECVP-PV</td>
<td align="left"></td>
<td align="left"></td>
</tr>
</tbody>
</table>

The following message encoding and auxiliary functions are also implemented (some from P1363a).

<table>
<colgroup>
<col width="33%" />
<col width="33%" />
<col width="33%" />
</colgroup>
<thead>
<tr class="header">
<th align="left"><span><strong>MGF1</strong></span></th>
<th align="left"><span><strong>EMSA1/2/3/4 (PSS)</strong></span></th>
<th align="left"><span><strong>EMSR1/2/3 (PSS-R)</strong></span></th>
</tr>
</thead>
<tbody>
<tr class="odd">
<td align="left">EME1 (OAEP)</td>
<td align="left">KDF1</td>
<td align="left">KDF2</td>
</tr>
<tr class="even">
<td align="left">MAC1 (HMAC)</td>
<td align="left">AES_CBC_IV0</td>
<td align="left"></td>
</tr>
</tbody>
</table>

Full instructions for evaluation and deployment can be found at the head of the [p1363.c](https://github.com/MIRACL/MIRACL/blob/master/source/p1363/p1363.c) file. These include full instructions for the creation of a Win32/.NET compatible IEEE 1363 Dynamic Link Library (DLL), so that IEEE 1363 functionality can be easily integrated into your Win32/.NET application. A test program implements instances of signature and encryption schemes ECDSA, IFSSA, IFSSR, DLSSR, DLSSR-PV and ECIES.
