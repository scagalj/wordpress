<?php
namespace MailPoetVendor;
if (!defined('ABSPATH')) exit;
use MailPoetVendor\Egulias\EmailValidator\EmailValidator;
use MailPoetVendor\Egulias\EmailValidator\Validation\MessageIDValidation;
use MailPoetVendor\Egulias\EmailValidator\Validation\RFCValidation;
class Swift_Mime_Headers_IdentificationHeader extends Swift_Mime_Headers_AbstractHeader
{
 private $ids = [];
 private $emailValidator;
 private $addressEncoder;
 public function __construct($name, EmailValidator $emailValidator, Swift_AddressEncoder $addressEncoder = null)
 {
 $this->setFieldName($name);
 $this->emailValidator = $emailValidator;
 $this->addressEncoder = $addressEncoder ?? new Swift_AddressEncoder_IdnAddressEncoder();
 }
 public function getFieldType()
 {
 return self::TYPE_ID;
 }
 public function setFieldBodyModel($model)
 {
 $this->setId($model);
 }
 public function getFieldBodyModel()
 {
 return $this->getIds();
 }
 public function setId($id)
 {
 $this->setIds(\is_array($id) ? $id : [$id]);
 }
 public function getId()
 {
 if (\count($this->ids) > 0) {
 return $this->ids[0];
 }
 }
 public function setIds(array $ids)
 {
 $actualIds = [];
 foreach ($ids as $id) {
 $this->assertValidId($id);
 $actualIds[] = $id;
 }
 $this->clearCachedValueIf($this->ids != $actualIds);
 $this->ids = $actualIds;
 }
 public function getIds()
 {
 return $this->ids;
 }
 public function getFieldBody()
 {
 if (!$this->getCachedValue()) {
 $angleAddrs = [];
 foreach ($this->ids as $id) {
 $angleAddrs[] = '<' . $this->addressEncoder->encodeString($id) . '>';
 }
 $this->setCachedValue(\implode(' ', $angleAddrs));
 }
 return $this->getCachedValue();
 }
 private function assertValidId($id)
 {
 $emailValidation = \class_exists(MessageIDValidation::class) ? new MessageIDValidation() : new RFCValidation();
 if (!$this->emailValidator->isValid($id, $emailValidation)) {
 throw new Swift_RfcComplianceException('Invalid ID given <' . $id . '>');
 }
 }
}
