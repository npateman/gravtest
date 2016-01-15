---
title: MIRACL Error Messages
taxonomy:
    category: docs
---

11. MIRACL Error Messages
=========================

MIRACL error messages, diagnosis and response.

**Message:** Number base too big for representation

**Diagnosis:** An attempt has been made to input or output a number using a number base that is too big. For example outputting using a number base of 2<sup>32</sup> is clearly impossible. For efficiency the largest possible internal number base is used, but numbers in this format should be input/output to a much smaller number base £ 256. This error typically arises when using using *innum*(.) or *otnum*(.) after *mirsys*(.,0*)*.

**Response:** Perform a change of base prior to input/output. For example set the instance variable **IOBASE** to 10, and then use *cinnum*(.) or *cotnum*(.). To avoid the change in number base, an alternatively is to initialise MIRACL using something like *mirsys*(400,16*)* which uses an internal base of 16. Now Hex I/O can be performed using *innum*(.) and *otnum*(.). Note that this will not impact performance on a 32-bit processor, as 8 Hex digits will be packed into each computer word.

****

**Message:** Division by zero attempted

**Diagnosis:** Self-explanatory

**Response:** Don't do it!

****

**Message:** Overflow - Number too big

**Diagnosis:** A number in a calculation is too big to be stored in its fixed length allocation of memory.

**Response:** Specify more storage space for all *big* and *flash* variables, by increasing the value of *n* in the initial call to *mirsys*(n.b);

****

**Message:** Internal Result is Negative

**Diagnosis:** This is an internal error that should not occur using the high level MIRACL functions. It may be caused by user-induced memory over-runs.

**Response:** Report to <script type="text/javascript">
<!--
h='&#x4d;&#x49;&#82;&#x41;&#x43;&#76;&#46;&#x63;&#x6f;&#x6d;';a='&#64;';n='&#x6d;&#x69;&#x6b;&#x65;&#46;&#x73;&#x63;&#x6f;&#116;&#116;';e=n+a+h;
document.write('<a h'+'ref'+'="ma'+'ilto'+':'+e+'" clas'+'s="em' + 'ail">'+e+'<\/'+'a'+'>');
// -->
</script><noscript>&#x6d;&#x69;&#x6b;&#x65;&#46;&#x73;&#x63;&#x6f;&#116;&#116;&#32;&#x61;&#116;&#32;&#x4d;&#x49;&#82;&#x41;&#x43;&#76;&#32;&#100;&#x6f;&#116;&#32;&#x63;&#x6f;&#x6d;</noscript>

****

**Message:** Input Format Error

**Diagnosis:** The number being input contains one or more illegal symbols with respect to the current I/O number base. For example this error might occur if **IOBASE** is set to 10, and a Hex number is input.

**Response:** Re-input the number, and be careful to use only legal symbols. Note that for Hex input only upper-case A-F are permissible.
****

**Message:** Illegal number base

**Diagnosis:** The number base specified in the call to *mirsys*(.) is illegal. For example a number base of 1 is not allowed.

**Response:** Use a different number base.

****

**Message:** Illegal parameter usage

**Diagnosis:** The parameters used in a function call are not allowed. In certain cases certain parameters must be distinct - for example in *divide*(.) the first two parameters must refer to distinct *big* variables.

**Response:** Read the documentation for the function in question.

****

**Message:** Out of space

**Diagnosis:** An attempt has been made by a MIRACL function to allocate too much heap memory.

**Response:** Reduce your memory requirements. Try using a smaller value of *n* in your initial call to *mirsys(n,b).*

**Message:** Even root of a negative number

**Diagnosis:** An attempt has been made to find, for example, the square root of a negative number.

**Response:** Don't do it!

****

**Message:** Raising integer to negative power

**Diagnosis:** Self-explanatory.

**Response:** Don't do it!

**Message:** Integer operation attempted on flash number

**Diagnosis:** Certain functions should only be used with *big* numbers, and do not make sense for *flash* numbers. Note that this error message is often provoked by memory problems, where for example the memory allocated to a *big* variable is accidentally over-written.

**Response:** ** Don't do it!

****

**Message:** Flash overflow

**Diagnosis:** This error is provoked by Flash overflow or underflow. The result is outside of the representable dynamic range.

**Response:** Use bigger *flash* numbers. Analyse your program carefully for numerical instability.
****

**Message: **** Numbers too big

**Diagnosis:** The size of *big* or *flash* numbers requested in your call to *mirsys(.)* are simply too big. The length of each *big* and *flash* is encoded into a single computer word. If there is insufficient room for this encoding, this error message occurs.

**Response:** Build a MIRACL library that uses a bigger "underlying type". If not using Flash arithmetic, build a library without it - this allows much bigger *big* numbers to be used.

****

**Message:** Log of a non-positive number

**Diagnosis:** An attempt has been made to calculate the logarithm of a non-positive *flash* number.

**Response:** Don't do it!

**Message:** Flash to double conversion failure

**Diagnosis:** An attempt to convert a Flash number to the standard built-in C *double* type has failed, probably because the Flash number is outside of the dynamic range that can be represented as a *double.*

**Response:** Don't do it!

****

**Message:** I/O buffer overflow

**Diagnosis:** An input output operation has failed because the I/O buffer is not big enough.

**Response:** Allocate a bigger buffer by calling *set\_io\_buffer\_size(.)* after calling *mirsys(.)*.

****

**Message:** MIRACL not initialised - no call to mirsys()

**Diagnosis:** Self-explanatory

**Response:** Don't do it!

****

**Message:** Illegal modulus

**Diagnosis:** The modulus specified for use internally forMontgomery reduction, is illegal. Note that this modulus must not be even.

**Response:** Use an odd positive modulus.

****

**Message:** No modulus defined

**Diagnosis:** No modulus has been specified, yet a function which needs it has been called.

**Response:** Set a modulus for use internally

****

**Message:** Exponent too big

**Diagnosis:** An attempt has been made to perform a calculation using a pre-computed table, for an exponent (or multiplier in the case of elliptic curves) bigger than that catered for by the pre-computed table.

**Response:** Re-compute the table to allow bigger exponents, or use a smaller exponent.
****

**Message:** Number base must be power of 2

**Diagnosis:** A small number of functions require that the number base specified in the initial call to *mirsys(.)* is a power of 2.

**Response:** Use another function, or specify a power-of-2 as the number base in the initial call to *mirsys(.)*

****

**Message:** Specified double-length type isn't

**Diagnosis:** MIRACL has determined that the double length type specified in *mirdef.h* is in fact not double length. For example if the underlying type is 32-bits, the double length type should be 64 bits.

**Response:** Don't do it!

****

**Message:** Specified basis is not irreducible

**Diagnosis:** The basis specified for GF(2<sup>m</sup>) arithmetic is not irreducible.

**Response:** Don't do it!
