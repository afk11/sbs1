<?php

declare(strict_types=1);

namespace Afk11\Sbs1;

class StreamReader
{
    /**
     * Generates messages from a file until EOF is reached
     * @param LineReader $lineReader
     * @param string $file
     * @return \Generator
     */
    public function readFile(LineReader $lineReader, string $file): \Generator
    {
        $handle = fopen($file, 'r');
        if (!is_resource($handle)) {
            throw new \RuntimeException("Failed to open file!");
        }

        return $this->read($lineReader, $handle);
    }

    /**
     * Connects to the tcp host/port and consumes the stream until
     * remote side disconnects or EOF is reached.
     *
     * @param LineReader $lineReader
     * @param string $host
     * @param int $port
     * @return \Generator
     */
    public function readTcpStream(LineReader $lineReader, string $host, int $port): \Generator
    {
        $errno = null;
        $errstr = null;
        $handle = stream_socket_client("tcp://{$host}:{$port}", $errno, $errstr);
        if (!is_resource($handle)) {
            throw new \RuntimeException("Received error connecting to stream ($errno) - $errstr");
        }

        return $this->read($lineReader, $handle);
    }

    /**
     * This function draws from the stream and generates messages
     * for the client.
     * @param LineReader $lineReader
     * @param resource $stream
     * @return \Generator - generates ImmutableMessages
     */
    public function read(LineReader $lineReader, $stream): \Generator
    {
        $this->checkStream($stream);

        while (($buffer = $this->readFromStream($stream)) !== false) {
            yield $lineReader->read(trim($buffer));
        }

        $this->closeStream($stream);
    }

    /**
     * This checks that the stream has the necessary properties
     * we need. It can be overridden as required
     *
     * @param resource $stream stream resource
     */
    protected function checkStream($stream)
    {
        if (!is_resource($stream)) {
            throw new \InvalidArgumentException("Stream resource required for stream reader");
        }
        if (get_resource_type($stream) !== "stream") {
            throw new \InvalidArgumentException("Invalid resource type, expecting stream");
        }
    }

    /**
     * Reads a line from the stream
     * @param resource $stream stream resource
     * @return bool|string
     */
    protected function readFromStream($stream)
    {
        return fgets($stream);
    }

    /**
     * Check that the stream has reached EOF.
     * @param resource $stream stream resource
     */
    protected function closeStream($stream)
    {
        if (!feof($stream)) {
            throw new \RuntimeException("Unexpected stream error");
        }
        fclose($stream);
    }
}
