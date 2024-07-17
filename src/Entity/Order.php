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


use App\Entity\Traits\CreatedAtTrait;
use App\Entity\Traits\UpdateAtTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Order
 * @package App\Entity
 *
 * @ORM\Entity(repositoryClass="App\Repository\OrderRepository")
 * @ORM\Table(
 *     name="order_",
 *     indexes={
 *          @ORM\Index(name="crated_at_idx", columns={"created_at"}),
 *          @ORM\Index(name="created_at_status_idx", columns={"created_at", "status"})
 *     })
 */
class Order
{
    use CreatedAtTrait;
    use UpdateAtTrait;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue()
     * @ORM\Id()
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=20, unique=true)
     */
    private $hash;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     *
     * @var User|null
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=20)
     */
    private $token;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $number;

    /**
     * @var int
     *
     * @ORM\Column(type="smallint")
     */
    private $status;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $email;

    /**
     * @var int|null
     *
     * @ORM\Column(type="smallint")
     */
    private $vatType;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $vatNumber;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $taxNumber;

    /**
     * @var int|null
     *
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $discount;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Delivery")
     *
     * @var Delivery|null
     */
    private $delivery;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=5)
     */
    private $locale;

    /**
     * @var double
     *
     * @ORM\Column(type="float", nullable=false)
     */
    private $curRate;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=3)
     */
    private $currency;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=3)
     */
    private $measure;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=200)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

//    /**
//     * @ORM\OneToOne(targetEntity="App\Entity\Store")
//     *
//     * @var Store|null
//     */
//    private $store;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $step;

    /**
     * @var boolean|null
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $addressEqual;

    /**
     * @var boolean|null
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $bankTransferRequested;

    /**
     * @var boolean|null
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $acceptPay;

    /**
     * @var double
     *
     * @ORM\Column(type="float", nullable=true)
     */
    private $weightGross;

    /**
     * @var boolean|null
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $productReview;

    /**
     * @var int|null
     *
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $mirror;

    /**
     * @var boolean|null
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $process;

    /**
     * @var int|null
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $entranceReview;

    /**
     * @var boolean|null
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $paymentEuro;

    /**
     * @var boolean|null
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $specPrice;

    /**
     * @var boolean|null
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $showMsg;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(type="date", nullable=true)
     */
    private $fullPaymentDate;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\BankDetails")
     *
     * @var BankDetails|null
     */
    private $bankDetails;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Article")
     * @ORM\JoinTable(
     *     name="order_article",
     *     joinColumns={@ORM\JoinColumn(name="order_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="article_id", referencedColumnName="id", unique=true)}
     * )
     * @var Article[]|ArrayCollection
     */
    private $articles;

    public function __construct()
    {
        $this->status   = 1;
        $this->vatType  = 0;
        $this->curRate  = 1;
        $this->currency = 'EUR';
        $this->measure  = 'm';
        $this->step     = 1;
        $this->addressEqual = 1;
        $this->paymentEuro = 0;

        $this->articles = new ArrayCollection();
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getHash(): string
    {
        return $this->hash;
    }

    /**
     * @param string $hash
     *
     * @return Order
     */
    public function setHash(string $hash): Order
    {
        $this->hash = $hash;

        return $this;
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User|null $user
     *
     * @return Order
     */
    public function setUser(?User $user): Order
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @param string $token
     *
     * @return Order
     */
    public function setToken(string $token): Order
    {
        $this->token = $token;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getNumber(): ?int
    {
        return $this->number;
    }

    /**
     * @param int|null $number
     *
     * @return Order
     */
    public function setNumber(?int $number): Order
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     *
     * @return Order
     */
    public function setStatus(int $status): Order
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     *
     * @return Order
     */
    public function setEmail(?string $email): Order
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getVatType(): ?int
    {
        return $this->vatType;
    }

    /**
     * @param int|null $vatType
     *
     * @return Order
     */
    public function setVatType(?int $vatType): Order
    {
        $this->vatType = $vatType;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getVatNumber(): ?string
    {
        return $this->vatNumber;
    }

    /**
     * @param string|null $vatNumber
     *
     * @return Order
     */
    public function setVatNumber(?string $vatNumber): Order
    {
        $this->vatNumber = $vatNumber;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTaxNumber(): ?string
    {
        return $this->taxNumber;
    }

    /**
     * @param string|null $taxNumber
     *
     * @return Order
     */
    public function setTaxNumber(?string $taxNumber): Order
    {
        $this->taxNumber = $taxNumber;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getDiscount(): ?int
    {
        return $this->discount;
    }

    /**
     * @param int|null $discount
     *
     * @return Order
     */
    public function setDiscount(?int $discount): Order
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * @return string
     */
    public function getLocale(): string
    {
        return $this->locale;
    }

    /**
     * @param string $locale
     *
     * @return Order
     */
    public function setLocale(string $locale): Order
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * @return float
     */
    public function getCurRate()
    {
        return $this->curRate;
    }

    /**
     * @param float $curRate
     *
     * @return Order
     */
    public function setCurRate(float $curRate): Order
    {
        $this->curRate = $curRate;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * @param string|null $currency
     *
     * @return Order
     */
    public function setCurrency(?string $currency): Order
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMeasure(): ?string
    {
        return $this->measure;
    }

    /**
     * @param string|null $measure
     *
     * @return Order
     */
    public function setMeasure(?string $measure): Order
    {
        $this->measure = $measure;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Order
     */
    public function setName(string $name): Order
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     *
     * @return Order
     */
    public function setDescription(?string $description): Order
    {
        $this->description = $description;

        return $this;
    }

//    /**
//     * @return Store|null
//     */
//    public function getStore(): ?Store
//    {
//        return $this->store;
//    }
//
//    /**
//     * @param Store|null $store
//     *
//     * @return Order
//     */
//    public function setStore(?Store $store): Order
//    {
//        $this->store = $store;
//
//        return $this;
//    }

    /**
     * @return bool
     */
    public function isStep()
    {
        return $this->step;
    }

    /**
     * @param bool $step
     *
     * @return Order
     */
    public function setStep(bool $step): Order
    {
        $this->step = $step;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getAddressEqual()
    {
        return $this->addressEqual;
    }

    /**
     * @param bool|null $addressEqual
     *
     * @return Order
     */
    public function setAddressEqual(?bool $addressEqual): Order
    {
        $this->addressEqual = $addressEqual;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getBankTransferRequested(): ?bool
    {
        return $this->bankTransferRequested;
    }

    /**
     * @param bool|null $bankTransferRequested
     */
    public function setBankTransferRequested(?bool $bankTransferRequested): Order
    {
        $this->bankTransferRequested = $bankTransferRequested;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getAcceptPay(): ?bool
    {
        return $this->acceptPay;
    }

    /**
     * @param bool|null $acceptPay
     *
     * @return Order
     */
    public function setAcceptPay(?bool $acceptPay): Order
    {
        $this->acceptPay = $acceptPay;

        return $this;
    }

    /**
     * @return float
     */
    public function getWeightGross(): float
    {
        return $this->weightGross;
    }

    /**
     * @param float $weightGross
     *
     * @return Order
     */
    public function setWeightGross(float $weightGross): Order
    {
        $this->weightGross = $weightGross;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getProductReview(): ?bool
    {
        return $this->productReview;
    }

    /**
     * @param bool|null $productReview
     *
     * @return Order
     */
    public function setProductReview(?bool $productReview): Order
    {
        $this->productReview = $productReview;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getMirror(): ?int
    {
        return $this->mirror;
    }

    /**
     * @param int|null $mirror
     *
     * @return Order
     */
    public function setMirror(?int $mirror): Order
    {
        $this->mirror = $mirror;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getProcess(): ?bool
    {
        return $this->process;
    }

    /**
     * @param bool|null $process
     *
     * @return Order
     */
    public function setProcess(?bool $process): Order
    {
        $this->process = $process;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getEntranceReview(): ?int
    {
        return $this->entranceReview;
    }

    /**
     * @param int|null $entranceReview
     *
     * @return Order
     */
    public function setEntranceReview(?int $entranceReview): Order
    {
        $this->entranceReview = $entranceReview;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getPaymentEuro()
    {
        return $this->paymentEuro;
    }

    /**
     * @param bool|null $paymentEuro
     *
     * @return Order
     */
    public function setPaymentEuro(?bool $paymentEuro): Order
    {
        $this->paymentEuro = $paymentEuro;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getSpecPrice(): ?bool
    {
        return $this->specPrice;
    }

    /**
     * @param bool|null $specPrice
     *
     * @return Order
     */
    public function setSpecPrice(?bool $specPrice): Order
    {
        $this->specPrice = $specPrice;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getShowMsg(): ?bool
    {
        return $this->showMsg;
    }

    /**
     * @param bool|null $showMsg
     *
     * @return Order
     */
    public function setShowMsg(?bool $showMsg): Order
    {
        $this->showMsg = $showMsg;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getFullPaymentDate(): ?\DateTime
    {
        return $this->fullPaymentDate;
    }

    /**
     * @param \DateTime|null $fullPaymentDate
     *
     * @return Order
     */
    public function setFullPaymentDate(?\DateTime $fullPaymentDate): Order
    {
        $this->fullPaymentDate = $fullPaymentDate;

        return $this;
    }

    /**
     * @return BankDetails|null
     */
    public function getBankDetails(): ?BankDetails
    {
        return $this->bankDetails;
    }

    /**
     * @param BankDetails|null $bankDetails
     *
     * @return Order
     */
    public function setBankDetails(?BankDetails $bankDetails): Order
    {
        $this->bankDetails = $bankDetails;

        return $this;
    }

    /**
     * @return Delivery|null
     */
    public function getDelivery(): ?Delivery
    {
        return $this->delivery;
    }

    /**
     * @param Delivery|null $delivery
     *
     * @return Order
     */
    public function setDelivery(?Delivery $delivery): Order
    {
        $this->delivery = $delivery;

        return $this;
    }

    /**
     * @return Article[]|ArrayCollection
     */
    public function getArticles()
    {
        return $this->articles;
    }

    /**
     * @param Article[]|ArrayCollection $articles
     *
     * @return Order
     */
    public function setArticles($articles): Order
    {
        $this->articles = $articles;

        return $this;
    }

    public function addArticle(Article $article): Order
    {
        if (!$this->articles->contains($article)){
            $this->articles->add($article);
        }

        return $this;
    }

    public function removeArticle(Article $article): Order
    {
        if ($this->articles->contains($article)){
            $this->articles->removeElement($article);
        }

        return $this;
    }
}
