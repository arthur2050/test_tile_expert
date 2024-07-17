<?php
/**
 * @author    Arthur Patsanovskiy <arthur2050@mail.ru>
 * @copyright Copyright (c) 2024, Darvin Digital
 * @link      https://darvindigital.ru/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Class Delivery
 * @package App\Entity
 *
 * @ORM\Entity(repositoryClass="App\Repository\DeliveryRepository")
 * @ORM\Table(indexes={@ORM\Index(name="country_idx", columns={"country"})})
 */
class Delivery
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue()
     * @ORM\Id()
     */
    private $id;

    /**
     * @var double|null
     *
     * @ORM\Column(type="float")
     */
    private $cost;

    /**
     * @var int|null
     *
     * @ORM\Column(type="smallint")
     */
    private $type;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(type="date", nullable=true)
     */
    private $timeMin;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(type="date", nullable=true)
     */
    private $timeMax;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(type="date", nullable=true)
     */
    private $timeConfirmMin;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(type="date", nullable=true)
     */
    private $timeConfirmMax;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(type="date", nullable=true)
     */
    private $timeFastPayMin;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(type="date", nullable=true)
     */
    private $timeFastPayMax;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(type="date", nullable=true)
     */
    private $oldTimeMin;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(type="date", nullable=true)
     */
    private $oldTimeMax;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=20)
     */
    private $indexD;

    /**
     * @var int|null
     *
     * @ORM\Column(type="smallint")
     */
    private $country;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $region;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=200)
     */
    private $city;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=300)
     */
    private $address;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    private $building;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=20)
     */
    private $phone;

    /**
     * @var int
     *
     * @ORM\Column(type="smallint")
     */
    private $payType;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $payDateExecution;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $offsetDate;

    /**
     * @var int|null
     *
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $offsetReason;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $proposedDate;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $shipDate;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=50)
     */
    private $trackingNumber;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=50)
     */
    private $carrierName;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string")
     */
    private $carrierContactData;


    /**
     * @var \DateTime|null
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $cancelDate;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $factData;

    /**
     * @var double|null
     *
     * @ORM\Column(type="float", nullable=true)
     */
    private $priceEuro;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer")
     */
    private $addressPayer;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $sendingDate;

    /**
     * @var int|null
     *
     * @ORM\Column(type="smallint")
     */
    private $calculateType;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $apartmentOffice;

    public function __construct()
    {
        $this->type          = 0;
        $this->calculateType = 0;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return float|null
     */
    public function getCost(): ?float
    {
        return $this->cost;
    }

    /**
     * @param float|null $cost
     *
     * @return Delivery
     */
    public function setCost(?float $cost): Delivery
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getType(): ?int
    {
        return $this->type;
    }

    /**
     * @param int|null $type
     *
     * @return Delivery
     */
    public function setType(?int $type): Delivery
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getTimeMin(): ?\DateTime
    {
        return $this->timeMin;
    }

    /**
     * @param \DateTime|null $timeMin
     *
     * @return Delivery
     */
    public function setTimeMin(?\DateTime $timeMin): Delivery
    {
        $this->timeMin = $timeMin;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getTimeMax(): ?\DateTime
    {
        return $this->timeMax;
    }

    /**
     * @param \DateTime|null $timeMax
     *
     * @return Delivery
     */
    public function setTimeMax(?\DateTime $timeMax): Delivery
    {
        $this->timeMax = $timeMax;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getTimeConfirmMin(): ?\DateTime
    {
        return $this->timeConfirmMin;
    }

    /**
     * @param \DateTime|null $timeConfirmMin
     *
     * @return Delivery
     */
    public function setTimeConfirmMin(?\DateTime $timeConfirmMin): Delivery
    {
        $this->timeConfirmMin = $timeConfirmMin;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getTimeConfirmMax(): ?\DateTime
    {
        return $this->timeConfirmMax;
    }

    /**
     * @param \DateTime|null $timeConfirmMax
     *
     * @return Delivery
     */
    public function setTimeConfirmMax(?\DateTime $timeConfirmMax): Delivery
    {
        $this->timeConfirmMax = $timeConfirmMax;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getTimeFastPayMin(): ?\DateTime
    {
        return $this->timeFastPayMin;
    }

    /**
     * @param \DateTime|null $timeFastPayMin
     *
     * @return Delivery
     */
    public function setTimeFastPayMin(?\DateTime $timeFastPayMin): Delivery
    {
        $this->timeFastPayMin = $timeFastPayMin;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getTimeFastPayMax(): ?\DateTime
    {
        return $this->timeFastPayMax;
    }

    /**
     * @param \DateTime|null $timeFastPayMax
     *
     * @return Delivery
     */
    public function setTimeFastPayMax(?\DateTime $timeFastPayMax): Delivery
    {
        $this->timeFastPayMax = $timeFastPayMax;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getOldTimeMin(): ?\DateTime
    {
        return $this->oldTimeMin;
    }

    /**
     * @param \DateTime|null $oldTimeMin
     *
     * @return Delivery
     */
    public function setOldTimeMin(?\DateTime $oldTimeMin): Delivery
    {
        $this->oldTimeMin = $oldTimeMin;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getOldTimeMax(): ?\DateTime
    {
        return $this->oldTimeMax;
    }

    /**
     * @param \DateTime|null $oldTimeMax
     *
     * @return Delivery
     */
    public function setOldTimeMax(?\DateTime $oldTimeMax): Delivery
    {
        $this->oldTimeMax = $oldTimeMax;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getIndexD(): ?string
    {
        return $this->indexD;
    }

    /**
     * @param string|null $indexD
     *
     * @return Delivery
     */
    public function setIndexD(?string $indexD): Delivery
    {
        $this->indexD = $indexD;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getCountry(): ?int
    {
        return $this->country;
    }

    /**
     * @param int|null $country
     *
     * @return Delivery
     */
    public function setCountry(?int $country): Delivery
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRegion(): ?string
    {
        return $this->region;
    }

    /**
     * @param string|null $region
     *
     * @return Delivery
     */
    public function setRegion(?string $region): Delivery
    {
        $this->region = $region;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string|null $city
     *
     * @return Delivery
     */
    public function setCity(?string $city): Delivery
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param string|null $address
     *
     * @return Delivery
     */
    public function setAddress(?string $address): Delivery
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBuilding(): ?string
    {
        return $this->building;
    }

    /**
     * @param string|null $building
     *
     * @return Delivery
     */
    public function setBuilding(?string $building): Delivery
    {
        $this->building = $building;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     *
     * @return Delivery
     */
    public function setPhone(?string $phone): Delivery
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return int
     */
    public function getPayType(): int
    {
        return $this->payType;
    }

    /**
     * @param int $payType
     *
     * @return Delivery
     */
    public function setPayType(int $payType): Delivery
    {
        $this->payType = $payType;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getPayDateExecution(): ?\DateTime
    {
        return $this->payDateExecution;
    }

    /**
     * @param \DateTime|null $payDateExecution
     *
     * @return Delivery
     */
    public function setPayDateExecution(?\DateTime $payDateExecution): Delivery
    {
        $this->payDateExecution = $payDateExecution;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getOffsetDate(): ?\DateTime
    {
        return $this->offsetDate;
    }

    /**
     * @param \DateTime|null $offsetDate
     *
     * @return Delivery
     */
    public function setOffsetDate(?\DateTime $offsetDate): Delivery
    {
        $this->offsetDate = $offsetDate;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getOffsetReason(): ?int
    {
        return $this->offsetReason;
    }

    /**
     * @param int|null $offsetReason
     *
     * @return Delivery
     */
    public function setOffsetReason(?int $offsetReason): Delivery
    {
        $this->offsetReason = $offsetReason;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getProposedDate(): ?\DateTime
    {
        return $this->proposedDate;
    }

    /**
     * @param \DateTime|null $proposedDate
     *
     * @return Delivery
     */
    public function setProposedDate(?\DateTime $proposedDate): Delivery
    {
        $this->proposedDate = $proposedDate;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getShipDate(): ?\DateTime
    {
        return $this->shipDate;
    }

    /**
     * @param \DateTime|null $shipDate
     *
     * @return Delivery
     */
    public function setShipDate(?\DateTime $shipDate): Delivery
    {
        $this->shipDate = $shipDate;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTrackingNumber(): ?string
    {
        return $this->trackingNumber;
    }

    /**
     * @param string|null $trackingNumber
     *
     * @return Delivery
     */
    public function setTrackingNumber(?string $trackingNumber): Delivery
    {
        $this->trackingNumber = $trackingNumber;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCarrierName(): ?string
    {
        return $this->carrierName;
    }

    /**
     * @param string|null $carrierName
     *
     * @return Delivery
     */
    public function setCarrierName(?string $carrierName): Delivery
    {
        $this->carrierName = $carrierName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCarrierContactData(): ?string
    {
        return $this->carrierContactData;
    }

    /**
     * @param string|null $carrierContactData
     *
     * @return Delivery
     */
    public function setCarrierContactData(?string $carrierContactData): Delivery
    {
        $this->carrierContactData = $carrierContactData;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getCancelDate(): ?\DateTime
    {
        return $this->cancelDate;
    }

    /**
     * @param \DateTime|null $cancelDate
     *
     * @return Delivery
     */
    public function setCancelDate(?\DateTime $cancelDate): Delivery
    {
        $this->cancelDate = $cancelDate;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getFactData(): ?\DateTime
    {
        return $this->factData;
    }

    /**
     * @param \DateTime|null $factData
     *
     * @return Delivery
     */
    public function setFactData(?\DateTime $factData): Delivery
    {
        $this->factData = $factData;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getPriceEuro(): ?float
    {
        return $this->priceEuro;
    }

    /**
     * @param float|null $priceEuro
     *
     * @return Delivery
     */
    public function setPriceEuro(?float $priceEuro): Delivery
    {
        $this->priceEuro = $priceEuro;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getAddressPayer(): ?int
    {
        return $this->addressPayer;
    }

    /**
     * @param int|null $addressPayer
     *
     * @return Delivery
     */
    public function setAddressPayer(?int $addressPayer): Delivery
    {
        $this->addressPayer = $addressPayer;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getSendingDate(): ?\DateTime
    {
        return $this->sendingDate;
    }

    /**
     * @param \DateTime|null $sendingDate
     *
     * @return Delivery
     */
    public function setSendingDate(?\DateTime $sendingDate): Delivery
    {
        $this->sendingDate = $sendingDate;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getCalculateType(): ?int
    {
        return $this->calculateType;
    }

    /**
     * @param int|null $calculateType
     *
     * @return Delivery
     */
    public function setCalculateType(?int $calculateType): Delivery
    {
        $this->calculateType = $calculateType;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getApartmentOffice(): ?string
    {
        return $this->apartmentOffice;
    }

    /**
     * @param string|null $apartmentOffice
     *
     * @return Delivery
     */
    public function setApartmentOffice(?string $apartmentOffice): Delivery
    {
        $this->apartmentOffice = $apartmentOffice;

        return $this;
    }
}
