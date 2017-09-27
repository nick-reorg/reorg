<?php
/**
 * Created by PhpStorm.
 * User: greg
 * Date: 9/24/17
 * Time: 3:02 PM
 */

namespace App\Http\Packages\CMS\Models;

use App\Http\Packages\ElasticSearch\Contracts\BulkableDocumentInterface;
use App\Http\Packages\ElasticSearch\Contracts\ScorableInterface;
use Illuminate\Contracts\Support\Arrayable;
use JsonSerializable;

/**
 * Class CMSRecord
 * @package App\Http\Packages\CMS\Models
 */
class CMSRecord implements Arrayable, JsonSerializable, BulkableDocumentInterface, ScorableInterface
{
    /**
     * @var string
     */
    private $applicable_manufacturer_or_applicable_gpo_making_payment_country;

    /**
     * @var string
     */
    private $applicable_manufacturer_or_applicable_gpo_making_payment_id;

    /**
     * @var string
     */
    private $applicable_manufacturer_or_applicable_gpo_making_payment_name;

    /**
     * @var string
     */
    private $applicable_manufacturer_or_applicable_gpo_making_payment_state;

    /**
     * @var string
     */
    private $associated_drug_or_biological_ndc_1;

    /**
     * @var string
     */
    private $associated_drug_or_biological_ndc_2;

    /**
     * @var string
     */
    private $change_type;

    /**
     * @var string
     */
    private $charity_indicator;

    /**
     * @var string
     */
    private $covered_or_noncovered_indicator_1;

    /**
     * @var string
     */
    private $covered_or_noncovered_indicator_2;

    /**
     * @var string
     */
    private $covered_recipient_type;

    /**
     * @var string
     */
    private $date_of_payment;

    /**
     * @var string
     */
    private $delay_in_publication_indicator;

    /**
     * @var string
     */
    private $dispute_status_for_publication;

    /**
     * @var string
     */
    private $form_of_payment_or_transfer_of_value;

    /**
     * @var string
     */
    private $indicate_drug_or_biological_or_device_or_medical_supply_1;

    /**
     * @var string
     */
    private $indicate_drug_or_biological_or_device_or_medical_supply_2;

    /**
     * @var string
     */
    private $name_of_drug_or_biological_or_device_or_medical_supply_1;

    /**
     * @var string
     */
    private $name_of_drug_or_biological_or_device_or_medical_supply_2;

    /**
     * @var string
     */
    private $nature_of_payment_or_transfer_of_value;

    /**
     * @var string
     */
    private $number_of_payments_included_in_total_amount;

    /**
     * @var string
     */
    private $payment_publication_date;

    /**
     * @var string
     */
    private $physician_first_name;

    /**
     * @var string
     */
    private $physician_last_name;

    /**
     * @var string
     */
    private $physician_license_state_code1;

    /**
     * @var string
     */
    private $physician_name_suffix;

    /**
     * @var string
     */
    private $physician_ownership_indicator;

    /**
     * @var string
     */
    private $physician_primary_type;

    /**
     * @var string
     */
    private $physician_profile_id;

    /**
     * @var string
     */
    private $physician_specialty;

    /**
     * @var string
     */
    private $product_category_or_therapeutic_area_1;

    /**
     * @var string
     */
    private $product_category_or_therapeutic_area_2;

    /**
     * @var string
     */
    private $program_year;

    /**
     * @var string
     */
    private $recipient_city;

    /**
     * @var string
     */
    private $recipient_country;

    /**
     * @var string
     */
    private $recipient_primary_business_street_address_line1;

    /**
     * @var string
     */
    private $recipient_state;

    /**
     * @var string
     */
    private $recipient_zip_code;

    /**
     * @var string
     */
    private $record_id;

    /**
     * @var string
     */
    private $related_product_indicator;

    /**
     * @var float
     */
    private $score;

    /**
     * @var string
     */
    private $submitting_applicable_manufacturer_or_applicable_gpo_name;

    /**
     * @var string
     */
    private $third_party_payment_recipient_indicator;

    /**
     * @var string
     */
    private $total_amount_of_payment_usdollars;

    /**
     * @return string
     */
    public function getApplicableManufacturerOrApplicableGpoMakingPaymentCountry()
    {
        return $this->applicable_manufacturer_or_applicable_gpo_making_payment_country;
    }

    /**
     * @param string $applicable_manufacturer_or_applicable_gpo_making_payment_country
     */
    public function setApplicableManufacturerOrApplicableGpoMakingPaymentCountry($applicable_manufacturer_or_applicable_gpo_making_payment_country)
    {
        $this->applicable_manufacturer_or_applicable_gpo_making_payment_country = $applicable_manufacturer_or_applicable_gpo_making_payment_country;
    }

    /**
     * @return string
     */
    public function getApplicableManufacturerOrApplicableGpoMakingPaymentId()
    {
        return $this->applicable_manufacturer_or_applicable_gpo_making_payment_id;
    }

    /**
     * @param string $applicable_manufacturer_or_applicable_gpo_making_payment_id
     */
    public function setApplicableManufacturerOrApplicableGpoMakingPaymentId($applicable_manufacturer_or_applicable_gpo_making_payment_id)
    {
        $this->applicable_manufacturer_or_applicable_gpo_making_payment_id = $applicable_manufacturer_or_applicable_gpo_making_payment_id;
    }

    /**
     * @return string
     */
    public function getApplicableManufacturerOrApplicableGpoMakingPaymentName()
    {
        return $this->applicable_manufacturer_or_applicable_gpo_making_payment_name;
    }

    /**
     * @param string $applicable_manufacturer_or_applicable_gpo_making_payment_name
     */
    public function setApplicableManufacturerOrApplicableGpoMakingPaymentName($applicable_manufacturer_or_applicable_gpo_making_payment_name)
    {
        $this->applicable_manufacturer_or_applicable_gpo_making_payment_name = $applicable_manufacturer_or_applicable_gpo_making_payment_name;
    }

    /**
     * @return string
     */
    public function getApplicableManufacturerOrApplicableGpoMakingPaymentState()
    {
        return $this->applicable_manufacturer_or_applicable_gpo_making_payment_state;
    }

    /**
     * @param string $applicable_manufacturer_or_applicable_gpo_making_payment_state
     */
    public function setApplicableManufacturerOrApplicableGpoMakingPaymentState($applicable_manufacturer_or_applicable_gpo_making_payment_state)
    {
        $this->applicable_manufacturer_or_applicable_gpo_making_payment_state = $applicable_manufacturer_or_applicable_gpo_making_payment_state;
    }

    /**
     * @return string
     */
    public function getAssociatedDrugOrBiologicalNdc1()
    {
        return $this->associated_drug_or_biological_ndc_1;
    }

    /**
     * @param string $associated_drug_or_biological_ndc_1
     */
    public function setAssociatedDrugOrBiologicalNdc1($associated_drug_or_biological_ndc_1)
    {
        $this->associated_drug_or_biological_ndc_1 = $associated_drug_or_biological_ndc_1;
    }

    /**
     * @return string
     */
    public function getAssociatedDrugOrBiologicalNdc2()
    {
        return $this->associated_drug_or_biological_ndc_2;
    }

    /**
     * @param string $associated_drug_or_biological_ndc_2
     */
    public function setAssociatedDrugOrBiologicalNdc2($associated_drug_or_biological_ndc_2)
    {
        $this->associated_drug_or_biological_ndc_2 = $associated_drug_or_biological_ndc_2;
    }

    /**
     * @return string
     */
    public function getChangeType()
    {
        return $this->change_type;
    }

    /**
     * @param string $change_type
     */
    public function setChangeType($change_type)
    {
        $this->change_type = $change_type;
    }

    /**
     * @return string
     */
    public function getCharityIndicator()
    {
        return $this->charity_indicator;
    }

    /**
     * @param string $charity_indicator
     */
    public function setCharityIndicator($charity_indicator)
    {
        $this->charity_indicator = $charity_indicator;
    }

    /**
     * @return string
     */
    public function getCoveredOrNoncoveredIndicator1()
    {
        return $this->covered_or_noncovered_indicator_1;
    }

    /**
     * @param string $covered_or_noncovered_indicator_1
     */
    public function setCoveredOrNoncoveredIndicator1($covered_or_noncovered_indicator_1)
    {
        $this->covered_or_noncovered_indicator_1 = $covered_or_noncovered_indicator_1;
    }

    /**
     * @return string
     */
    public function getCoveredOrNoncoveredIndicator2()
    {
        return $this->covered_or_noncovered_indicator_2;
    }

    /**
     * @param string $covered_or_noncovered_indicator_2
     */
    public function setCoveredOrNoncoveredIndicator2($covered_or_noncovered_indicator_2)
    {
        $this->covered_or_noncovered_indicator_2 = $covered_or_noncovered_indicator_2;
    }

    /**
     * @return string
     */
    public function getCoveredRecipientType()
    {
        return $this->covered_recipient_type;
    }

    /**
     * @param string $covered_recipient_type
     */
    public function setCoveredRecipientType($covered_recipient_type)
    {
        $this->covered_recipient_type = $covered_recipient_type;
    }

    /**
     * @return string
     */
    public function getDateOfPayment()
    {
        return $this->date_of_payment;
    }

    /**
     * @param string $date_of_payment
     */
    public function setDateOfPayment($date_of_payment)
    {
        $this->date_of_payment = $date_of_payment;
    }

    /**
     * @return string
     */
    public function getDelayInPublicationIndicator()
    {
        return $this->delay_in_publication_indicator;
    }

    /**
     * @param string $delay_in_publication_indicator
     */
    public function setDelayInPublicationIndicator($delay_in_publication_indicator)
    {
        $this->delay_in_publication_indicator = $delay_in_publication_indicator;
    }

    /**
     * @return string
     */
    public function getDisputeStatusForPublication()
    {
        return $this->dispute_status_for_publication;
    }

    /**
     * @param string $dispute_status_for_publication
     */
    public function setDisputeStatusForPublication($dispute_status_for_publication)
    {
        $this->dispute_status_for_publication = $dispute_status_for_publication;
    }

    /**
     * @return string
     */
    public function getFormOfPaymentOrTransferOfValue()
    {
        return $this->form_of_payment_or_transfer_of_value;
    }

    /**
     * @param string $form_of_payment_or_transfer_of_value
     */
    public function setFormOfPaymentOrTransferOfValue($form_of_payment_or_transfer_of_value)
    {
        $this->form_of_payment_or_transfer_of_value = $form_of_payment_or_transfer_of_value;
    }

    /**
     * @return string
     */
    public function getIndicateDrugOrBiologicalOrDeviceOrMedicalSupply1()
    {
        return $this->indicate_drug_or_biological_or_device_or_medical_supply_1;
    }

    /**
     * @param string $indicate_drug_or_biological_or_device_or_medical_supply_1
     */
    public function setIndicateDrugOrBiologicalOrDeviceOrMedicalSupply1($indicate_drug_or_biological_or_device_or_medical_supply_1)
    {
        $this->indicate_drug_or_biological_or_device_or_medical_supply_1 = $indicate_drug_or_biological_or_device_or_medical_supply_1;
    }

    /**
     * @return string
     */
    public function getIndicateDrugOrBiologicalOrDeviceOrMedicalSupply2()
    {
        return $this->indicate_drug_or_biological_or_device_or_medical_supply_2;
    }

    /**
     * @param string $indicate_drug_or_biological_or_device_or_medical_supply_2
     */
    public function setIndicateDrugOrBiologicalOrDeviceOrMedicalSupply2($indicate_drug_or_biological_or_device_or_medical_supply_2)
    {
        $this->indicate_drug_or_biological_or_device_or_medical_supply_2 = $indicate_drug_or_biological_or_device_or_medical_supply_2;
    }

    /**
     * @return string
     */
    public function getNameOfDrugOrBiologicalOrDeviceOrMedicalSupply1()
    {
        return $this->name_of_drug_or_biological_or_device_or_medical_supply_1;
    }

    /**
     * @param string $name_of_drug_or_biological_or_device_or_medical_supply_1
     */
    public function setNameOfDrugOrBiologicalOrDeviceOrMedicalSupply1($name_of_drug_or_biological_or_device_or_medical_supply_1)
    {
        $this->name_of_drug_or_biological_or_device_or_medical_supply_1 = $name_of_drug_or_biological_or_device_or_medical_supply_1;
    }

    /**
     * @return string
     */
    public function getNameOfDrugOrBiologicalOrDeviceOrMedicalSupply2()
    {
        return $this->name_of_drug_or_biological_or_device_or_medical_supply_2;
    }

    /**
     * @param string $name_of_drug_or_biological_or_device_or_medical_supply_2
     */
    public function setNameOfDrugOrBiologicalOrDeviceOrMedicalSupply2($name_of_drug_or_biological_or_device_or_medical_supply_2)
    {
        $this->name_of_drug_or_biological_or_device_or_medical_supply_2 = $name_of_drug_or_biological_or_device_or_medical_supply_2;
    }

    /**
     * @return string
     */
    public function getNatureOfPaymentOrTransferOfValue()
    {
        return $this->nature_of_payment_or_transfer_of_value;
    }

    /**
     * @param string $nature_of_payment_or_transfer_of_value
     */
    public function setNatureOfPaymentOrTransferOfValue($nature_of_payment_or_transfer_of_value)
    {
        $this->nature_of_payment_or_transfer_of_value = $nature_of_payment_or_transfer_of_value;
    }

    /**
     * @return string
     */
    public function getNumberOfPaymentsIncludedInTotalAmount()
    {
        return $this->number_of_payments_included_in_total_amount;
    }

    /**
     * @param string $number_of_payments_included_in_total_amount
     */
    public function setNumberOfPaymentsIncludedInTotalAmount($number_of_payments_included_in_total_amount)
    {
        $this->number_of_payments_included_in_total_amount = $number_of_payments_included_in_total_amount;
    }

    /**
     * @return string
     */
    public function getPaymentPublicationDate()
    {
        return $this->payment_publication_date;
    }

    /**
     * @param string $payment_publication_date
     */
    public function setPaymentPublicationDate($payment_publication_date)
    {
        $this->payment_publication_date = $payment_publication_date;
    }

    /**
     * @return string
     */
    public function getPhysicianFirstName()
    {
        return $this->physician_first_name;
    }

    /**
     * @param string $physician_first_name
     */
    public function setPhysicianFirstName($physician_first_name)
    {
        $this->physician_first_name = $physician_first_name;
    }

    /**
     * @return string
     */
    public function getPhysicianLastName()
    {
        return $this->physician_last_name;
    }

    /**
     * @param string $physician_last_name
     */
    public function setPhysicianLastName($physician_last_name)
    {
        $this->physician_last_name = $physician_last_name;
    }

    /**
     * @return string
     */
    public function getPhysicianLicenseStateCode1()
    {
        return $this->physician_license_state_code1;
    }

    /**
     * @param string $physician_license_state_code1
     */
    public function setPhysicianLicenseStateCode1($physician_license_state_code1)
    {
        $this->physician_license_state_code1 = $physician_license_state_code1;
    }

    /**
     * @return string
     */
    public function getPhysicianNameSuffix()
    {
        return $this->physician_name_suffix;
    }

    /**
     * @param string $physician_name_suffix
     */
    public function setPhysicianNameSuffix($physician_name_suffix)
    {
        $this->physician_name_suffix = $physician_name_suffix;
    }

    /**
     * @return string
     */
    public function getPhysicianOwnershipIndicator()
    {
        return $this->physician_ownership_indicator;
    }

    /**
     * @param string $physician_ownership_indicator
     */
    public function setPhysicianOwnershipIndicator($physician_ownership_indicator)
    {
        $this->physician_ownership_indicator = $physician_ownership_indicator;
    }

    /**
     * @return string
     */
    public function getPhysicianPrimaryType()
    {
        return $this->physician_primary_type;
    }

    /**
     * @param string $physician_primary_type
     */
    public function setPhysicianPrimaryType($physician_primary_type)
    {
        $this->physician_primary_type = $physician_primary_type;
    }

    /**
     * @return string
     */
    public function getPhysicianProfileId()
    {
        return $this->physician_profile_id;
    }

    /**
     * @param string $physician_profile_id
     */
    public function setPhysicianProfileId($physician_profile_id)
    {
        $this->physician_profile_id = $physician_profile_id;
    }

    /**
     * @return string
     */
    public function getPhysicianSpecialty()
    {
        return $this->physician_specialty;
    }

    /**
     * @param string $physician_specialty
     */
    public function setPhysicianSpecialty($physician_specialty)
    {
        $this->physician_specialty = $physician_specialty;
    }

    /**
     * @return string
     */
    public function getProductCategoryOrTherapeuticArea1()
    {
        return $this->product_category_or_therapeutic_area_1;
    }

    /**
     * @param string $product_category_or_therapeutic_area_1
     */
    public function setProductCategoryOrTherapeuticArea1($product_category_or_therapeutic_area_1)
    {
        $this->product_category_or_therapeutic_area_1 = $product_category_or_therapeutic_area_1;
    }

    /**
     * @return string
     */
    public function getProductCategoryOrTherapeuticArea2()
    {
        return $this->product_category_or_therapeutic_area_2;
    }

    /**
     * @param string $product_category_or_therapeutic_area_2
     */
    public function setProductCategoryOrTherapeuticArea2($product_category_or_therapeutic_area_2)
    {
        $this->product_category_or_therapeutic_area_2 = $product_category_or_therapeutic_area_2;
    }

    /**
     * @return string
     */
    public function getProgramYear()
    {
        return $this->program_year;
    }

    /**
     * @param string $program_year
     */
    public function setProgramYear($program_year)
    {
        $this->program_year = $program_year;
    }

    /**
     * @return string
     */
    public function getRecipientCity()
    {
        return $this->recipient_city;
    }

    /**
     * @param string $recipient_city
     */
    public function setRecipientCity($recipient_city)
    {
        $this->recipient_city = $recipient_city;
    }

    /**
     * @return string
     */
    public function getRecipientCountry()
    {
        return $this->recipient_country;
    }

    /**
     * @param string $recipient_country
     */
    public function setRecipientCountry($recipient_country)
    {
        $this->recipient_country = $recipient_country;
    }

    /**
     * @return string
     */
    public function getRecipientPrimaryBusinessStreetAddressLine1()
    {
        return $this->recipient_primary_business_street_address_line1;
    }

    /**
     * @param string $recipient_primary_business_street_address_line1
     */
    public function setRecipientPrimaryBusinessStreetAddressLine1($recipient_primary_business_street_address_line1)
    {
        $this->recipient_primary_business_street_address_line1 = $recipient_primary_business_street_address_line1;
    }

    /**
     * @return string
     */
    public function getRecipientState()
    {
        return $this->recipient_state;
    }

    /**
     * @param string $recipient_state
     */
    public function setRecipientState($recipient_state)
    {
        $this->recipient_state = $recipient_state;
    }

    /**
     * @return string
     */
    public function getRecipientZipCode()
    {
        return $this->recipient_zip_code;
    }

    /**
     * @param string $recipient_zip_code
     */
    public function setRecipientZipCode($recipient_zip_code)
    {
        $this->recipient_zip_code = $recipient_zip_code;
    }

    /**
     * @return string
     */
    public function getRecordId()
    {
        return $this->record_id;
    }

    /**
     * @param string $record_id
     */
    public function setRecordId($record_id)
    {
        $this->record_id = $record_id;
    }

    /**
     * @return string
     */
    public function getRelatedProductIndicator()
    {
        return $this->related_product_indicator;
    }

    /**
     * @param string $related_product_indicator
     */
    public function setRelatedProductIndicator($related_product_indicator)
    {
        $this->related_product_indicator = $related_product_indicator;
    }

    /**
     * @return string
     */
    public function getSubmittingApplicableManufacturerOrApplicableGpoName()
    {
        return $this->submitting_applicable_manufacturer_or_applicable_gpo_name;
    }

    /**
     * @param string $submitting_applicable_manufacturer_or_applicable_gpo_name
     */
    public function setSubmittingApplicableManufacturerOrApplicableGpoName($submitting_applicable_manufacturer_or_applicable_gpo_name)
    {
        $this->submitting_applicable_manufacturer_or_applicable_gpo_name = $submitting_applicable_manufacturer_or_applicable_gpo_name;
    }

    /**
     * @return string
     */
    public function getThirdPartyPaymentRecipientIndicator()
    {
        return $this->third_party_payment_recipient_indicator;
    }

    /**
     * @param string $third_party_payment_recipient_indicator
     */
    public function setThirdPartyPaymentRecipientIndicator($third_party_payment_recipient_indicator)
    {
        $this->third_party_payment_recipient_indicator = $third_party_payment_recipient_indicator;
    }

    /**
     * @return string
     */
    public function getTotalAmountOfPaymentUsdollars()
    {
        return $this->total_amount_of_payment_usdollars;
    }

    /**
     * @param string $total_amount_of_payment_usdollars
     */
    public function setTotalAmountOfPaymentUsdollars($total_amount_of_payment_usdollars)
    {
        $this->total_amount_of_payment_usdollars = $total_amount_of_payment_usdollars;
    }

    /**
     * @param float $score
     */
    public function setScore($score)
    {
        $this->score = $score;
    }

    /**
     * @return float
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @param array $row
     */
    public function extractRow(array $row)
    {
      $this->applicable_manufacturer_or_applicable_gpo_making_payment_country = array_get($row ,'applicable_manufacturer_or_applicable_gpo_making_payment_country');
      $this->applicable_manufacturer_or_applicable_gpo_making_payment_id      = array_get($row ,'applicable_manufacturer_or_applicable_gpo_making_payment_id');
      $this->applicable_manufacturer_or_applicable_gpo_making_payment_name    = array_get($row ,'applicable_manufacturer_or_applicable_gpo_making_payment_name');
      $this->applicable_manufacturer_or_applicable_gpo_making_payment_state   = array_get($row ,'applicable_manufacturer_or_applicable_gpo_making_payment_state');
      $this->associated_drug_or_biological_ndc_1                              = array_get($row ,'associated_drug_or_biological_ndc_1');
      $this->associated_drug_or_biological_ndc_2                              = array_get($row ,'associated_drug_or_biological_ndc_2');
      $this->change_type                                                      = array_get($row ,'change_type');
      $this->charity_indicator                                                = array_get($row ,'charity_indicator');
      $this->covered_or_noncovered_indicator_1                                = array_get($row ,'covered_or_noncovered_indicator_1');
      $this->covered_or_noncovered_indicator_2                                = array_get($row ,'covered_or_noncovered_indicator_2');
      $this->covered_recipient_type                                           = array_get($row ,'covered_recipient_type');
      $this->date_of_payment                                                  = array_get($row ,'date_of_payment');
      $this->delay_in_publication_indicator                                   = array_get($row ,'delay_in_publication_indicator');
      $this->dispute_status_for_publication                                   = array_get($row ,'dispute_status_for_publication');
      $this->form_of_payment_or_transfer_of_value                             = array_get($row ,'form_of_payment_or_transfer_of_value');
      $this->indicate_drug_or_biological_or_device_or_medical_supply_1        = array_get($row ,'indicate_drug_or_biological_or_device_or_medical_supply_1');
      $this->indicate_drug_or_biological_or_device_or_medical_supply_2        = array_get($row ,'indicate_drug_or_biological_or_device_or_medical_supply_2');
      $this->name_of_drug_or_biological_or_device_or_medical_supply_1         = array_get($row ,'name_of_drug_or_biological_or_device_or_medical_supply_1');
      $this->name_of_drug_or_biological_or_device_or_medical_supply_2         = array_get($row ,'name_of_drug_or_biological_or_device_or_medical_supply_2');
      $this->nature_of_payment_or_transfer_of_value                           = array_get($row ,'nature_of_payment_or_transfer_of_value');
      $this->number_of_payments_included_in_total_amount                      = array_get($row ,'number_of_payments_included_in_total_amount');
      $this->payment_publication_date                                         = array_get($row ,'payment_publication_date');
      $this->physician_first_name                                             = array_get($row ,'physician_first_name');
      $this->physician_last_name                                              = array_get($row ,'physician_last_name');
      $this->physician_license_state_code1                                    = array_get($row ,'physician_license_state_code1');
      $this->physician_name_suffix                                            = array_get($row ,'physician_name_suffix');
      $this->physician_ownership_indicator                                    = array_get($row ,'physician_ownership_indicator');
      $this->physician_primary_type                                           = array_get($row ,'physician_primary_type');
      $this->physician_profile_id                                             = array_get($row ,'physician_profile_id');
      $this->physician_specialty                                              = array_get($row ,'physician_specialty');
      $this->product_category_or_therapeutic_area_1                           = array_get($row ,'product_category_or_therapeutic_area_1');
      $this->product_category_or_therapeutic_area_2                           = array_get($row ,'product_category_or_therapeutic_area_2');
      $this->program_year                                                     = array_get($row ,'program_year');
      $this->recipient_city                                                   = array_get($row ,'recipient_city');
      $this->recipient_country                                                = array_get($row ,'recipient_country');
      $this->recipient_primary_business_street_address_line1                  = array_get($row ,'recipient_primary_business_street_address_line1');
      $this->recipient_state                                                  = array_get($row ,'recipient_state');
      $this->recipient_zip_code                                               = array_get($row ,'recipient_zip_code');
      $this->record_id                                                        = array_get($row ,'record_id');
      $this->related_product_indicator                                        = array_get($row ,'related_product_indicator');
      $this->submitting_applicable_manufacturer_or_applicable_gpo_name        = array_get($row ,'submitting_applicable_manufacturer_or_applicable_gpo_name');
      $this->third_party_payment_recipient_indicator                          = array_get($row ,'third_party_payment_recipient_indicator');
      $this->total_amount_of_payment_usdollars                                = array_get($row ,'total_amount_of_payment_usdollars');
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->record_id;
    }

    /**
     * If we wanted to exclude any fields from ElasticSearch we could do it here.
     *
     * @return array
     */
    public function makeBody()
    {
        return $this->toArray();
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return array(
            'applicable_manufacturer_or_applicable_gpo_making_payment_country' => $this->applicable_manufacturer_or_applicable_gpo_making_payment_country,
            'applicable_manufacturer_or_applicable_gpo_making_payment_id'      => $this->applicable_manufacturer_or_applicable_gpo_making_payment_id,
            'applicable_manufacturer_or_applicable_gpo_making_payment_name'    => $this->applicable_manufacturer_or_applicable_gpo_making_payment_name,
            'applicable_manufacturer_or_applicable_gpo_making_payment_state'   => $this->applicable_manufacturer_or_applicable_gpo_making_payment_state,
            'associated_drug_or_biological_ndc_1'                              => $this->associated_drug_or_biological_ndc_1,
            'associated_drug_or_biological_ndc_2'                              => $this->associated_drug_or_biological_ndc_2,
            'change_type'                                                      => $this->change_type,
            'charity_indicator'                                                => $this->charity_indicator,
            'covered_or_noncovered_indicator_1'                                => $this->covered_or_noncovered_indicator_1,
            'covered_or_noncovered_indicator_2'                                => $this->covered_or_noncovered_indicator_2,
            'covered_recipient_type'                                           => $this->covered_recipient_type,
            'date_of_payment'                                                  => $this->date_of_payment,
            'delay_in_publication_indicator'                                   => $this->delay_in_publication_indicator,
            'dispute_status_for_publication'                                   => $this->dispute_status_for_publication,
            'form_of_payment_or_transfer_of_value'                             => $this->form_of_payment_or_transfer_of_value,
            'indicate_drug_or_biological_or_device_or_medical_supply_1'        => $this->indicate_drug_or_biological_or_device_or_medical_supply_1,
            'indicate_drug_or_biological_or_device_or_medical_supply_2'        => $this->indicate_drug_or_biological_or_device_or_medical_supply_2,
            'name_of_drug_or_biological_or_device_or_medical_supply_1'         => $this->name_of_drug_or_biological_or_device_or_medical_supply_1,
            'name_of_drug_or_biological_or_device_or_medical_supply_2'         => $this->name_of_drug_or_biological_or_device_or_medical_supply_2,
            'nature_of_payment_or_transfer_of_value'                           => $this->nature_of_payment_or_transfer_of_value,
            'number_of_payments_included_in_total_amount'                      => $this->number_of_payments_included_in_total_amount,
            'payment_publication_date'                                         => $this->payment_publication_date,
            'physician_first_name'                                             => $this->physician_first_name ,
            'physician_last_name'                                              => $this->physician_last_name,
            'physician_license_state_code1'                                    => $this->physician_license_state_code1,
            'physician_name_suffix'                                            => $this->physician_name_suffix,
            'physician_ownership_indicator'                                    => $this->physician_ownership_indicator,
            'physician_primary_type'                                           => $this->physician_primary_type,
            'physician_profile_id'                                             => $this->physician_profile_id,
            'physician_specialty'                                              => $this->physician_specialty,
            'product_category_or_therapeutic_area_1'                           => $this->product_category_or_therapeutic_area_1,
            'product_category_or_therapeutic_area_2'                           => $this->product_category_or_therapeutic_area_2,
            'program_year'                                                     => $this->program_year,
            'recipient_city'                                                   => $this->recipient_city,
            'recipient_country'                                                => $this->recipient_country,
            'recipient_primary_business_street_address_line1'                  => $this->recipient_primary_business_street_address_line1,
            'recipient_state'                                                  => $this->recipient_state,
            'recipient_zip_code'                                               => $this->recipient_zip_code,
            'record_id'                                                        => $this->record_id,
            'related_product_indicator'                                        => $this->related_product_indicator,
            'submitting_applicable_manufacturer_or_applicable_gpo_name'        => $this->submitting_applicable_manufacturer_or_applicable_gpo_name,
            'third_party_payment_recipient_indicator'                          => $this->third_party_payment_recipient_indicator,
            'total_amount_of_payment_usdollars'                                => $this->total_amount_of_payment_usdollars,
        );
    }

    /**
     * @return array
     */
    public static function getSearchableFields()
    {
        return array(
            'applicable_manufacturer_or_applicable_gpo_making_payment_country',
            'applicable_manufacturer_or_applicable_gpo_making_payment_id',
            'applicable_manufacturer_or_applicable_gpo_making_payment_name',
            'applicable_manufacturer_or_applicable_gpo_making_payment_state',
            'associated_drug_or_biological_ndc_1',
            'associated_drug_or_biological_ndc_2',
            'change_type',
            'charity_indicator',
            'covered_or_noncovered_indicator_1',
            'covered_or_noncovered_indicator_2',
            'covered_recipient_type',
            //'date_of_payment',
            'delay_in_publication_indicator',
            'dispute_status_for_publication',
            'form_of_payment_or_transfer_of_value',
            'indicate_drug_or_biological_or_device_or_medical_supply_1',
            'indicate_drug_or_biological_or_device_or_medical_supply_2',
            'name_of_drug_or_biological_or_device_or_medical_supply_1',
            'name_of_drug_or_biological_or_device_or_medical_supply_2',
            'nature_of_payment_or_transfer_of_value',
            'number_of_payments_included_in_total_amount',
            //'payment_publication_date',
            'physician_first_name',
            'physician_last_name',
            'physician_license_state_code1',
            'physician_name_suffix',
            'physician_ownership_indicator',
            'physician_primary_type',
            'physician_profile_id',
            'physician_specialty',
            'product_category_or_therapeutic_area_1',
            'product_category_or_therapeutic_area_2',
            'program_year',
            'recipient_city',
            'recipient_country',
            'recipient_primary_business_street_address_line1',
            'recipient_state',
            'recipient_zip_code',
            'record_id',
            'related_product_indicator',
            'submitting_applicable_manufacturer_or_applicable_gpo_name',
            'third_party_payment_recipient_indicator',
            'total_amount_of_payment_usdollars',
        );
    }

    /**
     * @return array
     */
    function jsonSerialize()
    {
        return $this->toArray();
    }
}
