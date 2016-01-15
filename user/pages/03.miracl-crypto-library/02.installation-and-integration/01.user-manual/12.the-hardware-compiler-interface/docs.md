---
title: 12. The Hardware/Compiler Interface
taxonomy:
    category: docs
---

Hardware/compiler details are specified to MIRACL in this header file *mirdef.h*

For example:-

/\*

\* MIRACL compiler/hardware definitions - mirdef.h

\* This version suitable for use with most 32-bit

\* computers

\*

\* Copyright (c) 1988-1999 Shamus Software Ltd.

\*/

\#define MIRACL\_32

\#define MR\_LITTLE\_ENDIAN

/\* this may need to be changed \*/

\#define mr\_utype int /\* the underlying type is usually int \*

\* but see mrmuldv.any \*/

\#define mr\_unsign32 unsigned long

/\* 32 bit unsigned type \*/

\#define MR\_IBITS 32 /\* number of bits in an int \*/

\#define MR\_LBITS 32 /\* number of bits in a long \*/

\#define MR\_FLASH 52 /\* delete this definition if integer \*

\* only version of MIRACL required \*

\* Number of bits per double mantissa \*/

\#define MAXBASE ((mr\_small)1&lt;&lt;(MIRACL-1))

\#define MRBITSINCHAR 8

/\* Number of bits in char type \*/

/\* \#define MR\_NOASM \* define this if using C code only \*

\* Note: mr\_dltype MUST be defined \*/

/\* \#define mr\_dltype long long

\* double-length type \*/

/\*

\#define MR\_STRIPPED\_DOWN \* define this to minimize size \*

\* of library - all error messages \*

\* lost! USE WITH CARE - see mrcore.c \*/

This file must be edited if porting to a new hardware environment. Assembly language versions of the time-critical routines in *mrmuldv.any* may also have to be written, if not already provided, although in most cases the standard C version *mrmuldv.ccc* can simply be copied to *mrmuldv.c*.

It is best where possible to use the *mirdef.h* file that is generated automatically by the interactive *config.c* program.
