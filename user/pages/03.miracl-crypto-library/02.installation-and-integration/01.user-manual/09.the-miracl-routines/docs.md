---
title: 9. The MIRACL Routines
taxonomy:
    category: docs
---

Note: In these routines a *big* parameter can also be used wherever a *flash* is specified, but not visa-versa. Further information may be gleaned from the (lightly) commented source code. An asterisk \* after the name indicates that the function does not take a *mip* parameter if **MR\_GENERIC\_MT** is defined in *mirdef.h*. See Section 2.3 for more details.

9.1 Low level routines
----------------------

### 9.1.1 absol \*

Function: void **absol**(x,y)

flash x,y;

Module: mrcore.c

Description: Gives absolute value of a big or flash number.

Parameters: Two big/flash variables *x* and *y*. On exit *y*=|*x*|.

Return value: None

Restrictions: None

### 9.1.2 add

Function: void **add**(x,y,z)

big x,y,z;

Module: mrarth0.c

Description: Adds two big numbers.

Parameters: Three big numbers *x*, *y* and *z*. On exit *z=x+y*.

Return value: None

Restrictions: None

Example: add(x,x,x); /\* This doubles the value of *x*. \*/

### 9.1.3 brand

Function: int **brand**()

Module: mrcore.c

Description: Generates random integer number

Parameters: None

Return Value: A random integer number

Restrictions: First use must be preceded by an initial call to **irand**.

NOTE: This generator is <span style="text-decoration: underline;">not</span> cryptographically strong. For cryptographic applications, use the **strong\_rng** routine.

### 9.1.4 bigbits

Function: void **bigbits**(n,x)

int n;

big x;

Module: mrbits.c

Description: Generates a big random number of given length. Uses the built-in simple random number generator initialised by **irand.**

Parameters A big number *x* and an integers *n*. On exit *x* contains a big random number *n* bits long.

Return value: None

Restrictions: None

Example: bigbits(100,x);

This generates a 100 bit random number

### 9.1.5 big\_to\_bytes

Function: int **big\_to\_bytes**(max,x,ptr,justify)

int max;

big x;

char \*ptr;

BOOL justify

Module: mrarth1.c

Description: Converts a positive big number *x* into a binary octet string

Parameters: A big number *x* and a byte array *ptr* of length *max*. Error checking is carried out to ensure that the function does not write beyond the limits of *ptr* if *max&gt;0*. If *max*=0, no checking is carried out. If *max*&gt;0 and *justify*=TRUE, the output is right-justified, otherwise leading zeros are suppressed.

Return value: The number of bytes generated in *ptr*. If *justify*=TRUE then the return value is *max*.

Restrictions: *max* must be greater than 0 if *justify*=TRUE

### 9.1.6 bytes\_to\_big

Function: void **bytes\_to\_big**(len,ptr,x)

int len;

char \*ptr;

big x;

Module: mrarth1.c

Description: Converts a binary octet string to a big number. Binary to big conversion.

Parameters: A pointer to a byte array *ptr* of length *len*, and a big result *x*.

Return value: None

Restrictions: None

Example:

/\*

\* test program to exercise big\_to\_bytes() and bytes\_to\_big()

\*/

\#include &lt;stdio.h&gt;

\#include "miracl.h"

int main()

{

int i,len;

miracl \*mip=mirsys(100,0);

big x,y;

char b\[200\]; /\* b needs space allocated to it \*/

x=mirvar(0); /\* all big variables need to be "mirvar"ed \*/

y=mirvar(0);

expb2(100,x);

incr(x,3,x); /\* x=2^100 + 3 \*/

len=big\_to\_bytes(200,x,b,FALSE);

/\* Now b contains big number x in raw binary \*/

/\* it is len bytes in length \*/

/\* now print out the raw binary number b in hex \*/

for (i=0;i&lt;len;i++) printf("%02x",b\[i\]);

printf("\\n");

bytes\_to\_big(len,b,y);

/\* now convert it back to big format, and print it out again \*/

mip-&gt;IOBASE=16;

cotnum(y,stdout);

return 0;

}

### 9.1.7 cinnum

Function: int **cinnum**(x,f)

flash x;

FILE \*f;

Module: mrio2.c

Description: Inputs a flash number from the keyboard or a file, using as number base the current value of the instance variable IOBASE. Flash numbers can be entered using either a slash '/' to indicate numerator and denominator, or with a radix point.

Parameters: A big/flash number *x* and a file descriptor *f*. For input from the keyboard specify *f* as *stdin*, otherwise as the descriptor of some other opened file. To force input of a fixed number of bytes, set the instance variable INPLEN to the required number, just before calling **cinnum**.

Return value: The number of input characters.

Restrictions: None

Example: mip-&gt;IOBASE=256;

mip-&gt;INPLEN=14; /\* This inputs 14 bytes from *fp* and \*/

cinnum(x,fp); /\* converts them into big number *x* \*/

### 9.1.8 cinstr

Function: int **cinstr**(x,s)

flash x;

char \*s;

Module; mrio2.c

Description: Inputs a flash number from a character string, using as number base the current value of the instance variable IOBASE. Flash numbers can be input using a slash '/' to indicate numerator and denominator, or with a radix point.

Parameters: A big/flash number *x* and a string *s*.

Return value: The number of input characters.

Restrictions: None

Example: /\* input large hex number into big x \*/

mip-&gt;IOBASE=16;

cinstr(x,"AF12398065BFE4C96DB723A");

### 9.1.9 compare \*

Function: int **compare**(x,y)

big x,y;

Module: mrcore.c

Description: Compares two big numbers.

Parameters: Two big numbers *x* and *y*.

Return value: Returns +1 if *x&gt;y*, returns 0 if *x=y*, returns -1 if *x&lt;y*.

Restrictions: None

****

### <span>9.1.10 convert</span>

<span> </span>

Function: void **convert**(n,x)

int n;

big x;

Module: mrcore.c

Description: Convert an integer number to big number format.

Parameters: An integer *n* and a big number *x*.

Return value: None

Restrictions: None

### 9.1.11 copy \*

Function: void **copy**(x,y)

flash x,y;

Module: mrcore.c

Description: Copies a big or flash number to another.

Parameters: Two big or flash numbers *x* and *y*. On exit *y=x*. Note that if *x* and *y* are the same variable, no operation is performed.

Return value: None

Restrictions: None

### 9.1.12 cotnum

Function: int **cotnum**(x,f)

flash x;

FILE \*f;

Module: mrio2.c

Description: Output a big or flash number to the screen or to a file, using as number base the value currently assigned to the instance variable IOBASE. A flash number will be converted to radix-point representation if the instance variable RPOINT=ON. Otherwise it will be output as a fraction.

Parameters A big/flash number *x* and a file descriptor *f*. If *f* is *stdout* then output will be to the screen, otherwise to the file opened with descriptor *f*.

Return value: Number of output characters.

Restrictions: None

Example: mip-&gt;IOBASE=16;

cotnum(x,fp);

This outputs *x* in hex, to the file associated with *fp*.

### 9.1.13 cotstr

Function: int **cotstr**(x,s)

flash x;

char \*s;

Module: mrio2.c

Description Output a big or flash number to the specified string, using as number base the value currently assigned to the instance variable IOBASE. A flash number will be converted to radix-point representation if the instance variable RPOINT=ON. Otherwise it will be output as a fraction.

Parameters A big/flash number *x* and a string *s*. On exit *s* will contain a representation of the number *x*.

Return value: Number of output characters.

Restrictions Note that there is nothing to prevent this routine from overflowing the limits of the user supplied character array *s*, causing obscure runtime problems. It is the programmers responsibility to ensure that *s* is big enough to contain the number output to it. Alternatively use the internally declared instance string **IOBUFF**, which is of size **IOBSIZ**. If this array overflows a MIRACL error **will** be flagged.

### 9.1.14 decr

Function: void **decr**(x,n,z)

big x,z;

int n;

Module: mrarth0.c

Description: Decrement a big number by an integer amount.

Parameters: Big numbers *x* and *z*, and integer *n.*

On exit *z=x-n*.

Return value: None

Restrictions: None

### 9.1.15 divide

Function: void **divide**(x,y,z)

big x,y,z;

Module: mrarth2.c

Description: Divides one big number by another.

Parameters: Three big numbers *x*, *y* and *z*. On exit *z=x/y*; *x=x mod y*. The quotient only is returned if *x* and *z* are the same, the remainder only if *y* and *z* are the same.

Return value: None

Restrictions: Parameters *x* and *y* must be different, and *y* must be non-zero.

Example: divide(x,y,y);

This sets *x* equal to the remainder when *x* is divided by *y*. The quotient is not returned.

### 9.1.16 divisible

Function: BOOL **divisible**(x,y)

big x,y;

Module: mrarth2.c

Description: Tests a big number for divisibility by another

Parameters: Two big numbers *x* and *y*.

Return value: TRUE if *y* divides *x* exactly, otherwise FALSE

Restrictions: The parameter *y* must be non-zero.

****

### 9.1.17 ecp\_memalloc

Function: void \***ecp\_memalloc**(n)

int n;

Module: mrcore.c

Description: Reserves space for *n* elliptic curve points in one heap access. Individual points can subsequently be initialised from this memory by calling **epoint\_init\_mem**.

Parameters: The number *n* of elliptic curve points to reserve space for.

Return value: A pointer to the allocated memory.

Restrictions: None.

### 9.1.18 ecp\_memkill

Function: void **ecp\_memkill**(mem,n)

char \*mem;

int n;

Module: mrcore.c

Description: Deletes and sets to zero the memory previously allocated by **ecp\_memalloc**

****

Parameters: A pointer to the memory to be erased and deleted, and the size of that memory in elliptic curve points.

Return value: None

Restrictions: Must be preceded by a call to **ecp\_memalloc**

****

### 9.1.19 exsign \*

Function: int **exsign**(x)

flash x;

Module: mrcore.c

Description: Extracts the sign of a big/flash number.

Parameters: A big/flash number *x*.

Return value: The sign of *x*, i.e. -1 if *x* is negative, +1 if *x* is zero or positive.

Restrictions: None

### 9.1.20 getdig

Function: int **getdig**(x,i)

big x;

int i;

Module: mrcore.c

Description: Extracts a digit from a big number.

Parameters: A big number *x*, and the required digit *i*.

Return value: The value of the requested digit.

Restrictions: Returns rubbish if required digit does not exist.

### 9.1.21 get\_mip

Function: miracl \***get\_mip**(void)

Module: mrcore.c

Description: Get the current <span style="text-decoration: underline;">M</span>iracl <span style="text-decoration: underline;">I</span>nstance <span style="text-decoration: underline;">P</span>ointer

Parameters: None

Return value: The *mip* - <span style="text-decoration: underline;">M</span>iracl <span style="text-decoration: underline;">I</span>nstance <span style="text-decoration: underline;">P</span>ointer – for the current thread.

Restrictions: This function does not exist if **MR\_GENERIC\_MT** is defined.

### 9.1.22 igcd \*

Function: int **igcd**(x,y)

int x,y;

Module: mrcore.c

Description: Calculates the Greatest Common Divisor of two integers using Euclids Method.

Parameters: Two integers *x* and *y*

Return value: The GCD of *x* and *y*

**

### 9.1.23 incr

Function: void **incr**(x,n,z)

big x,z;

int n;

Module: mrarth0.c

Description: Increment a big variable.

Parameters: Big numbers *x* and *z*, and an integer *n*. On exit *z=x+n*.

Return value: None

Restrictions: None

Example: incr(x,2,x); /\* This increments x by 2. \*/

### 9.1.24 init\_big\_from\_rom

Function: BOOL **init\_big\_from\_rom**(big,int,const mr\_small\*,int,int\*)

big x;

int len;

const mr\_small \*rom;

int romsize;

int \*romptr;

Module: mrcore.c

Description: Initialises a big variable from ROM memory.

Parameters: A big number *x* and its length in computer words. The address of ROM memory which stores up to *romsize* computer words, and a pointer into the ROM. This pointer is incremented internally as ROM memory is accessed to fill *x*.

Return value: TRUE if successful, or FALSE if an attempt is made to read beyond the end of the ROM

### 9.1.25 init\_point\_from\_rom

Function: BOOL **init\_point\_from\_rom**(epoint \*,int,const mr\_small\*,int,int\*)

epoint \*P;

int len;

const mr\_small \*rom;

int romsize;

int \*romptr;

Module: mrcore.c

Description: Initialises an elliptic curve point from ROM memory.

Parameters: An elliptic curve point *P* and its length of its two big coordinates in computer words. The address of ROM memory which stores up to *romsize* computer words, and a pointer into the ROM. This pointer is incremented internally as ROM memory is accessed to fill *P*.

Return value: TRUE if successful, or FALSE if an attempt is made to read beyond the end of the ROM

<span>9.1.26 innum</span>

Function: int **innum**(x,f)

flash x;

FILE \*f;

Module: mrio1.c

Description: Inputs a big or flash number from a file or the keyboard, using as number base the value specified in the initial call to **mirsys**. Flash numbers can be entered using either a slash '/' to indicate numerator and denominator, or with a radix point.

Parameters: A big/flash number *x* and a file descriptor *f*. For input from the keyboard specify *f* as *stdin*, otherwise as the descriptor of some other opened file.

Return value: The number of characters input.

Restrictions: The number base specified in **mirsys** must be less than or equal to 256. If not use **cinnum** instead.

Hint: For fastest inputting of ASCII text to a big number, and if a full-width base is possible, use mirsys(...,256); initially. This has the same effect as specifying mirsys(...,0);, except that now ASCII bytes may be input directly via innum(x,fp); without the time-consuming change of base implicit in the use of **cinnum**.

### 9.1.27 insign \*

Function: void **insign**(s,x)

int s;

flash x;

Module: mrcore.c

Description: Forces a big/flash number to a particular sign.

Parameters: A big/flash number *x*, and the sign *s* that it is to take. On exit *x=s.|x*|.

Return value: None

Restrictions: None

Example: insign(PLUS,x); /\* force *x* to be positive \*/

### 9.1.28 instr

Function: int **instr**(x,s)

flash x;

char \*s;

Module: mrio1.c

Description Inputs a big or flash number from a character string, using as number base the value specified in the initial call to **mirsys**. Flash numbers can be entered using either a slash '/' to indicate numerator and denominator, or with a radix point.

Parameters A big/flash number *x* and a character string *s*.

Return value: The number of characters input.

Restrictions The number base specified in **mirsys** must be less than or equal to 256. If not use **cinstr** instead.

<span>9.1.29 irand</span>

Function: void **irand**(seed)

long seed;

Module: mrcore.c

Description: Initializes internal random number system. Long integer types are used internally to yield a generator with maximum period.

Parameters: A long integer seed, which is used to start off the random number generator.

Return value: None

Restrictions: None

### 9.1.30 lgconv

Function: void **lgconv**(ln,x)

long ln;

big x;

Module: mrcore.c

Description: Converts a long integer to big number format

Parameters: A long integer *ln* and a big number *x*

Return value: None

Restrictions: None

<span>9.1.31 mad</span>

Function: void **mad**(x,y,z,w,q,r)

big x,y,z,w,q,r;

Module: mrarth2.c

Description: Multiply add and divide big numbers. The initial product is stored in a double-length internal variable to avoid the possibility of overflow at this stage.

Parameters: Six big numbers *x,y,z,w,q* and *r*. On exit *q=(x.y+z)/w* and *r* contains the remainder. If *w* and *q* are not distinct variables then only the remainder is returned; if *q* and *r* are not distinct then only the quotient is returned. The addition of *z* is not done if *x* and *z* (or *y* and *z*) are the same.

Return value: None

Restrictions: Parameters *w* and *r* must be distinct. The value of *w* must not be zero.

Example: mad(x,x,x,w,x,x); /\* *x=x^2/w* \*/

### 9.1.32 memalloc

Function: void \***memalloc**(n)

int n;

Module: mrcore.c

Description: Reserves space for *n* big variables in one heap access. Individual big/flash variables can subsequently be initialised from this memory by calling **mirvar\_mem**.

Parameters: The number *n* of big/flash variables to reserve space for.

Return value: A pointer to the allocated memory.

Restrictions: None.

### 9.1.33 memkill

Function: void **memkill**(mem,n)

char \*mem;

int n;

Module: mrcore.c

Description: Deletes and sets to zero the memory previously allocated by **memalloc**

****

Parameters: A pointer to the memory to be erased and deleted, and the size of that memory in bigs.

Return value: None

Restrictions: Must be preceded by a call to **memalloc**

### 9.1.34 mirexit

Function: void **mirexit**()

Module: mrcore.c

Description Cleans up after the current instance of MIRACL, and frees all internal variables. A subsequent call to **mirsys** will re-initialise the MIRACL system.

Parameters: None

Return value: None

Restrictions: Must be called after **mirsys**.

****

### 9.1.35 mirkill \*

Function: void **mirkill**(x)

big x;

Module: mrcore.c

Description: Securely kills off a big/flash number by zeroising it, and freeing its memory.

Parameters: A big/flash number *x*.

Return Value: None

### 9.1.36 mirsys

Function: miracl \***mirsys**(nd,nb)

int nd,nb;

Module: mrcore.c

Description: Initialise the MIRACL system for the current program thread, as described below. Must be called before attempting to use any other MIRACL routines.

(1) The error tracing mechanism is initialised.

(2) the number of computer words to use for each big/flash number is calculated from *nd* and *nb*.

(3) Sixteen big work variables (four of them double length) are initialised.

(4) Certain instance variables are given default initial values.

(5) The random number generator is started by calling **irand(0L)**.

Parameters: The number of digits *nd* to use for each big/flash variable and the number base *nb*. If *nd* is negative it is taken as indicating the size of big/flash numbers in 8-bit bytes.

Return value: The MIRACL Instance Pointer, via which all instance variables can be accessed, or NULL if there was not enough memory to create an instance.

Restrictions: The number base *nb* should normally be greater than 1 and less than or equal to MAXBASE. A base of 0 implies that the 'full-width' number base should be used. The number of digits *nd* must be less than a certain maximum, depending on the underlying type *mr\_utype* and on whether or not **MR\_FLASH** is defined. (See *mirdef.h*)

Example: miracl \*mip=mirsys(500,10);

This initialises the MIRACL system to use 500 decimal digits for each big or flash number.

****

### 9.1.37 mirvar

Function: flash **mirvar**(iv)

int iv;

Module: mrcore.c

Description: Initialises a big/flash variable by reserving a suitable number of memory locations for it. This memory may be released by a subsequent call to the function **mirkill**.

Parameters: An integer initial value for the big/flash number.

Return value: A pointer to the reserved memory.

Restrictions: None

Example: flash x;

x=mirvar(8);

Creates a flash variable *x=8*.

### 9.1.38 mirvar\_mem

Function: flash **mirvar\_mem**(mem,index)

char \*mem;

int index;

Module: mrcore.c

Description: Initialises memory for a big/flash variable from a pre-allocated byte array *mem*. This array may be created from the heap by a call to **memalloc**, or in some other way. This is quicker than multiple calls to **mirvar**.

Parameters: A pointer to the pre-allocated array *mem*, and an index into that array. Each index should be unique.

Return value: An initialised big/flash variable

Restrictions: Sufficient memory must have been allocated and pointed to by *mem*.

Example: See *brent.c* for an example of use.

### 9.1.39 multiply

Function: void **multiply**(x,y,z)

big x,y,z;

Module: mrarth2.c

Description: Multiplies two big numbers

Parameters: Three big numbers *x,y* and *z*. On exit *z=x.y*

Return value: None

Restrictions: None

### 9.1.40 negify \*

Function: void **negify**(x,y)

flash x,y;

Module: mrcore.c

Description: Negates a big/flash number.

Parameters: Two big/flash numbers *x* and *y*. On exit *y=-x*.

Return value: None

Restrictions: None. Note that negify(x,x) is valid and sets *x=-x*

### 9.1.41 normalise

Function: int **normalise**(x,y)

big x,y;

Module: mrarth2.c

Description Multiplies a big number such that its Most Significant Word is greater than half the number base. If such a number is used as a divisor by **divide**, the division will be carried out faster. If many divisions by the same divisor are required, it makes sense to normalise the divisor just once beforehand.

Parameters: Two big numbers *x* and *y*. On exit *y=n.x*.

Return value: Returns *n*, the normalising multiplier.

Restrictions: Use with care. Used internally.

<span>9.1.42 numdig</span>

Function: int **numdig**(x)

big x;

Module: mrcore.c

Description: Determines the number of digits in a big number.

Parameters: A big number *x*.

Return value: The number of digits in *x*.

Restrictions: None

### 9.1.43 otnum

Function: int **otnum**(x,f)

flash x;

FILE \*f;

Module: mrio1.c

Description Output a big or flash number to the screen or to a file, using as number base the value specified in the initial call to **mirsys**. A flash number will be converted to radix-point representation if the instance variable RPOINT=ON. Otherwise it will be output as a fraction.

Parameters A big/flash number *x* and a file descriptor *f*. If *f* is *stdout* then output will be to the screen, otherwise to the file opened with descriptor *f*.

Return value: Number of output characters.

Restrictions The number base specified in **mirsys** must be less than or equal to 256. If not, use **cotnum** instead.

<span>9.1.44 otstr</span>

Function: int **otstr**(x,s)

flash x;

char \*s;

Module: mrio1.c

Description Output a big or flash number to the specified string, using as number base the value specified in the initial call to **mirsys**. A flash number will be converted to radix-point representation if the instance variable RPOINT=ON. Otherwise it will be output as a fraction.

Parameters A big/flash number *x* and a character string *s*. On exit *s* will contain a representation of *x*.

Return value: Number of output characters.

Restrictions The number base specified in **mirsys** must be less than or equal to 256. If not, use **cotstr** instead.

Note that there is nothing to prevent this routine from overflowing the limits of the user supplied character array *s*, causing obscure runtime problems. It is the programmers responsibility to ensure that *s* is big enough to contain the number output to it. Alternatively use the internally declared instance string **IOBUFF**, which is of size **IOBSIZ**. If this array overflows a MIRACL error **will** be flagged.

### 9.1.45 premult

Function: void **premult**(x,n,z)

int n

big x,z;

Module: mrarth1.c

Description: Multiplies a big number by an integer

Parameters: Two big numbers *x* and *z*, and an integer *n*.

On exit *z=n.x*

Return value: None

Restrictions: None

### 9.1.46 putdig

Function: void **putdig**(n,x,i)

big x;

int i,n;

Module: mrcore.c

Description: Set a digit of a big number to a given value

Parameters: A big number *x*, a digit number *i*, and its new value *n*.

Return value: None

Restrictions: The digit indicated must exist.

### 9.1.47 remain

Function: int **remain**(x,n)

big x;

int n;

Module: mrarth1.c

Description: Finds the integer remainder, when a big number is divided by an integer.

Parameters: A big number *x*, and an integer *n*.

Return value: The integer remainder

### 9.1.48 set\_io\_buffer\_size

Function: void set\_io\_buffer\_size(len)

int len;

Module: mrcore.c

Description: Sets the size of the input/output buffer. By default this is set to 1024, but programs that need to handle very large numbers may require a larger I/O buffer.

Parameters: The size of I/O buffer required.

Return value: None

Restrictions: Destroys the current contents of the I/O buffer

### 9.1.49 set\_user\_function

Function: void set\_user\_function(func)

BOOL (\*user)(void);

Module: mrcore.c

Description: Supplies a user-specified function, which is periodically called during some of the more time-consuming MIRACL functions, particularly those involved in modular exponentiation and in finding large prime numbers. The supplied function must take no parameters and return a BOOL value. Normally this should be TRUE. If FALSE then MIRACL will attempt to abort its current operation. In this case the function should continue to return FALSE until control is returned to the calling program. The user-supplied function should normally include only a few instructions, and no loops, otherwise it may adversely impact the speed of MIRACL functions.

Once MIRACL is initialised, this function may be called multiple times with a new supplied function. If no longer required, call with a NULL parameter.

Parameters: A pointer to a user-supplied function, or NULL if not required.

Return value: None

Example: /\* Windows Message Pump \*/

static BOOL idle()

{

MSG msg;

if (PeekMessage(&msg,NULL,0,0,PM\_NOREMOVE))

{

if (msg.message!=WM\_QUIT)

{

if (PeekMessage(&msg,NULL,0,0,PM\_REMOVE))

{ /\* do a Message Pump \*/

TranslateMessage(&msg);

DispatchMessage(&msg);

}

}

else return FALSE;

}

return TRUE;

}

…….

set\_user\_function(idle);

### 9.1.50 size \*

Function: int **size**(x)

big x;

Module: mrcore.c

Description Tries to convert big number to a simple integer. Also useful for testing the sign of big/flash variable as in: if (size(x)&lt;0) ...

Parameters: A big number *x*.

Return value: The value of *x* as an integer. If this is not possible (because *x* is too big) it returns the value plus or minus **MR\_TOOBIG.**

Restrictions: None

### 9.1.51 subdiv

Function: int **subdiv**(x,n,z)

int n;

big x,z;

Module: mrarth1.c

Description: Divide a big number by an integer.

Parameters: Two big numbers *x* and *z*, and an integer *n*.

On exit *z=x/n*.

Return value: The integer remainder.

Restrictions: The value of *n* must not be zero.

### 9.1.52 subdivisible

Function: BOOL **subdivisible**(x,n)

big x;

int n;

Module: mrarth1.c

Description: Tests a big number for divisibility by an integer.

Parameters: A big number *x* and an integer *n*.

Return value: TRUE is *n* divides *x* exactly, otherwise FALSE.

Restrictions: The value of *n* must not be zero.

### 9.1.53 subtract

Function: void **subtract**(x,y,z)

big x,y,z;

Module: mrarth0.c

Description: Subtracts two big numbers.

Parameters: Three big numbers *x*, *y* and *z*. On exit *z=x-y*.

Return value: None

Restrictions: None

### 9.1.54 zero \*

Function: void **zero**(x)

flash x;

Module: mrcore.c

Description: Sets a big or flash number to zero

Parameters: A big or flash number *x*.

Return value: None

9.2 Advanced Arithmetic Routines
--------------------------------

### 9.2.1 bigdig

Function: void **bigdig**(n,b,x)

int n,b;

big x;

Module: mrrand.c

Description: Generates a big random number of given length. Uses the built-in simple random number generator initialised by **irand.**

Parameters A big number *x* and two integers *n* and *b*. On exit *x* contains a big random number *n* digits long to base *b*.

Return value: None

Restrictions: The base *b* must be printable, that is 2 £ *b* £ 256.

Example: bigdig(100,10,x);

This generates a 100 decimal digit random number

### 9.2.2 bigrand

Function: void **bigrand**(w,x)

big w,x;

Module: mrrand.c

Description: Generates a big random number. Uses the built-in simple random number generator initialised by **irand.**

Parameters: Two big numbers *w* and *x*. On exit *x* is a big random number in the range *0£x&lt;w*.

Return value: None

Restrictions: None

<span>9.2.3 brick\_init</span>

Function: BOOL **brick\_init**(binst,g,n,w,nb)

brick \*binst;

big g,n;

int w,nb;

Module: mrbrick.c

Description: Initialises an instance of the Comb method for modular exponentiation with precomputation. Internally memory is allocated for 2*<sup>w</sup>* big numbers which will be precomputed and stored. For bigger *w* more space is required, but the exponentiation is quicker. Try *w*=8.

Parameters: A pointer to the current instance *binst*, the fixed generator *g*, the modulus *n*, the window size *w*, and the maximum number of bits to be used in the exponent *nb*.

Return value: TRUE if all went well, FALSE if there was a problem.

Restrictions: Note: If MR\_STATIC is defined in *mirdef.h*, then the *g* parameter in this function is replaced by an mr\_small \* pointer to a precomputed table. In this case the function returns a void.

### 9.2.4 brick\_end \*

Function: void **brick\_end**(binst)

brick \*binst

Module: mrbrick.c

Description: Cleans up after an application of the Comb method.

Parameters: A pointer to the current instance

Return value: None

Restrictions: None

### 9.2.5 crt

Function: void **crt**(pbc,rem,x)

big\_chinese \*pbc;

big \*rem;

big x;

Module: mrcrt.c

Description Applies Chinese Remainder Theorem.

Parameters: A pointer *pbc* to the current instance. On exit *x* contains the big number which yields the given big remainders *rem\[.\]* when it is divided by the big moduli specified in a prior call to **crt\_init**.

Return value: None

Restrictions: The routine **crt\_init** must be called first.

### 9.2.6 crt\_end \*

Function: void **crt\_end**(pbc)

big\_chinese \*pbc;

Module: mrcrt.c

Description: Cleans up after an application of the Chinese Remainder Theorem.

Parameters: A pointer to the current instance of the Chinese Remainder Theorem.

Return value: None

Restrictions: None

### 9.2.7 crt\_init

Function: BOOL **crt\_init**(pbc,np,m)

big\_chinese \*pbc;

int np;

big \*m;

Module: mrcrt.c

Description: Initialises an instance of the Chinese Remainder Theorem. Some internal workspace is allocated.

Parameters: A pointer to the current instance *pbc*, the number of co-prime moduli *np*, and an array of at least two big moduli *m\[.\]*

Return value: TRUE if all went well, FALSE if there was a problem.

Restrictions: None

### 9.2.8 egcd

Function: int **egcd**(x,y,z)

big x,y,z;

Module: mrgcd.c

Description: Calculates the Greatest Common Divisor of two big numbers.

Parameters: Three big numbers *x, y* and *z*.

On exit *z=gcd(x,y)*

Return value: GCD as integer, if possible, otherwise **MR\_TOOBIG**

Restrictions: None

### 9.2.9 expb2

Function: void **expb2**(n,x)

int n;

big x;

Module: mrbits.c

Description: Calculates 2 to the power of an integer as a big

Parameters: An integer *n*, and a big result *x*.

On exit *x=2<sup>n</sup>.*

Return value: None

Restrictions: None

Example: expb2(1398269,x);

decr(x,1,x);

mip-&gt;IOBASE=10;

cotnum(x,stdout);

This calculates and prints out the largest known prime number (on a true 32-bit computer with lots of memory!)

### 9.2.10 expint

Function: void **expint**(b,n,x)

int b,n;

big x;

Module: mrarth3.c

Description: Calculates an integer to the power of an integer as a big

Parameters: An integer *b*, an integer *n*, and a big result *x*.

On exit *x=b<sup>n</sup>.*

Return value: None

Restrictions: None

### 9.2.11 fft\_mult

Function: void **fft\_mult**(x,y,z)

big x,y,z;

Module: mrfast.c

Description: Multiplies two big numbers, using the Fast Fourier Method. See \[Pollard71\].

Parameters: Three big numbers *x, y* and *z*. On exit *z=x.y*

Return value: None

Restrictions: Should only be used on a 32-bit computer when *x* and *y* are very large, at least 1000 decimal digits.

Example: See *mersenne.c*

**

### 9.2.12 gprime

Function: void **gprime**(n)

int n;

Module: mrprime.c

Description: Generates all prime numbers up to a certain limit into the instance array PRIMES, terminated by zero. This array is used internally by the routines **isprime** and **nxprime**.

Parameters: A positive integer *n* indicating the maximum prime number to be generated. If *n=0* the PRIMES array is deleted.

Return value: None

### 9.2.13 hamming

Function: int **hamming**(n)

big n;

Module: mrarth1.c

Description: Calculates the hamming weight of a big number (in fact the number of 1's in its binary representation.)

Parameters: A big number *x*.

Return value: Hamming weight of *x*

### 9.2.14 invers \*

Function: unsigned int **invers**(x,y)

unsigned int x,y;

Module: mrsmall.c

Description: Calculates the inverse of an integer modulus a co-prime integer

Parameters: An integer *x* and a co-prime integer *y*.

Return value: *x<sup>-1</sup> mod y*

Restrictions: Result unpredictable if *x* and *y* not co-prime

### 9.2.15 isprime

Function: BOOL **isprime**(x)

big x;

Module: mrprime.c

Description: Tests whether or not a big number is prime using a probabilistic primality test. The number is assumed to be prime if it passes this test **NTRY** times, where **NTRY** is an instance variable with a default initialisation in routine **mirsys**.

NOTE: This routine first test divides *x* by the list of small primes stored in the instance array **PRIMES**. The testing of larger primes will be significantly faster in many cases if this list is increased. See **gprime**. By default only the small primes less than 1000 are used.

Parameters: A big number *x*.

Return value: Returns the boolean value TRUE if *x* is (almost certainly) prime, otherwise FALSE.

Restrictions: None

### 9.2.16 jac

Function: int **jac**(x,n)

unsigned int x,n;

Module: mrsmall.c

Description: Calculates the value of the Jacobi symbol. See \[Reisel\].

Parameters: Two unsigned numbers *x* and *n*

Return value: The value of *(x/n)* as +1 or -1, or 0 if symbol undefined

Restrictions: None

### 9.2.17 jack

Function: int **jack**(x,n)

big x,n;

Module: mrjack.c

Description: Calculates the value of the Jacobi symbol. See \[Reisel\].

Parameters: Two big numbers *x* and *n*

Return value: The value of *(x/n)* as +1 or -1, or 0 if symbol undefined

Restrictions: None

### 9.2.18 logb2

Function: int **logb2**(x)

big x;

Module: mrbits.c

Description: Calculates the approximate integer log to the base 2 of a big number (in fact the number of bits in it.)

Parameters: A big number *x*.

Return value: Number of bits in *x*

Restrictions: None

### 9.2.19 lucas

Function: void **lucas**(x,e,n,vp,v)

big x,e,n,vp,v

Module: mrlucas.c

Description: Performs Lucas modular exponentiation. Uses Montgomery arithmetic internally. This function can be speeded up further for particular moduli, by invoking special assembly language routines to implement Montgomery arithmetic. See **powmod**.

Parameters: Five big numbers *x, e, n, vp* and *v*.

On exit *v*=V*<sub>e</sub>*(*x*) mod *n* and *vp*=V*<sub>e-1</sub>*(*x*) mod *n* where *n* is the current Montgomery modulus. Only *v* is returned if *v* and *vp* are not distinct.

Return value: None

Restrictions: The value of *n* must be odd.

Note: The "sister" Lucas function U*<sub>e</sub>(x)* can, if required, be calculated as

U*<sub>e</sub>(x)* *º* *\[x.*V*<sub>e</sub>(x)– 2.*V*<sub>e-1</sub>(x)\]/(x<sup>2</sup> – 4)* mod *n*

### 9.2.20 multi\_inverse

Function: BOOL **multi\_inverse**(m,x,n,w)

int m;

big n;

big \*x,\*w;

Module: mrxgcd.c

Description: Finds the modular inverses of many numbers simultaneously, exploiting Montgomery's observation that *x*<sup>-1</sup> *= y.(xy)*<sup>-1</sup>*, y*<sup>-1</sup> *= x.(xy)*<sup>-1</sup>. This will be quicker, as modular inverses are slow to calculate, and this way only one is required.

Parameters: The number of inverses required *m*, an array *x*\[.\] of *m* numbers whose inverses are wanted, the modulus *n*, and the resulting array of inverses *w*\[.\].

Return value: TRUE if successful, otherwise FALSE.

Restrictions: The parameters *x* and *w* must be distinct.

### 9.2.21 nres

Function: void **nres**(x,y)

big x,y;

Module: mrmonty.c

Description: Converts a big number to *n-residue* form.

Parameters: Two big numbers *x* and *y*.

On exit *y* is the *n-residue* form of *x*.

Return value: None

Restrictions: Must be preceded by call to **prepare\_monty**.

### 9.2.22 nres\_dotprod

Function void **nres\_dotprod**(m,x,y,w)

int m;

big x\[\]**,**y\[\],w;

Module: mrmonty.c

Description: Finds the dot product of two arrays of *n-residues*. So-called "lazy" reduction is used, in that the sum of products is only reduced once with respect to theMontgomery modulus. This is quicker –nearly twice as fast.

Parameters: Two arrays *x* and *y* each of *m* *n-residues.*

On exit *w=S x<sub>i</sub> y<sub>i</sub>* <sub></sub> mod *n*, where *n* is the currentMontgomery modulus.

Return value: None

Restrictions: Must be preceded by call to **prepare\_monty**.

### 9.2.23 nres\_double\_modadd

Function: void **nres\_double\_modadd**(x,y,w)

big x,y,w;

Module: mrmonty.c

Description: Adds two double length bigs modulo *p.R*, where *R* is 2*<sup>n</sup>* and *n* is the smallest multiple of the word-length of the underlying MIRACL type, such that *R&gt;p*. This is required for lazy reduction.

Parameters: Three big numbers *x*, *y* and *z*. On exit *z=a+b* mod *pR*

Return value: None

### 9.2.24 nres\_double\_modsub

Function: void **nres\_double\_modsub**(x,y,w)

big x,y,w;

Module: mrmonty.c

Description: Subtracts two double length bigs modulo *p.R*, where *R* is 2*<sup>n</sup>* and *n* is the smallest multiple of the word-length of the underlying MIRACL type, such that *R&gt;p*. This is required for lazy reduction.

Parameters: Three big numbers *x*, *y* and *z*. On exit *z=a-b* mod *pR*

Return value: None

### 9.2.25 nres\_lazy

Function: void **nres\_lazy**(a,b,c,d,x,y)

big a,b,c,d,x,y;

Module: mrmonty.c

Description: Uses the method of lazy reduction combined with Karatsuba's method to multiply two zzn2 variables. Requires just 3 multiplications and two modular reductions.

Parameters: Six big numbers. On exit *(x+iy)=(a+ib)(c+id)*, where *i* is imaginary square root of the quadratic non-residue.

Return value: None

### 9.2.26 nres\_lucas

Function: void **nres\_lucas**(x,e,vp,v)

big x,e,vp,v;

Module: mrlucas.c

Description: Modular Lucas exponentiation of an *n-residue*

Parameters: An *n-residue* *x*, a big exponent *e*, and two *n-residue* outputs *vp* and *v*.

On exit *v*=V*<sub>e</sub>*(*x*) mod *n* and *vp*=V*<sub>e-1</sub>*(*x*) mod *n* where *n* is the current Montgomery modulus. Only *v* is returned if *v* and *vp* are the same big variable.

Return value: None

Restrictions: Must be preceded by call to **prepare\_monty** and conversion of the first parameter to *n-residue* form. Note that the exponent is **not** converted to *n-residue* form.

### 9.2.27 nres\_modadd

Function: void **nres\_modadd(x,y,z)**

**** big x,y,z;

Module: mrmonty.c

Description: Modular addition of two *n-residues*

Parameters: Three *n-residue* numbers *x*, *y*, and *z*.

On exit *z=x+y mod n*, where *n* is the currentMontgomery modulus.

Return value: None

Restrictions: Must be preceded by a call to **prepare\_monty.**

### 9.2.28 nres\_moddiv

Function: int **nres\_moddiv**(x,y,z)

big x,y,z;

Module: mrmonty.c

Description: Modular division of two *n-residues*.

Parameters: Three *n-residue* numbers *x, y* and *z*.

On exit *z =x/y mod n*, where *n* is the currentMontgomery modulus.

Return value: GCD of *y* and *n* as an integer, if possible, or **MR\_TOOBIG**. Should be 1 for a valid result.

Restrictions: Must be preceded by call to **prepare\_monty** and conversion of parameters to *n-residue* form. Parameters *x* and *y* must be distinct.

### 9.2.29 nres\_modmult

Function: void **nres\_modmult**(x,y,z)

big x,y,z;

Module: mrmonty.c

Description: Modular multiplication of two *n-residues*. Note that this routine will invoke a KCM Modular Multiplier if **MR\_KCM** has been defined in *mirdef.h* and set to an appropriate size for the current modulus, or a Comba fixed size modular multiplier if **MR\_COMBA** is defined as exactly the size of the modulus.

Parameters: Three *n-residue* numbers *x*, *y* and *z*

On exit *z =xy mod n*, where *n* is the currentMontgomery modulus.

Return value: None

Restrictions: Must be preceded by call to **prepare\_monty** and conversion of parameters to *n-residue* form.

### 9.2.30 nres\_modsub

Function: void **nres\_modsub(x,y,z)**

**** big x,y,z;

Module: mrmonty.c

Description: Modular subtraction of two *n-residues*

Parameters: Three *n-residue* numbers *x*, *y*, and *z*.

On exit *z=x-y mod n*, where *n* is the currentMontgomery modulus.

Return value: None

Restrictions: Must be preceded by a call to **prepare\_monty.**

### 9.2.31 nres\_multi\_inverse

Function: BOOL **nres\_multi\_inverse**(m,x,w)

int m;

big \*x,\*w;

Module: mrmonty.c

Description: Finds the modular inverses of many numbers simultaneously, exploiting Montgomery's observation that *x*<sup>-1</sup> *= y.(xy)*<sup>-1</sup>*, y*<sup>-1</sup> *= x.(xy)*<sup>-1</sup>. This will be quicker, as modular inverses are slow to calculate, and this way only one is required.

Parameters: The number of inverses required *m*, an array *x*\[.\] of *m* *n-residues* whose inverses are wanted, and an array of their inverses *w*\[.\].

Return value: TRUE if successful, otherwise FALSE.

Restrictions: The parameters *x* and *w* must be distinct.

### 9.2.32 nres\_negate

Function: void **nres\_negate**(x,w)

big x,w;

Module: mrmonty.c

Description: Modular negation.

Parameters: Two *n-residue* numbers *x* and *w*.

On exit *w= -x mod n*, where *n* is the currentMontgomery modulus.

Return value: None

Restrictions: Must be preceded by a call to **prepare\_monty.**

### 9.2.33 nres\_powltr

Function: void **powltr**(x,e,w)

int x;

big e,w;

Module: mrpower.c

Description: Modular exponentiation of an *n-residue*

Parameters: An ordinary small integer *x*, a big number *e* and an *n-residue* result *w*.

On exit *w=x<sup>e</sup> mod n*, where *n* is the currentMontgomery modulus.

Return value: None

Restrictions: Must be preceded by call to **prepare\_monty**. Note that the small integer *x* and the exponent are **not** converted to *n-residue* form.

### 9.2.34 nres\_powmod

Function: void **nres\_powmod**(x,y,z)

big x,y,z;

Module: mrpower.c

Description: Modular exponentiation of an *n-residue*.

Parameters: An *n-residue* number *x*, a big number *y* and an *n-residue* result *z*. On exit *z =x<sup>y</sup> mod n*, where *n* is the currentMontgomery modulus.

Return value: None

Restrictions: Must be preceded by call to **prepare\_monty** and conversion of the first parameter to *n-residue* form. Note that the exponent is **not** converted to *n-residue* form.

Example: prepare\_monty(n);

...

...

nres(x,y); /\* convert to *n-residue* form \*/

nres\_powmod(y,e,z);

redc(z,w); /\* convert back to normal form \*/

### 9.2.35 nres\_powmod2

Function: void **nres\_powmod2**(x,y,a,b,w)

big x,y,a,b,w;

Module: mrpower.c

Description: Calculate the product of two modular exponentiations involving *n-residues*.

Parameters: Three *n-residue* numbers *x*, *a* and *w*, and two big integers *y* and *b*.

On exit *w = x<sup>y</sup> .a<sup>b</sup> mod n*, where *n* is the currentMontgomery modulus.

Return value: None

Restrictions: Must be preceded by call to **prepare\_monty** and conversion of the appropriate parameters to *n-residue* form. Note that the exponents are **not** converted to *n-residue* form.

### 9.2.36 nres\_powmodn

Function: void **nres\_powmodn**(m,x,y,w)

int m;

big \***x,**\*y,w;

Module: mrpower.c

Description: Calculate the product of *m* modular exponentiations involving *n-residues*. Extra memory is allocated internally by this function.

Parameters: The integer *m,* an array of *m n-residue* numbers *x*, an array of *m* big integers *y*, and an *n-residue* *w*.

On exit *w = x\[0\]<sup>y\[0\]</sup> . x\[1\]<sup>y\[1\]</sup> … . x\[m-1\]<sup>y\[m-1\]</sup> mod n*, where *n* is the currentMontgomery modulus.

Return value: None

Restrictions: Must be preceded by call to **prepare\_monty** and conversion of the appropriate parameters to *n-residue* form. Note that the exponents are **not** converted to *n-residue* form.

### 9.2.37 nres\_premult

Function: void **nres\_premult**(x,k,w)

int k;

big x,w;

Module: mrmonty.c

Description: Multiplies an *n-residue* by a small integer.

Parameters: Two *n-residues* *x* and *w*, and a small integer *k*.

On exit *w = kx mod n,* where *n* is the currentMontgomery modulus.

Return value: None

Restrictions: Must be preceded by call to **prepare\_monty** and conversion of the first parameter to *n-residue* form. Note that the small integer is **not** converted to *n-residue* form.

### 9.2.38 nres\_sqroot

Function: BOOL **nres\_sqroot**(x,w)

big x,w;

Module: mrsroot.c

Description: Calculates the square root of an *n-residue* mod a prime modulus

Parameters: Two *n-residues* *x* and *w*.

On exit *w=Öx mod n* where *n* is the currentMontgomery modulus.

Return value: TRUE if the square root exists, otherwise FALSE

Restrictions: Must be preceded by call to **prepare\_monty** and conversion of the first parameter to *n-residue* form.

### 9.2.39 nroot

Function: BOOL **nroot**(x,n,z)

big x,z;

int n;

Module: mrarth3.c

Description: Extracts lower approximation to a root of a big number.

Parameters: Two big numbers *x* and *z*, and an integer *n*.

On exit *z=* ë*x<sup>1/n</sup>* û.

Return value: Returns the boolean value TRUE if the root found is exact, otherwise returns FALSE.

Restrictions: The value of *n* must be positive. If *x* is negative, then *n* must be odd.

### 9.2.40 nxprime

Function: BOOL **nxprime**(w,x)

big w,x;

Module: mrprime.c

Description: Find next prime number.

Parameters: Two big numbers *w* and *x*.

On exit *x* contains the next prime number greater than *w*.

Return value: TRUE if successful, FALSE otherwise.

Restrictions: None

### 9.2.41 nxsafeprime

Function: BOOL n**xsafeprime**(type,subset,w,p)

int type,subset;

big w,p;

Module: mrprime.c

Description: Find next *safe* prime number greater than *w*. A *safe* prime number *p* is defined here to be one for which *q=*(*p*-1)/2 (*type*=0) or *q=*(*p*+1)/2 (*type=*1*)* is also prime.

Parameters: The integer parameter *type* determines the type of safe prime as above. If the parameter *subset*=1, then the search is restricted so that the value of the prime *q* is congruent to 1 mod 4. If *subset=*3, then the search is restricted so that the value of *q* is congruent to 3 mod 4. If *subset*=0 then there is no condition on *q*: it can be either 1 or 3 mod 4.

Return value: TRUE if successful, FALSE otherwise

### 9.2.42 pow\_brick

Function: void **pow\_brick**(binst,e,w)

brick \*binst;

big e,w;

Module: mrbrick.c

Description: Carries out a modular exponentiation, using the precomputed values stored in the *brick* structure.

Parameters: A pointer to the current instance, a big exponent *e* and a big number *w*. On exit *w=g<sup>e</sup> mod n*, where *g* and *n* are specified in the initial call to **brick\_init.**

****

Return value: None

Restrictions: Must be preceded by a call to **brick\_init**.

### 9.2.43 power

Function: void **power**(x,n,z,w)

long n;

big x,z,w;

Module: mrarth3.c

Description: Raise a big number to an integer power.

Parameters: Two big numbers *x* and *z*, and an integer *n*. On exit *w=x<sup>n</sup>* . If *w* and *z* are distinct, then *w=x<sup>n</sup> mod z*

Return value: None

Restrictions: The value of *n* must be positive

### 9.2.44 powltr

Function: int **powltr**(x,y,z,w)

int x;

big y,z,w;

Module: mrpower.c

Description: Raise an *int* to the power of a big number modulus another big number. Uses Left-to-Right binary method, and will be somewhat faster than **powmod** for small *x*. Uses Montgomery arithmetic internally if the modulus *z* is odd.

Parameters: An integer *x* and three bigs *y*, *z* and *w*.

On exit *w=x<sup>y</sup> mod z*

Return value: The result expressed as an integer, if possible. Otherwise the value **MR\_TOOBIG**.

Restrictions: The value of *y* must be positive. The parameters *w* and *z* must be distinct.

### 9.2.45 powmod

Function: void **powmod**(x,y,z,w)

big x,y,z,w;

Module: mrpower.c

Description: Raise a big number to a big power modulus another big. Uses a sophisticated 5-bit sliding window technique, which is close to optimal for popular modulus sizes (such as 512 or 1024 bits). Uses Montgomery arithmetic internally if the modulus *z* is odd.

This function can be speeded up further for particular moduli, by invoking special assembly language routines (if your compiler allows it). A KCM Modular Multiplier will be automatically invoked if **MR\_KCM** has been defined in *mirdef.h* and has been set to an appropriate size. Alternatively a Comba modular multiplier will be used if **MR\_COMBA** is so defined, and the modulus is of the specified size. Experimental coprocessor code will be called if **MR\_PENTIUM** is defined. Only one of these conditionals should be defined.

Parameters: Four big numbers *x, y, z* and *w*.

On exit *w=x<sup>y</sup> mod z*.

Return value: None

Restrictions: The value of *y* must be positive. The parameters *w* and *z* must be distinct.

### 9.2.46 powmod2

Function: void **powmod2**(a,b,c,d,z,w)

big a,b,c,d,z,w;

Module: mrpower.c

Description: Calculate the product of two modular exponentiations. This is quicker than doing two separate exponentiations, and is useful for certain Cryptographic protocols. Uses 2-bit sliding window.

Parameters: Six big numbers *a ,b, c, d, z* and *w*.

On exit *w=a<sup>b</sup>.c<sup>d</sup> mod z*.

Return value: None

Restrictions: The values of *b* and *d* must be positive. The parameters *w* and *z* must be distinct. The modulus *z* must be odd.

Example: See *dssver.c*

### 9.2.47 powmodn

Function: void **powmodn**(m,a,b,z,w)

int m;

big \***a,**\*b,z,w;

Module: mrpower.c

Description: Calculate the product of *m* modular exponentiations. This is quicker than doing *m* separate exponentiations, and is useful for certain Cryptographic protocols. Extra memory is allocated internally for this function

Parameters: An integer *m*, two big number arrays *a\[\]* and *b\[\]*, and two big numbers *z* and *w*. On exit *w=a\[0\]<sup>b\[0\]</sup>.a\[1\]<sup>b\[1\]</sup> … . a\[m-1\]<sup>b\[m-1\]</sup> mod z*.

Return value: None

Restrictions: The values of *b\[\]* must be positive. The parameters *w* and *z* must be distinct. The modulus *z* must be odd. The underlying number base must be a power of 2.

### 9.2.48 prepare\_monty

Function: void ***prepare\_monty***(n)

big n;

Module: mrmonty.c

Description: Prepares a Montgomery Modulus for use. Each call to this function replaces the previous modulus (if any).

Parameters: A big number *n*, which is to be theMontgomery modulus.

Return value: None

Restrictions: The parameter *n* must be positive and odd. Allocated memory is freed when the current instance of MIRACL is terminated by a call to **mirexit**.

### 9.2.49 redc

Function: void **redc**(x,y)

big x,y;

Module: mrmonty.c

Description: Converts an *n-residue* back to normal form.

Parameters: Two big numbers *x* and *y*.

On exit *y* is the normal form of the *n-residue* *x*.

Return value: None

Restrictions: Use must be preceded by call to **prepare\_monty**.

### 9.2.50 scrt

Function: void **scrt**(psc,rem,x)

small\_chinese \*psc;

int \*rem;

big x;

Module: mrscrt.c

Description: Applies Chinese Remainder Theorem (for small prime moduli).

Parameters: A pointer *psc* to the current instance of the Chinese Remainder Theorem. On exit *x* contains the big number which yields the given integer remainders *rem\[.\]* when it is divided by the integer moduli specified in a prior call to **scrt\_init**.

Return value: None

Restrictions: The routine **scrt\_init** must be called first.

### 9.2.51 scrt\_end \*

Function: void **scrt\_end**(psc)

small\_chinese \*psc;

Module: mrscrt.c

Description: Cleans up after an application of the Chinese Remainder Theorem.

Parameters: A pointer to the current instance of the Chinese Remainder Theorem..

Return value: None

Restrictions: None

### 9.2.52 scrt\_initcopy \*

Function: BOOL **scrt\_init**(psc,np,m)

small\_chinese \*psc;

int np;

int \*m;

Module: mrscrt.c

Description: Initialises an instance of the Chinese Remainder Theorem. Some internal workspace is allocated.

Parameters: A pointer to the current instance *psc*. The number of co-prime moduli *np*, and an array of at least two integer moduli *m\[.\].*

Return value: TRUE if all went well, FALSE if there was a problem.

Restrictions: None

### 9.2.53 sftbit

Function: void **sftbit**(x,n,z)

big x,z;

int n;

Module: mrbits.c

Description: Shifts a big integer left or right by a number of bits.

Parameters: The big parameter *x* is shifted by *n* bits, to give *z*. Positive *n* shifts to the left, negative to the right.

Return value: None

Restrictions: None

### 9.2.54 smul \*

Function: unsigned int **smul**(x,y,z)

Unsigned int x,y,z;

Module: mrsmall.c

Description: Multiplies two integers mod a third

Parameters: Integers *x, y* and *z*

Return value: *x.y mod z*

### 9.2.55 spmd \*

Function: unsigned int **spmd**(x,y,z)

Unsigned int x,y,z;

Module: mrsmall.c

Description: Raises an integer to an integer power modulus a third

Parameters: Integers *x, y*, and *z*

Return value: *x<sup>y</sup> mod z*

Restrictions: None

### 9.2.56 sqrmp \*

Function: unsigned int **sqrmp**(x,p)

Unsigned int x,p;

Module: mrsmall.c

Description: Calculates the square root of an integer mod an integer prime number

Parameters: An integer *x* and a prime number *p*

Return value: *Öx mod p*, or 0 if root does not exist

Restrictions: Return value unpredictable if *p* is not prime

### 9.2.57 sqroot

Function: BOOL **sqroot**(x,p,w)

big x,p;

Module: mrsroot.c

Description: Calculates the square root of a big integer mod a big integer prime.

Parameters: Two big integers *x* and *w*, and a big prime number *p*.

On exit *w=Öx mod p* if the square root exists, otherwise *w=0*. Note that the "other" square root may be found by subtracting *w* from *p*.

Return value: TRUE if the square root exists, FALSE otherwise.

Restrictions: The number *p* must be prime.

### 9.2.58 trial\_division

Function: int **trial\_division**(x,y)

big x,y;

Module: mrprime.c

Description: Dual purpose trial division routine. If *x* and *y* are the same big variable then trial division by the small prime numbers in the instance array **PRIMES** is attempted to determine the primality status of the big number. If *x* and *y* are distinct then, after trial division, the unfactored part of *x* is returned in *y*.

Parameters: Two big integers *x* and *y*.

Return value: If *x* and *y* are the same, then a return value of 0 means that the big number is definitely not prime, a return value of 1 means that it definitely is prime, while a return value of 2 means that it is possibly prime (and that perhaps further testing should be carried out).

If *x* and *y* are distinct, then a return value of 1 means that *x* is *smooth*, that is it is completely factored by trial division (and *y* is the largest prime factor). A return value of 2 means that the unfactored part *y* is possibly prime.

### 9.2.59 xgcd

Function: int **xgcd**(x,y,xd,yd,z)

big x,y,xd,yd,z;

Module: mrxgcd.c

Description: Calculates extended Greatest Common Divisor of two big numbers. Can be used to calculate modular inverses. Note that this routine is much slower than a **mad** operation on numbers of similar size.

Parameters: Five big numbers *x,y,xd,yd* and *z*.

On exit *z=gcd(x,y)=x.xd+y.yd*

Return value: GCD as integer, if possible, otherwise **MR\_TOOBIG**

Restrictions: If *xd* and *yd* are not distinct, only *xd* is returned. The GCD is only returned if *z* distinct from both *xd* and *yd*.

Example: xgcd(x,p,x,x,x); /\* *x = 1/x mod* *p* (*p* is prime) \*/

### 9.2.60 zzn2\_add

****

Function: void **zzn2\_add**(x,y,z)

zzn2 \*x**,**\*y,\*z;

Module: mrzzn2.c

Description: Adds two zzn2 variables.

Parameters: Three zzn2 variables *x*, *y* and *z*. On exit *z=x+y*

Return value: None

### 9.2.61 zzn2\_compare \*

****

Function: BOOL **zzn2\_compare**(x,y)

zzn2 \*x**,**\*y;

Module: mrzzn2.c

Description: Compares two zzn2 variables for equality

Parameters: Two zzn2 values *x* and *y*

Return value: TRUE if *x=y*, otherwise FALSE

### 

### 9.2.62 zzn2\_conj

Function: void **zzn2\_conj**(x,y)

zzn2 \*x**,**\*y;

Module: mrzzn2.c

Description: Finds the conjugate of a zzn2

Parameters: Two zzn2 variables *x* and *y*. If *x=a+ib*, then on exit *y=a-ib*

Return value: None

### 9.2.63 zzn2\_copy \*

Function: void **zzn2\_copy**(x,y)

zzn2 \*x**,**\*y;

Module: mrzzn2.c

Description: Copies one zzn2 to another

Parameters: Two zzn2 variables *x* and *y*. On exit *y=x*

Return value: None

### 9.2.64 zzn2\_from\_big

Function: void **zzn2\_from\_big**(a,x)

big a;

zzn2 \*x;

Module: mrzzn2.c

Description: Creates a zzn2 from a big integer. This is converted internally into *n-residue* format.

Parameters: A big integer *a* and a zzn2 *x*. On exit *x=a*

Return value: None

### 9.2.65 zzn2\_from\_bigs

Function: void **zzn2\_from\_bigs**(a,b,x)

big a,b;

zzn2 \*x;

Module: mrzzn2.c

Description: Creates a zzn2 from two big integers. These are converted internally into *n-residue* format.

Parameters: Two big integers *a* and *b* and a zzn2 *x*. On exit *x=a+ib*

Return value: None

### 9.2.66 zzn2\_from\_int

Function: void **zzn2\_from\_int**(a,x)

int a;

zzn2 \*x;

Module: mrzzn2.c

Description: Converts an integer to zzn2 format

Parameters: An integer *a* and a zzn2 *x*. On exit *x=a*

Return value: None

### 9.2.67 zzn2\_from\_ints

Function: void **zzn2\_from\_ints**(a,b,x)

int a,b;

zzn2 \*x;

Module: mrzzn2.c

Description: Creates a zzn2 from two integers

Parameters: Two integers *a* and *b* and a zzn2 *x*. On exit *x=a+ib*

Return value: None

### 9.2.68 zzn2\_from\_zzn

Function: void **zzn2\_from\_zzn**(a,x)

big a;

zzn2 \*x;

Module: mrzzn2.c

Description: Creates a zzn2 from a big already in *n-residue* format.

Parameters: A big *a* and a zzn2 *x*. On exit *x=a*

Return value: None

### 9.2.69 zzn2\_from\_zzns

Function: void **zzn2\_from\_zzns**(a,b,x)

big a,b;

zzn2 \*x;

Module: mrzzn2.c

Description: Creates a zzn2 from two bigs already in *n-residue* format.

Parameters: Two bigs *a* and *b* and a zzn2 *x*. On exit *x=a+ib*

Return value: None

### 9.2.70 zzn2\_imul

Function: void **zzn2\_simul**(x,y,z)

zzn2 \*x,\*z;

int y;

Module: mrzzn2.c

Description: Multiplies a zzn2 variable by an integer.

Parameters: Two zzn2 variables *x* and *z*, and an integer *y*. On exit *z=x.y*

Return value: None

### 9.2.71 zzn2\_inv

Function: BOOL **zzn2\_inv**(x)

zzn2 \*x;

Module: mrzzn2.c

Description: In-place inversion of a zzn2 variable

Parameters: A single zzn2 variable *x*. On exit *x=1/x*.

Return value: None

### 9.2.72 zzn2\_isunity

****

Function: BOOL **zzn2\_isunity**(x)

zzn2 \*x;

Module: mrzzn2.c

Description: Tests a zzn2 value for equality to one

Parameters: A single zzn2 variable *x*

Return value: TRUE if *x* is one, otherwise FALSE.

### 9.2.73 zzn2\_iszero \*

Function: BOOL **zzn2\_iszero**(x)

zzn2 \*x;

Module: mrzzn2.c

Description: Tests a zzn2 variable for equality to zero

Parameters: A single zzn2 value *x*

Return value: TRUE if *x* is zero, otherwise FALSE.

******

******

### 9.2.74 zzn2\_mul

Function: void **zzn2\_mul**(x,y,z)

zzn2 \***x,**\*y,\*z;

Module: mrzzn2.c

Description: Multiplies two zzn2 variables. If *x* and *y* are the same variable, a faster squaring method is used.

Parameters: Three zzn2 variables *x, y* and *z*. On exit *z=x.y*

Return value: None

### 9.2.75 zzn2\_negate

Function: void **zzn2\_negate**(x,y)

zzn2 \***x,**\*y;

Module: mrzzn2.c

Description: Negate a zzn2.

Parameters: Two zzn2 variables *x* and *y*. On exit *y=-x*

Return value: None

### 9.2.76 zzn2\_sadd

Function: void **zzn2\_sadd**(x,y,z)

zzn2 \*x,\*z;

big y;

Module: mrzzn2.c

Description: Adds a big in *n-residue* format to a zzn2 .

Parameters: Two zzn2 variables *x* and *z*, and a big variable *y*. On exit *z=x+y*

Return value: None

### 9.2.77 zzn2\_smul

Function: void **zzn2\_smul**(x,y,z)

zzn2 \*x,\*z;

big y;

Module: mrzzn2.c

Description: Multiplies a zzn2 variable by a big in *n-residue*.

Parameters: Two zzn2 variables *x* and *z*, and a big variable *y*. On exit *z=x.y*

Return value: None

### 9.2.78 zzn2\_ssub

Function: void **zzn2\_ssub**(x,y,z)

zzn2 \*x,\*z;

big y;

Module: mrzzn2.c

Description: Subtracts a big in *n-residue* format from a zzn2 .

Parameters: Two zzn2 variables *x* and *z*, and a big variable *y*. On exit *z=x-y*

Return value: None

### 9.2.79 zzn2\_sub

Function: void **zzn2\_sub**(x,y,z)

zzn2 \***x,**\*y,\*z;

Module: mrzzn2.c

Description: Subtracts two zzn2 variables .

Parameters: Three zzn2 variables *x, y* and *z*. On exit *z=x-y*

Return value: None

### 9.2.80 zzn2\_timesi

Function: BOOL **zzn2\_timesi**(x)

zzn2 \*x;

Module: mrzzn2.c

Description: In-place multiplication of a zzn2 by *i,* the imaginary square root of the quadratic non-residue.

Parameters: A single zzn2 variable *x*. If *x=a+ib* then on exit *x=i<sup>2</sup>b+ia*.

Return value: None

### 9.2.81 zzn2\_zero \*

Function: void **zzn2\_iszero**(x)

zzn2 \*x;

Module: mrzzn2.c

Description: Sets a zzn2 variable to zero

Parameters: A single zzn2 variable *x*. On exit *x=0*

Return value: None

9.3 Elliptic curve routines
---------------------------

### 9.3.1 ebrick\_init

Function: BOOL **ebrick\_init**(binst,x,y,a,b,n,w,nb)

ebrick \*binst;

big x,y;

big a,b,n;

int w,nb;

Module: mrebrick.c

Description: Initialises an instance of the Comb method for GF(*p*) elliptic curve multiplication with precomputation. Internally memory is allocated for 2*<sup>w</sup>* elliptic curve points which will be precomputed and stored. For bigger *w* more space is required, but the exponentiation is quicker. Try *w*=8.

Parameters: A pointer to the current instance *binst*, the fixed point *G=*(*x,y*) on the curve *y<sup>2</sup> =x<sup>3</sup> + ax + b*, the modulus *n*, and the maximum number of bits to be used in the exponent *nb*.

Return value: TRUE if all went well, FALSE if there was a problem.

Restrictions: Note: If MR\_STATIC is defined in *mirdef.h*, then the *x* and *y* parameters in this function are replaced by a single mr\_small \* pointer to a precomputed table. In this case the function returns a void.

### 9.3.2 ebrick2\_init

Function: BOOL **ebrick2\_init**(binst,x,y,A,B,m,a,b,c,nb)

ebrick2 \*binst;

big x,y;

big A,B;

int m,a,b,c,nb;

Module: mrec2m.c

Description: Initialises an instance of the Comb method for GF(2*<sup>m</sup>*) elliptic curve multiplication with precomputation. The field is defined with respect to the trinomial basis *t<sup>m</sup>+t<sup>a</sup>+1* or the pentanomial basis *t<sup>m</sup>+t<sup>a</sup>+t<sup>b</sup>+t<sup>c</sup>+1*. Internally memory is allocated for 2*<sup>w</sup>* elliptic curve points which will be precomputed and stored. For bigger *w* more space is required, but the exponentiation is quicker. Try *w*=8.

Parameters: A pointer to the current instance *binst*, the fixed point *G=*(*x,y*) on the curve *y<sup>2</sup> + xy = x<sup>3</sup> + Ax<sup>2</sup> + B*, the field parameters *m, a, b, c*, and the maximum number of bits to be used in the exponent *nb*. Set *b* = 0 for a trinomial basis.

Return value: TRUE if all went well, FALSE if there was a problem.

Restrictions: Note: If MR\_STATIC is defined in *mirdef.h*, then the *x* and *y* parameters in this function are replaced by a single mr\_small \* pointer to a precomputed table. In this case the function returns a void.

### 9.3.3 ebrick\_end \*

Function: void **ebrick\_end**(binst)

ebrick \*binst

Module: mrebrick.c

Description: Cleans up after an application of the Comb for GF(*p*) elliptic curves

Parameters: A pointer to the current instance

Return value: None

Restrictions: None

### 9.3.4 ebrick2\_end \*

Function: void **ebrick2\_end**(binst)

ebrick2 \*binst

Module: mrec2m.c

Description: Cleans up after an application of the Comb method for GF(2*<sup>m</sup>*) elliptic curves.

Parameters: A pointer to the current instance

Return value: None

Restrictions: None

### 9.3.5 ecurve\_add

Function: void **ecurve\_add**(p,pa)

epoint \*p,\*pa;

Module: mrcurve.c

Description: Adds two points on a GF(*p)* elliptic curve using the special rule for addition. Note that if *pa=p*, then a different duplication rule is used. Addition is quicker if *p* is normalised.

Parameters: Two points on the current active curve*, pa* and *p*. On exit *pa=pa+p.*

Return value: None

Restrictions: The input points must actually be on the current active curve.

### 9.3.6 ecurve2\_add

Function: void **ecurve2\_add**(p,pa)

epoint \*p,\*pa;

Module: mrec2m.c

Description: Adds two points on a GF(2*<sup>m</sup>*) elliptic curve using the special rule for addition. Note that if *pa=p*, then a different duplication rule is used. Addition is quicker if *p* is normalised.

Parameters: Two points on the current active curve*, pa* and *p*. On exit *pa=pa+p.*

Return value: None

Restrictions: The input points must actually be on the current active curve.

### 9.3.7 ecurve\_init

Function: void **ecurve\_init**(A,B,p,type)

big A,B,p;

int type;

Module: mrcurve.c

Description: Initialises the internal parameters of the current active GF(*p*) elliptic curve. The curve is assumed to be of the form *y<sup>2</sup> =x<sup>3</sup> + Ax + B mod p*, the so-called Weierstrass model. This routine can be called subsequently with the parameters of a different curve.

Parameters: Three big numbers *A*, *B* and *p*. The *type* parameter must be either **MR\_PROJECTIVE** or **MR\_AFFINE**, and specifies whether projective or affine co-ordinates should be used internally. Normally the former is faster.

Return value: None

Restrictions: Allocated memory will be freed when the current instance of MIRACL is terminated by a call to **mirexit**. However only one elliptic curve, GF(*p*) or GF(2*<sup>m</sup>*) may be active within a single MIRACL instance. In addition, a call to a function like **powmod** will overwrite the stored modulus. This can be restored by a repeat call to **ecurve\_init**

### 9.3.8 ecurve2\_init

Function: BOOL **ecurve2\_init**(m,a,b,c,A,B,check,type)

big A,B;

int m,a,b,c,type;

BOOL check;

Module: mrec2m.c

Description: Initialises the internal parameters of the current active elliptic curve. The curve is assumed to be of the form *y<sup>2</sup> + xy =x<sup>3</sup> + Ax<sup>2</sup> + B* . The field is defined with respect to the trinomial basis *t<sup>m</sup>+t<sup>a</sup>+1* or the pentanomial basis *t<sup>m</sup>+t<sup>a</sup>+t<sup>b</sup>+t<sup>c</sup>+1*. This routine can be called subsequently with the parameters of a different curve.

Parameters: The fixed point *G=*(*x,y*) on the curve *y<sup>2</sup> + xy = x<sup>3</sup> + Ax<sup>2</sup> + B*, the field parameters *m, a, b, c.* Set *b* = 0 for a trinomial basis. The *type* parameter must be either **MR\_PROJECTIVE** or **MR\_AFFINE**, and specifies whether projective or affine co-ordinates should be used internally. Normally the former is faster. If *check* is TRUE a check is made that the specified basis is irreducible. If FALSE, this basis validity check, which is time-consuming, is suppressed.

Return value: TRUE if parameters make sense, otherwise FALSE.

Restrictions: Allocated memory will be freed when the current instance of MIRACL is terminated by a call to **mirexit**. However only one elliptic curve, GF(*p*) or GF(2*<sup>m</sup>*) may be active within a single MIRACL instance.

### 9.3.9 ecurve\_mult

Function: void **ecurve\_mult**(k,p,pa)

big k;

epoint \*p,\*pa;

Module: mrcurve.c

Description: Multiplies a point on a GP(*p*) elliptic curve by an integer. Uses the addition/subtraction method.

Parameters: A big number *k*, and two points *p* and *pa*. On exit *pa=k\*p.*

Return value: None

Restrictions: The point *p* must be on the active curve.

### 9.3.10 ecurve2\_mult

Function: void **ecurve2\_mult**(k,p,pa)

big k;

epoint \*p,\*pa;

Module: mrec2m.c

Description: Multiplies a point on a GF(2*<sup>m</sup>*) elliptic curve by an integer. Uses the addition/subtraction method.

Parameters: A big number *k*, and two points *p* and *pa*. On exit *pa=k\*p.*

Return value: None

Restrictions: The point *p* must be on the active curve.

### 9.3.11 ecurve\_mult2

Function: void **ecurve\_mult2**(k1,p1,k2,p2,pa)

big k1,k2;

epoint \*p1,\*p2,\*pa;

Module: mrcurve.c

Description: Calculates the point *k1.p1+k2.p2* on a GF(*p*) elliptic curve. This is quicker than doing two separate multiplications and an addition. Useful for certain cryptosystems. (See *ecsver.c* for example)

Parameters: Two big integers *k1* and *k2*, and three points *p1, p2* and *pa*.

On exit *pa = k1.p1+k2.p2*

Return value: None

Restrictions: The points *p1* and *p2* must be on the active curve.

### 9.3.12 ecurve2\_mult2

Function: void **ecurve2\_mult2**(k1,p1,k2,p2,pa)

big k1,k2;

epoint \*p1,\*p2,\*pa;

Module: mrec2m.c

Description: Calculates the point *k1.p1+k2.p2* on a GF(2*<sup>m</sup>*) elliptic curve. This is quicker than doing two separate multiplications and an addition. Useful for certain cryptosystems. (See *ecsver2.c* for example)

Parameters: Two big integers *k1* and *k2*, and three points *p1, p2* and *pa*.

On exit *pa = k1.p1+k2.p2*

Return value: None

Restrictions: The points *p1* and *p2* must be on the active curve.

### 9.3.13 ecurve\_multi\_add

Function: void **ecurve\_multi\_add**(m,x,w)

int m;

epoint \*\*x**,**\*\*w;

Module: mrcurve.c

Description: Simultaneously adds pairs of points on the active GF(*p*) curve. This is much quicker than adding them individually, but <span style="text-decoration: underline;">only</span> when using Affine co-ordinates.

Parameters: An integer *m* and two arrays of points *w* and *x*. On exit *w\[i\]=w\[i\]+x\[i\]* for *i* =0 to *m*-1

Return value: None

Restrictions: Only useful when using Affine co-ordinates.

See also: **ecurve\_init** and **nres\_multi\_inverse**, which is used internally.

### 9.3.14 ecurve2\_multi\_add

Function: void **ecurve2\_multi\_add**(m,x,w)

int m;

epoint \*\*x**,**\*\*w;

Module: mrec2m.c

Description: Simultaneously adds pairs of points on the active GF(2*<sup>m</sup>*) curve. This is much quicker than adding them individually, but <span style="text-decoration: underline;">only</span> when using Affine co-ordinates.

Parameters: An integer *m* and two arrays of points *w* and *x*. On exit *w\[i\]=w\[i\]+x\[i\]* for *i* =0 to *m*-1

Return value: None

Restrictions: Only useful when using Affine co-ordinates.

See also: **ecurve2\_init**

### 

### 9.3.15 ecurve\_multn

Function: void **ecurve\_multn**(n,k,p,pa)

int n;

big \*k;

epoint \*\*p;

Module: mrcurve.c

Description: Calculates the point *k\[0\].p\[0\] + k\[1\].p\[1\] + … + k\[n-1\].p\[n-1\]* on a GF(*p*) elliptic curve, for *n&gt;2*.

Parameters: An integer *n*, an array of *n* big numbers *k\[\]*, and an array of *n* points. The result is returned in *pa*.

Return value: None

Restrictions: The points must be on the active curve. The *k\[\]* values must all be positive. The underlying number base must be a power of 2.

### 9.3.16 ecurve2\_multn

Function: void **ecurve2\_multn**(n,k,p,pa)

int n;

big \*k;

epoint \*\*p;

Module: mrec2m.c

Description: Calculates the point *k\[0\].p\[0\] + k\[1\].p\[1\] + … + k\[n-1\].p\[n-1\]* on a GF(2*<sup>m</sup>*) elliptic curve, for *n&gt;2*.

Parameters: An integer *n*, an array of *n* big numbers *k\[\]*, and an array of *n* points. The result is returned in *pa*.

Return value: None

Restrictions: The points must be on the active curve. The *k\[\]* values must all be positive. The underlying number base must be a power of 2.

### 9.3.17 ecurve\_sub

Function: void **ecurve\_sub**(p,pa)

epoint \*p,\*pa;

Module: mrcurve.c

Description: Subtracts two points on a GF(*p*) elliptic curve. Actually negates *p* and adds it to *pa*. Subtraction is quicker if *p* is normalised.

Parameters: Two points on the current active curve*, pa* and *p*. On exit *pa = pa-p.*

Return value: None

Restrictions: The input points must actually be on the current active curve.
****

<span>9.3.18 ecurve2\_sub</span>

Function: void **ecurve2\_sub**(p,pa)

epoint \*p,\*pa;

Module: mrec2m.c

Description: Subtracts two points on a GF(2*<sup>m</sup>*) elliptic curve. Actually negates *p* and adds it to *pa*. Subtraction is quicker if *p* is normalised.

Parameters: Two points on the current active curve*, pa* and *p*. On exit *pa = pa-p.*

Return value: None

Restrictions: The input points must actually be on the current active curve.

### 

### 9.3.19 epoint\_comp

Function: BOOL **epoint\_comp**(p1,p2)

epoint \*p1,\*p2;

Module: mrcurve.c

Description: Compares two points on the current active GF(*p*) elliptic curve.

Parameters: Two points *p1* and *p2*.

Return Value: TRUE if the points are the same, otherwise FALSE.

Restrictions: None

### 9.3.20 epoint2\_comp

Function: BOOL **epoint2\_comp**(p1,p2)

epoint \*p1,\*p2;

Module: mrec2m.c

Description: Compares two points on the current active GF(2*<sup>m</sup>*) elliptic curve.

Parameters: Two points *p1* and *p2*.

Return Value: TRUE if the points are the same, otherwise FALSE.

Restrictions: None

### 9.3.21 epoint\_copy \*

Function: void **epoint\_copy**(p1,p2)

epoint \*p1,\*p2;

Module: mrcurve.c

Description: Copies one point to another on a GF(*p*) elliptic curve.

Parameters: Two points *p1* and *p2*. On exit *p2=p1*.

Return value: None

Restrictions: None

### 9.3.22 epoint2\_copy \*

Function: void **epoint2\_copy**(p1,p2)

epoint \*p1,\*p2;

Module: mrec2m.c

Description: Copies one point to another on a GF(2*<sup>m</sup>*) elliptic curve.

Parameters: Two points *p1* and *p2*. On exit *p2=p1*.

Return value: None

Restrictions: None

### 9.3.23 epoint\_free \*

Function: void **epoint\_free**(p)

epoint \*p;

Module: mrcore.c

Description: Frees memory associated with a point on a GF(*p*) elliptic curve.

Parameters: A point *p*.

Return value: None

Restrictions: None

### 9.3.24 epoint\_get

Function: int **epoint\_get**(p,x,y)

epoint \*p;

big x,y;

Module: mrcurve.c

Description: Normalises a point and extracts its *(x,y)* co-ordinates on the active GF(*p*) elliptic curve.

Parameters: A point *p*, and two big integers *x* and *y*. If *x* and *y* are not distinct variables on entry then only the value of *x* is returned.

Return value: The least significant bit of *y*. Note that it is possible to reconstruct a point from its *x* co-ordinate and just the least significant bit of *y*. Often such a "compressed" description of a point is useful.

Restrictions: The point *p* must be on the active curve.

Example: i=epoint\_get(p,x,x);

/\* extract x co-ordinate and lsb of y \*/

### 9.3.25 epoint\_getxyz

Function: void **epoint\_getxyz**(p,x,y,z)

epoint \*p;

big x,y,z;

Module: mrcurve.c

Description: Extracts the raw (*x,y,z*) co-ordinates of a point on the active GF(*p*) elliptic curve.

Parameters: A point *p*, and three big integers *x, y* and *z*. If any of these is NULL that coordinate is not returned.

Return value: None

Restrictions: The point *p* must be on the active curve.

### 9.3.26 epoint2\_get

Function: int **epoint2\_get**(p,x,y)

epoint \*p;

big x,y;

Module: mrec2m.c

Description: Normalises a point and extracts its *(x,y)* co-ordinates on the active GF(2*<sup>m</sup>*) elliptic curve.

Parameters: A point *p*, and two big integers *x* and *y*. If *x* and *y* are not distinct variables on entry then only the value of *x* is returned.

Return value: The least significant bit of *y/x*. Note that it is possible to reconstruct a point from its *x* co-ordinate and just the least significant bit of *y/x*. Often such a "compressed" description of a point is useful.

Restrictions: The point *p* must be on the active curve.

Example: i=epoint\_get(p,x,x);

/\* extract x co-ordinate and lsb of y/x \*/

### 9.3.27 epoint2\_getxyz

Function: void **epoint2\_getxyz**(p,x,y,z)

epoint \*p;

big x,y,z;

Module: mrcurve.c

Description: Extracts the raw (*x,y,z*) co-ordinates of a point on the active GF(2*<sup>m</sup>*) elliptic curve.

Parameters: A point *p*, and three big integers *x, y* and *z*. If any of these is NULL that coordinate is not returned.

Return value: None

Restrictions: The point *p* must be on the active curve.

### 9.3.28 epoint\_init

Function: epoint\* **epoint\_init**()

Module: mrcore.c

Description: Assigns memory to a point on a GF(*p*) elliptic curve, and initialises it to the "point at infinity".

Parameters: None.

Return value: A point *p* (in fact a pointer to a structure allocated from the heap).

Restrictions: It is the C programmers responsibility to ensure that all elliptic curve points initialised by a call to this function, are ultimately freed by a call to **epoint\_free**. If not a memory leak will result.

### 9.3.29 epoint\_init\_mem

Function: epoint\* **epoint\_init\_mem**(mem,index)

char \*mem;

int index;

Module: mrcore.c

Description: Initialises memory for an elliptic curve point from a pre-allocated byte array *mem*. This array may be created from the heap by a call to **ecp\_memalloc**, or in some other way. This is quicker than multiple calls to **epoint\_init**

Parameters: A pointer to the pre-allocated array *mem*, and an index into that array. Each index should be unique.

Return value: An initialised elliptic curve point.

Restrictions: Sufficient memory must have been allocated and pointed to by *mem*.

### 9.3.30 epoint\_norm

Function: BOOL **epoint\_norm**(p)

epoint \*p;

Module: mrcurve.c

Description: Normalises a point on the current active GF(*p*) elliptic curve. This sets the *z* coordinate to 1. Point addition is quicker when adding a normalised point. This function does nothing if affine coordinates are being used (in which case there is no *z* co-ordinate)

Parameters: A point on the current active elliptic curve.

Return value: TRUE if successful.

### 9.3.31 epoint2\_norm

Function: BOOL **epoint2\_norm**(p)

epoint \*p;

Module: mrec2m.c

Description: Normalises a point on the current active GF(2*<sup>m</sup>*) elliptic curve. This sets the *z* coordinate to 1. Point addition is quicker when adding a normalised point. This function does nothing if affine coordinates are being used (in which case there is no *z* co-ordinate)

Parameters: A point on the current active elliptic curve.

Return value: TRUE if successful.

### 9.3.32 epoint\_set

Function: BOOL **epoint\_set**(x,y,lsb,p)

big x,y;

int lsb;

epoint \*p;

Module: mrcurve.c

Description: Sets a point on the current active GF(*p*) elliptic curve (if possible).

Parameters: The integer co-ordinates *x* and *y* of the point *p*. If *x* and *y* are not distinct variables then *x* only is passed to the function, and *lsb* is taken as the least significant bit of *y.* In this case the full value of *y* is reconstructed internally. This is known as "point decompression" (and is a bit time-consuming, requiring the extraction of a modular square root). On exit *p=(x,y)*.

Return value: TRUE if the point exists on the current active point, otherwise FALSE.

Restrictions: None

Example: p=epoint\_init();

epoint\_set(x,x,1,p);

/\* decompress p \*/

### 9.3.33 epoint2\_set

Function: BOOL **epoint2\_set**(x,y,lsb,p)

big x,y;

int lsb;

epoint \*p;

Module: mrec2m.c

Description: Sets a point on the current active GF(2*<sup>m</sup>*) elliptic curve (if possible).

Parameters: The integer co-ordinates *x* and *y* of the point *p*. If *x* and *y* are not distinct variables then *x* only is passed to the function, and *lsb* is taken as the least significant bit of *y/x.* In this case the full value of *y* is reconstructed internally. This is known as "point decompression" (and is a bit time-consuming, requiring the extraction of a field square root). On exit *p=(x,y)*.

Return value: TRUE if the point exists on the current active point, otherwise FALSE.

Restrictions: None

Example: p=epoint\_init();

epoint2\_set(x,x,1,p);

/\* decompress p \*/

### 9.3.34 epoint\_x

Function: BOOL **epoint\_x**(x)

big x;

Module: mrcurve.c

Description: Tests to see if the parameter *x* is a valid co-ordinate of a point on the curve. It is faster to test an *x* co-ordinate first in this way, rather than trying to directly set it on the curve by calling **epoint\_set**, as it avoids an expensive modular square root.

Parameters: The integer coordinate *x*.

Return value: TRUE if *x* is the coordinate of a curve point, otherwise FALSE

Restrictions: None

### 9.3.35 mul\_brick

Function: int **mul\_brick**(binst,e,x,y)

ebrick \*binst;

big e,x,y;

Module: mrebrick.c

Description: Carries out a GF(*p*) elliptic curve multiplication using the precomputed values stored in the *ebrick* structure.

Parameters: A pointer to the current instance, a big exponent *e* and a big number *w*. On exit (*x,y*) = *e.G* *mod n*, where *G* and *n* are specified in the initial call to **ebrick\_init.** If *x* and *y* are not distinct variables, only *x* is returned.

****

Return value: The least significant bit of *y*.

Restrictions: Must be preceded by a call to **ebrick\_init**.

### 9.3.36 mul2\_brick

Function: int **mul2\_brick**(binst,e,x,y)

ebrick2 \*binst;

big e,x,y;

Module: mrec2m.c

Description: Carries out a GF(2*<sup>m</sup>*) elliptic curve multiplication using the precomputed values stored in the *ebrick2* structure.

Parameters: A pointer to the current instance, a big exponent *e* and a big number *w*. On exit (*x,y*) = *e.G*, where *G* is specified in the initial call to **ebrick2\_init.** If *x* and *y* are not distinct variables, only *x* is returned.

****

Return value: The least significant bit of *y/x*.

Restrictions: Must be preceded by a call to **ebrick2\_init**.

### 9.3.37 point\_at\_infinity \*

Function: BOOL **point\_at\_infinity**(p)

epoint \*p;

Module: mrcore.c

Description: Tests if an elliptic curve point is the "point at infinity".

Parameters: An elliptic curve point *p*.

Return value: TRUE if *p* is the point-at-infinity, otherwise FALSE.

Restrictions: The point must be initialised.

9.4 Encryption Routines
-----------------------

### 9.4.1 aes\_decrypt \*

Function: mr\_unsign32 aes\_**decrypt**(a,buff)

aes \*a;

char \*buff;

Module: mraes.c

Description: Decrypts a 16 or *n* byte input buffer in situ.

Parameters: Pointer to an initialised instance of an *aes* structure defined in *miracl.h*, and to the buffer of bytes to be decrypted. If the mode of operation is as a block cipher (**MR\_ECB** or **MR\_CBC**) then 16 bytes will be decrypted. If the mode of operation is as a stream cipher (**MR\_CFB***n*, **MR\_OFB***n* or **MR\_PCFB***n*) then *n* bytes will be decrypted.

Return value: In **MR\_CFB***n* and **MR\_PCFB***n* modes the *n* byte(s) that were shifted off the end of the input register as result of decrypting the *n* input byte(s), otherwise 0.

### 9.4.2 aes\_encrypt \*

Function: mr\_unsign32 **aes\_encrypt**(a,buff)

aes \*a;

char \*buff;

Module: mraes.c

Description: Encrypts a 16 or *n* byte input buffer in situ.

Parameters: Pointer to an initialised instance of an *aes* structure defined in *miracl.h*, and to the buffer of bytes to be encrypted. If the mode of operation is as a block cipher (**MR\_ECB** or **MR\_CBC**) then 16 bytes will be encrypted. If the mode of operation is as a stream cipher (**MR\_CFB***n*, **MR\_OFB***n* or **MR\_PCFB***n*) then a *n* bytes will be encrypted.

Return value: In **MR\_CFB***n* and **MR\_PCFB***n* modes the *n* byte(s) that were shifted off the end of the input register as result of encrypting the *n* input byte(s), otherwise 0.

### 9.4.3 aes\_end \*

Function: void **aes\_end**(a)

aes \*a;

Module: mraes.c

Description: Ends an AES encryption session, and de-allocates the memory associated with it. The internal session key data is destroyed.

Parameters: Pointer to an initialised instance of an *aes* structure defined in *miracl.h*

Return value: None

### 9.4.4 aes\_getreg \*

Function: void **aes\_getreg**(a,ir)

aes \*a;

char \*ir;

Module: mraes.c

Description: Reads the current contents of the input chaining register associated with this instance of the AES. This is the register initialised by the IV in the calls to **aes\_init** and **aes\_reset**.

Parameters: Pointer to an instance of the *aes* structure, defined in *miracl.h*, and a character array to hold the extracted 16-byte data.

Return value: None

<span><span>9.4.5 aes\_init \*</span></span>

Function: BOOL **aes\_init**(a,mode,nk,key,iv)

aes \*a;

int mode,nk;

char key**,**iv;

Module: mraes.c

Description: Initialises an Encryption/Decryption session using the Advanced Encryption Standard (AES). This is a block cipher system that encrypts data in 128-bit blocks using a key of 128, 192 or 256 bits. See \[Stinson\] for more background on block ciphers.

Parameters: Pointer to an instance of the *aes* structure defined in *miracl.h,* the *mode* of operation to be used, an integer *nk* which specifies the size of the Key in bytes, and pointers to the key itself and the optional Initialisation Vector (IV). The mode can be one of **MR\_ECB** (Electronic Code Book), **MR\_CBC** (Cipher Block Chaining), **MR\_CFB***n* (Cipher Feed-back where *n* is 1, 2 or 4), **MR\_PCFB***n* (error Propagating Cipher Feed-back where *n* is 1, 2 or 4) or **MR\_OFB***n* (Output Feed-back where *n* is 1, 2, 4, 8 or 16). The value of *n* indicates the number of bytes to be processed in each application. For more information on Modes of Operation, see \[Stinson\]. **MR\_PCFB***n* is an invention of our own \[Scott93\]. See below.

The value of *nk* can be 16, 24 or 32. A 16 bytes initialisation vector *iv* should be specified for all modes other than MR\_ECB, in which case it can be NULL.

Return value: TRUE if initialisation succeeded, otherwise FALSE.

<img src="https://MIRACL.org/download/attachments/7635927/9.1.png?version=1&amp;modificationDate=1372863201000&amp;api=v2" class="confluence-embedded-image" />

### 9.4.6 aes\_reset \*

Function: void **aes\_reset**(a,mode,iv)

aes \*a;

int mode;

char \*iv;

Module: mraes.c

Description: Resets the AES structure

Parameters: Pointer to an instance of the *aes* structure defined in *miracl.h*, an indication of the new *mode* of operation, and a pointer to a (possibly new) initialisation vector *iv*. See above for the modes allowed.

Return value: None

### 9.4.7 shs\_init \*

Function: void **shs\_init**(psh)

sha \*psh;

Module: mrshs.c

Description: Initialises an instance of the Secure Hash Algorithm SHA-1. Must be called before new use.

Parameters: Pointer to an instance of a structure defined in *miracl.h*

Return value: None

### 9.4.8 shs\_hash \*

Function: void **shs\_hash**(psh,hash)

sha \*psh;

char hash\[20\];

Module: mrshs.c

Description: Generates a twenty byte (160 bit) hash value into the provided array.

Parameters: Pointer to the current instance, and pointer to array to be filled.

Return value: None

### 9.4.9 shs\_process \*

Function: void **shs\_process**(psh,ch)

sha \*psh;

int ch;

Module: mrshs.c

Description: Processes a single byte. Typically called many times to provide input to the hashing process. The hash value of all the processed bytes can be retrieved by a subsequent call to **shs\_hash**.

Parameters: Pointer to the current instance, and character to be processed.

Return value: None

### 9.4.10 shs256\_init \*

Function: void **shs256\_init**(psh)

sha256 \*psh;

Module: mrshs256.c

Description: Initialises an instance of the Secure Hash Algorithm SHA-256. Must be called before new use.

Parameters: Pointer to an instance of a structure defined in *miracl.h*

Return value: None

### 9.4.11 shs256\_hash \*

Function: void **shs256\_hash**(psh,hash)

sha256 \*psh;

char hash\[32\];

Module: mrshs256.c

Description: Generates a 32 byte (256 bit) hash value into the provided array.

Parameters: Pointer to the current instance, and pointer to array to be filled.

Return value: None

### 9.4.12 shs256\_process \*

Function: void **shs256\_process**(psh,ch)

sha256 \*psh;

int ch;

Module: mrshs256.c

Description: Processes a single byte. Typically called many times to provide input to the hashing process. The hash value of all the processed bytes can be retrieved by a subsequent call to **shs256\_hash**.

Parameters: Pointer to the current instance, and character to be processed.

Return value: None

### 9.4.13 shs384\_init \*

Function: void **shs384\_init**(psh)

sha384 \*psh;

Module: mrshs512.c

Description: Initialises an instance of the Secure Hash Algorithm SHA-384. Must be called before new use.

Parameters: Pointer to an instance of a structure defined in *miracl.h*

Return value: None

Restrictions: The SHA-384 algorithm is only available if 64-bit data-type is defined.

### 9.4.14 shs384\_hash \*

Function: void **shs384\_hash**(psh,hash)

sha384 \*psh;

char hash\[48\];

Module: mrshs512.c

Description: Generates a 48 byte (384 bit) hash value into the provided array.

Parameters: Pointer to the current instance, and pointer to array to be filled.

Return value: None

### 9.4.15 shs384\_process \*

Function: void **shs512\_process**(psh,ch)

sha384 \*psh;

int ch;

Module: mrshs512.c

Description: Processes a single byte. Typically called many times to provide input to the hashing process. The hash value of all the processed bytes can be retrieved by a subsequent call to **shs384\_hash**.

Parameters: Pointer to the current instance, and character to be processed.

Return value: None

### 9.4.16 shs512\_init \*

Function: void **shs512\_init**(psh)

sha512 \*psh;

Module: mrshs512.c

Description: Initialises an instance of the Secure Hash Algorithm SHA-512. Must be called before new use.

Parameters: Pointer to an instance of a structure defined in *miracl.h*

Return value: None

Restrictions: The SHA-512 algorithm is only available if 64-bit data-type is defined.

### 9.4.17 shs512\_hash \*

Function: void **shs512\_hash**(psh,hash)

sha512 \*psh;

char hash\[64\];

Module: mrshs512.c

Description: Generates a 64 byte (512 bit) hash value into the provided array.

Parameters: Pointer to the current instance, and pointer to array to be filled.

Return value: None

### 9.4.18 shs512\_process \*

Function: void **shs512\_process**(psh,ch)

sha512 \*psh;

int ch;

Module: mrshs512.c

Description: Processes a single byte. Typically called many times to provide input to the hashing process. The hash value of all the processed bytes can be retrieved by a subsequent call to **shs512\_hash**.

Parameters: Pointer to the current instance, and character to be processed.

Return value: None

### 9.4.19 strong\_bigdig

Function: void **strong\_bigdig**(rng,n,b,x)

csprng \*rng;

int n,b;

big x;

Module: mrstrong.c

Description: Generates a big random number of given length from the cryptographically strong generator *rng*.

Parameters A pointer to the random number generator *rng*. A big number *x* and two integers *n* and *b*. On exit *x* contains a big random number *n* digits long to base *b*.

Return value: None

Restrictions: The base *b* must be printable, that is 2 £ *b* £ 256.

### 9.4.20 strong\_bigrand

Function: void **strong\_bigrand**(rng,w,x)

csprng \*rng;

big w,x;

Module: mrstrong.c

Description: Generates a cryptographically strong random big number *x* using the random number generator *rng* such that *0£x&lt;w*

Parameters: Two big numbers *w* and *x*, and a random number generator *rng*

Return value: None

### 9.4.21 strong\_init \*

Function: void **strong\_init**(rng,rawlen,raw,tod)

csprng \*rng;

int rawlen;

char \*raw;

long tod;

Module: mrstrong.c

Description: Initialize the cryptographically strong random number generator *rng*.

Parameters: A pointer to the random number generator *rng*. An array *raw* of length *rawlen* and a 32-bit time-of-day value *tod*. These two sources are used together to seed the generator. The former might be provided from random keystrokes, the latter from an internal clock. Subsequent calls to **strong\_rng** will provide random bytes.

Return value: None

Example: See *test1363.c* and *p1363.c* for an example of use.

### 9.4.22 strong\_kill \*

Function: void **strong\_kill**(rng)

csprng \*rng;

Module: mrstrong.c

Description: Kills the internal state of the random number generator *rng*

Parameters: A pointer to a random number generator

Return value: None

### 9.4.23 strong\_rng \*

Function: int **strong\_rng**(rng)

csprng \*rng;

Module: mrstrong.c

Description: Generates a sequence of cryptographically strong random bytes.

Parameters: A pointer to a random number

Return value: A random byte

9.5 Floating-Slash Routines
---------------------------

### 9.5.1 build

Function: void **build**(x,gener)

flash x;

int (\*gener)();

Module: mrbuild.c

Description: Uses supplied generator of regular continued fraction expansion to build up a flash number *x*, rounded if necessary.

Parameters: The flash number created, and the generator function.

Return value: None

Example: int phi(w,n)

flash w;

int n;

{ /\* rcf generator for golden ratio \*/

return 1;

}

...

...

build(x,phi);

...

This will calculate the golden ratio *(1+Ö5)/2* in *x* - very quickly!

### 9.5.2 dconv

Function: void **dconv**(d,x)

double d;

flash x;

Module: mrflash.c

Description: Converts a double to flash format.

Parameters: A double *d* and a flash variable *x*. On exit *x* will contain the flash equivalent of *d*.

Return value: None

### 9.5.3 denom

Function: void **denom**(x,y)

flash x;

big y;

Module: mrcore.c

Description: Extract the denominator of a flash number

Parameters: A flash number *x* and a big number *y*. On exit *y* will contain the denominator of *x*.

Return value: None

Restrictions: None

### 9.5.4 facos

Function: void **facos**(x,y)

flash x,y;

Module: mrflsh3.c

Description: Calculates arc-cosine of a flash number, using **fasin**.

Parameters: Two flash numbers *x* and *y*. On exit *y=arccos(x)*.

Return value: None

Restrictions: *|x|* must be less than or equal to 1.

### 9.5.5 facosh

Function: void **facosh**(x,y)

flash x,y;

Module: mrflsh4.c

Description: Calculates hyperbolic arc-cosine of a flash number.

Parameters: Two flash numbers *x* and *y*. On exit *y=arccosh(x)*.

Return value: None

Restrictions: *|x*| must be greater than or equal to 1.

### 9.5.6 fadd

Function: void **fadd**(x,y,z)

flash x,y,z;

Module: mrflash.c

Description: Add two flash numbers.

Parameters: Three flash numbers *x, y* and *z*. On exit *z=x+y*.

Return value: None

Restrictions: None

### 9.5.7 fasin

Function: void **fasin**(x,y)

flash x,y;

Module: mrflsh3.c

Description: Calculates arc-sin of a flash number, using **fatan**.

Parameters: Two flash numbers *x* and *y*. On exit *y=arcsin(x)*.

Return value: None

Restrictions: *|x*| must be less than or equal to 1.

### 9.5.8 fasinh

Function: void **fasinh**(x,y)

flash x,y;

Module: mrflsh4.c

Description: Calculates hyperbolic arc-sin of a flash number.

Parameters: Two flash numbers *x* and *y*. On exit *y=arcsinh(x)*.

Return value: None

### 9.5.9 fatan

Function: void **fatan**(x,y)

flash x,y;

Module: mrflsh3.c

Desciption: Calculates the arc-tangent of a flash number, using *O(n<sup>2.5</sup>)*method based on Newton's iteration.

Parameters: Two flash numbers *x* and *y*. On exit *y=arctan(x)*.

Return value: None

### 9.5.10 fatanh

Function: void **fatanh**(x,y)

flash x,y;

Module: mrflsh4.c

Desciption: Calculates the hyperbolic arc-tangent of a flash number.

Parameters: Two flash numbers *x* and *y*. On exit *y=arctanh(x)*.

Return value: None

Restrictions: *x<sup>2</sup>* must be less than 1

### 9.5.11 fcomp

Function: int **fcomp**(x,y)

flash x,y;

Module: mrflash.c

Description: Compare two flash numbers.

Parameters: Two flash numbers *x* and *y*.

Return value: Returns -1 if *y&gt;x*, +1 if *x&gt;y* and 0 if *x=y*.

### 9.5.12 fconv

Function: void **fconv**(n,d,x)

int n,d;

flash x;

Module: mrflash.c

Description: Convert a simple fraction to flash format.

Parameters: Integers *n* and *d*, and a flash number *x*.

On exit *x=n/d*

Return value: None

### 9.5.13 fcos

Function: void **fcos**(x,y)

flash x,y;

Module: mrflsh3.c

Description: Calculates cosine of a given flash angle, using **ftan**.

Parameters: Two flash numbers *x* and *y*. On exit *y=cos(x)*.

Return value: None

Restrictions: None

<span>9.5.14 fcosh</span>

Function: void **fcosh**(x,y)

flash x,y;

Module: mrflsh4.c

Description: Calculates hyperbolic cosine of a given flash angle.

Parameters: Two flash numbers *x* and *y*. On exit *y=cosh(x)*.

Return value: None

### 9.5.15 fdiv

Function: void **fdiv**(x,y,z)

flash x,y,z;

Module: mrflash.c

Description: Divides two flash numbers.

Parameters: Three big numbers *x, y* and *z*. On exit *z=x/y*.

Return value: None

### 9.5.16 fdsize

Function: double **fdsize**(x)

flash x;

Module: mrdouble.c

Description: Converts a flash number to double format.

Parameters: A flash number *x*.

Return value: The value of the parameter *x* as a double.

Restrictions: The value of *x* must be representable as a double.

### 9.5.17 fexp

Function: void **fexp**(x,y)

flash x,y;

Module: mrflsh2.c

Description: Calculates the exponential of a flash number using *O(n<sup>2.5</sup>)* method.

Parameters: Two flash numbers *x* and *y*. On exit *y=e<sup>x</sup>*.

Return value: None

Restrictions: None

### 9.5.18 fincr

Function: void **fincr**(x,n,d,y)

big x,y;

int n,d;

Module: mrflash.c

Description: Add a simple fraction to a flash number.

Parameters: Two flash numbers *x* and *y*, and two integers *n* and *d*.

On exit .

Return value: None

Restrictions: None

Example: fincr(x,-2,3,x);

This subtracts two-thirds from the value of *x*.

### 9.5.19 flog

Function: void **flog**(x,y)

flash x,y;

Module: mrflsh2.c

Description: Calculates the natural log of a flash number using *O(n<sup>2.5</sup>)* method.

Parameters: Two flash numbers *x* and *y*. On exit *y=log(x)*.

Return value: None

Restrictions: None

### 9.5.20 flop

Function: void **flop**(x,y,op,z)

flash x,y,z;

int \*op;

Module: mrflash.c

Description: Perform primitive flash operation. Used internally.

Parameters: Three flash numbers *x, y* and *z*. On exit z*=Fn(x,y),* where the function performed depends on the parameter *op*. See source listing comments for more details.

Return value: None

Restrictions: None

### 9.5.21 fmodulo

Function: void **fmodulo**(x,y,z)

flash x,y,z;

Module: mrflash.c

Description: Find the remainder when one flash number is divided by another.

Parameters: Three flash numbers *x, y* and *z*. On exit *z=x mod y*;

Return value: None

Restrictions: None

### 9.5.22 fmul

Function: void **fmul**(x,y,z)

flash x,y,z;

Module: mrflash.c

Description: Multiply two flash numbers.

Parameters: Three flash numbers *x, y* and *z*. On exit *z=x.y*

Return value: None

Restrictions: None

### 9.5.23 fpack

Function: void **fpack**(n,d,x)

flash x;

big n,d;

Module: mrcore.c

Description: Forms a flash number from big numerator and denominator.

Parameters: A flash number *x* and two big numbers *n* and *d*.

On exit .

Return value: None

Restrictions: The denominator must be non-zero. Flash variable *x* and big variable *d* must be distinct. The resulting flash variable must not be too big for the representation.

### 9.5.24 fpi

Function: void **fpi**(x)

flash x;

Module: mrpi.c

Description: Calculates p using Guass-Legendre *O(n<sup>2</sup>.log n)* method. Note that on subsequent calls to this routine, p is immediately available, as it is stored internally. (This routine is disappointingly slow. There appears to be no simple way to calculate a rational approximation to p quickly).

Parameters: A flash number *x*. On exit *x=p.*

Return value: None

Restrictions: None. Internally allocated memory is freed when the current MIRACL instance is ended by a call to **mirexit**.

### 9.5.25 fpmul

Function: void **fpmul**(x,n,d,y)

flash x,y;

int n,d;

Module: mrflash.c

Description: Multiplies a flash number by a simple fraction.

Parameters: Two flash numbers *x* and *y*, and two integers *n* and *d*.

On exit

Return value: None

Restrictions: None

### 9.5.26 fpower

Function: void **fpower**(x,n,y)

flash x,y;

int n;

Module: mrflsh1.c

Description: Raises a flash number to an integer power.

Parameters: Flash variables *x* and *y*, and an integer *n*.

On exit *y=x<sup>n</sup>*.

Return value: None

### 9.5.27 fpowf

Function: void **fpowf**(x,y,z)

flash x,y,z;

Module: mrflsh2.c

Description: Raises a flash number to a flash power.

Parameters: Three flash numbers *x*, *y* and *z*. On exit *z=x<sup>y</sup>*

Return value: None

### 9.5.28 frand

Function: void **frand**(x)

flash x;

Module: mrfrnd.c

Description: Generates a random flash number.

Parameters: A big number *x*. On exit *x* contains a flash random number in the range *0&lt;x&lt;1*.

Return value: None

### 9.5.29 frecip

Function: void **frecip** (x,y)

flash x,y;

Module: mrflash.c

Description: Calculates reciprocal of a flash number.

Parameters: Two flash numbers *x* and *y*. On exit *y=1/x*.

Return value: None

### 9.5.30 froot

Function: BOOL **froot**(x,m,y)

flash x,y;

int m;

Module: mrflsh1.c

Description: Calculates *m*-th root of a flash number using Newton's *O(n<sup>2</sup>)* method.

Parameters: Flash numbers *x* and *y*, and an integer *m*.

On exit *y* is the *m*-th root of *x*.

Return value: TRUE for exact root, otherwise FALSE

### 9.5.31 fsin

Function: void **fsin**(x,y)

flash x,y;

Module: mrflsh3.c

Description: Calculates sine of a given flash angle. Uses **ftan**.

Parameters: Two flash numbers *x* and *y*. On exit *y=sin(x)*.

Return value: None

### 9.5.32 fsinh

Function: void **fsinh**(x,y)

flash x,y;

Module: mrflsh4.c

Description: Calculates hyperbolic sine of a given flash angle.

Parameters: Two flash numbers *x* and *y*. On exit *y=sinh(x)*.

Return value: None

### 9.5.33 fsub

Function: void **fsub**(x,y,z)

flash x,y,z;

Module: mrflash.c

Description: Subtract two flash numbers.

Parameters: Three flash numbers *x, y* and *z*.

On exit *z=x-y*.

Return value: None

### 9.5.34 ftan

Function: void **ftan**(x,y)

flash x,y;

Module: mrflsh3.c

Description: Calculates the tan of a given flash angle, using an *O(n<sup>2.5</sup>)* method.

Parameters: Two flash numbers *x* and *y*. On exit *y=tan(x)*.

Return value: None

### 9.5.35 ftanh

Function: void **ftanh**(x,y)

flash x,y;

Module: mrflsh4.c

Description: Calculates the hyperbolic tan of a given flash angle.

Parameters: Two flash numbers *x* and *y*. On exit *y=tanh(x)*.

Return value: None

Restrictions: None

### 9.5.36 ftrunc

Function: void **ftrunc**(x,y,z)

flash x,z;

big y;

Module: mrflash.c

Description: Separates a flash number to a big number and a flash remainder.

Parameters: Flash numbers *x* and *z*, and a big number *y*. On exit *y=int(x)* and *z* is the fractional remainder. If *y* is the same as *z*, only *int(x)* is returned.

Return value: None

Restrictions: None

### 9.5.37 numer

Function: void **numer**(x,y)

flash x;

big y;

Module: mrcore.c

Description: Extract the numerator of a flash number.

Parameters: A flash number *x* and a big number *y*.

On exit *y* will contain the numerator of *x*.

Return value: None

Restrictions: None

### 9.5.38 mround

Function: void **mround**(n,d,x)

flash x;

big n,d;

Module: mrround.c

Description: Forms a rounded flash number from big numerator and denominator. If rounding takes place the instance variable **EXACT** is set to FALSE. **EXACT** is initialised to TRUE in routine **mirsys**. This routine is used internally.

Parameters: A flash number *x* and two big numbers *n* and *d*. On exit *x=R{n/d}*, that is the flash number *n/d* rounded if necessary to fit the representation.

Return value: None

Restrictions: The denominator must be non-zero.
