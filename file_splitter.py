#!/usr/bin/env python

# Copyright (C) 2014, Yasar Senturk <yasarix@gmail.com>
#
# Splits the given file into smaller files.

import sys

if len(sys.argv) != 4:
	print "Usage:"
	print "file_splitter.py <input_file> <output_file_name_prefix> <lines_per_file>"
	sys.exit(1)

in_file = open(sys.argv[1], 'r')
out_file_prefix = sys.argv[2]

if not sys.argv[3].isalnum():
	print "Wrong lines per file value: " + sys.argv[3]

lines_per_file = int(sys.argv[3])

line_number = 0
file_number = 0
output_file = ''

for line in in_file:
	if line != "":
		line_number += 1

		if line_number == 1:
			if output_file:
				output_file.close()

			output_file_name = out_file_prefix + str(file_number) + ".txt"
			output_file = open(output_file_name, 'w')

		output_file.write(line)

		if line_number == lines_per_file:
			line_number = 0
			file_number += 1
