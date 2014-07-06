<?php

class BuffaloHandle {
    private $mainland;
    private $size = 0;

    public function __construct($stream = NULL) {
        if (is_null($stream) || is_resource($stream) === false) {
            throw new \InvalidArgumentException('Stream must be a resource!');
        }

        $meta = stream_get_meta_data($stream);

        if ($meta['seekable'] === false) {
            $this->mainland = self::toMemoryStream($stream);
        } else {
            $this->mainland = $stream;
        }

        rewind($this->mainland);
        fseek($this->mainland, 0, SEEK_END);
        $this->size = ftell($this->mainland);
        rewind($this->mainland);
    }

    public function size() {
        return $this->size;
    }

    public function seek($offset) {
        fseek($this->mainland, $offset);
    }

    public function position() {
        return ftell($this->mainland);
    }

    public function read($length = 1) {
        // Protect against 0 byte reads when an EOF
        if ($length < 0) {
            throw new \RuntimeException('Length cannot be negative');
        }

        if ($length == 0) return '';

        $bytes = fread($this->mainland, $length);
        if (FALSE === $bytes || (strlen($bytes) != $length)) {
            throw new \RuntimeException('Failed to read ' . $length . ' bytes');
        }

        return $bytes;
    }

    public function close() {
        fclose($this->mainland);
    }

    public function end() {
        return ftell($this->mainland) == $this->size;
    }

    private static function toMemoryStream($stream, $maxlength = -1, $offset = 0) {
        $memoryStream = fopen('php://memory', 'wb+');
        stream_copy_to_stream($stream, $memoryStream, $maxlength, $offset);
        return $memoryStream;
    }
}
