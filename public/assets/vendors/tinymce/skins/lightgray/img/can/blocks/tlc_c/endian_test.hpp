/*
 * File: endian_test.hpp
 *
 * Copyright 2001-2011 The MathWorks, Inc.
 */

#ifndef ENDIAN_TEST_HPP
#define ENDIAN_TEST_HPP

// the ENDIANESS of the CPU running this code
#ifndef LITTLE_ENDIAN
enum CPU_ENDIAN_ENUM { LITTLE_ENDIAN = 0, BIG_ENDIAN }; 
#endif

// store long(1) and access as char array to determine how bytes are stored (Endianess)
static union {
   long l;
   char c[sizeof(long)];
}ENDIAN_TEST = {1};
// the ENDIAN test: 1 in high byte -> BE, 1 in low byte -> LE
#define CPU_ENDIAN ( ENDIAN_TEST.c[sizeof(long)-1]  == 1 ? BIG_ENDIAN : LITTLE_ENDIAN )

#endif
