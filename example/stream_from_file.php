<?php

require __DIR__ . "/../vendor/autoload.php";

use Afk11\Sbs1\LineReader;
use Afk11\Sbs1\MessageType\MessageType;
use Afk11\Sbs1\MessageType\MessageTypeRegistryFactory;
use Afk11\Sbs1\StreamReader;
use Afk11\Sbs1\TransmissionType\TransmissionTypeRegistryFactory;

/**
 * This is a sample application which a message log from a file.
 * It demonstrates the boilerplate to create and consume a file
 * with a log of some messages.
 * The goal is to check the log for a plane which emitted each
 * kind of message
 */

if ($argc < 2) {
    die("missing file!\n");
}

$file = $argv[1];
if (!is_file($file)) {
    die("invalid file!\n");
}

// Initialize registries and readers
$lineReader = new LineReader(
    (new MessageTypeRegistryFactory())->create(),
    (new TransmissionTypeRegistryFactory())->create()
);
$streamReader = new StreamReader();

$planeInfoMap = [];
foreach ($streamReader->readFile($lineReader, $file) as $line) {
    if ($line->getMessageType()->getId() === MessageType::MSG) {
        // Tracks all planes
        $identKey = $line->getHexIdent();
        if (!array_key_exists($identKey, $planeInfoMap)) {
            $planeInfoMap[$identKey] = [];
        }

        // Stores a single message of each transmission type
        $transmissionType = $line->getTransmissionType()->getValue();
        if (!array_key_exists($transmissionType, $planeInfoMap[$identKey])) {
            $planeInfoMap[$identKey][$transmissionType] = $line;
        }
    }
}

// find the aircraft which emitted most message types
$maxKey = null;
foreach ($planeInfoMap as $key => $tracked) {
    if ($maxKey === null || count($tracked) > $planeInfoMap[$maxKey]) {
        $maxKey = $key;
    }
}
$best = $planeInfoMap[$maxKey];
ksort($best);

// show messages
print_r($best);
