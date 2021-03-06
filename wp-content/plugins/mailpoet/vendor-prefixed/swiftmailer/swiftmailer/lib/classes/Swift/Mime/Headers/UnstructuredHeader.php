<?php
namespace MailPoetVendor;
if (!defined('ABSPATH')) exit;
class Swift_Mime_Headers_UnstructuredHeader extends Swift_Mime_Headers_AbstractHeader
{
 private $value;
 public function __construct($name, Swift_Mime_HeaderEncoder $encoder)
 {
 $this->setFieldName($name);
 $this->setEncoder($encoder);
 }
 public function getFieldType()
 {
 return self::TYPE_TEXT;
 }
 public function setFieldBodyModel($model)
 {
 $this->setValue($model);
 }
 public function getFieldBodyModel()
 {
 return $this->getValue();
 }
 public function getValue()
 {
 return $this->value;
 }
 public function setValue($value)
 {
 $this->clearCachedValueIf($this->value != $value);
 $this->value = $value;
 }
 public function getFieldBody()
 {
 if (!$this->getCachedValue()) {
 $this->setCachedValue($this->encodeWords($this, $this->value));
 }
 return $this->getCachedValue();
 }
}
