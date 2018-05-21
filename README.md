# sbs1

This project provides simple library for decoding [ADSB](https://en.wikipedia.org/wiki/Automatic_dependent_surveillance_%E2%80%93_broadcast) information from SBS-1 format.

[SBS1 format](http://woodair.net/sbs/article/barebones42_socket_data.htm) is a CSV format produced by ADSB decoders.

This package enables decoding raw messages, and generating messages from a 'stream' type (a file handle or socket).

The software can decode messages produced on port 30003 by dump1090 (started with the `--net` flag). There are many cheap (~10$) devices that can be used for this.

## Installation

    composer require afk11/sbs1

## Examples

### Parse raw messages

[parsing_messages.php](./example/parsing_messages.php)

### Stream from file

[stream_from_file.php](./example/stream_from_file.php)

### Stream from Socket

This example is missing, but it's essentially a one line difference
to stream_from_file.php.

Replace the line calling readFile with a call to readTcpStream:

```
-foreach ($streamReader->readFile($lineReader, $file) as $line) {
+foreach ($streamReader->readTcpStream($lineReader, "127.0.0.1", 30003) as $line) {
```
