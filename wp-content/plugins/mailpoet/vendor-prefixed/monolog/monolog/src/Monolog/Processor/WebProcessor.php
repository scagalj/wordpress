<?php
namespace MailPoetVendor\Monolog\Processor;
if (!defined('ABSPATH')) exit;
class WebProcessor implements ProcessorInterface
{
 protected $serverData;
 protected $extraFields = array('url' => 'REQUEST_URI', 'ip' => 'REMOTE_ADDR', 'http_method' => 'REQUEST_METHOD', 'server' => 'SERVER_NAME', 'referrer' => 'HTTP_REFERER');
 public function __construct($serverData = null, array $extraFields = null)
 {
 if (null === $serverData) {
 $this->serverData =& $_SERVER;
 } elseif (\is_array($serverData) || $serverData instanceof \ArrayAccess) {
 $this->serverData = $serverData;
 } else {
 throw new \UnexpectedValueException('$serverData must be an array or object implementing ArrayAccess.');
 }
 if (isset($this->serverData['UNIQUE_ID'])) {
 $this->extraFields['unique_id'] = 'UNIQUE_ID';
 }
 if (null !== $extraFields) {
 if (isset($extraFields[0])) {
 foreach (\array_keys($this->extraFields) as $fieldName) {
 if (!\in_array($fieldName, $extraFields)) {
 unset($this->extraFields[$fieldName]);
 }
 }
 } else {
 $this->extraFields = $extraFields;
 }
 }
 }
 public function __invoke(array $record)
 {
 // skip processing if for some reason request data
 // is not present (CLI or wonky SAPIs)
 if (!isset($this->serverData['REQUEST_URI'])) {
 return $record;
 }
 $record['extra'] = $this->appendExtraFields($record['extra']);
 return $record;
 }
 public function addExtraField($extraName, $serverName)
 {
 $this->extraFields[$extraName] = $serverName;
 return $this;
 }
 private function appendExtraFields(array $extra)
 {
 foreach ($this->extraFields as $extraName => $serverName) {
 $extra[$extraName] = isset($this->serverData[$serverName]) ? $this->serverData[$serverName] : null;
 }
 return $extra;
 }
}
