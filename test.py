#!/usr/bin/env python
with open('test.dxf', 'r') as f:
  for line in f:
    if '$EXTMAX' in line:
      for line in f:
        Lines = f.readlines()
        if '$LIMMIN' in f:
          '[%s]' % ', '.join(map(str, Lines))
