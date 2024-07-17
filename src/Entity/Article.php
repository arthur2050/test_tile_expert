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
 * Class Article
 * @package App\Entity
 *
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 *
 */
class Article
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
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    private $amount;

    /**
     * @var double
     *
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @var double|null
     *
     * @ORM\Column(type="float", nullable=true)
     */
    private $priceEur;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=3)
     */
    private $currency;

    /**
     * @var string|null
     *
     * @ORM\Column(type="string", length=2)
     */
    private $measure;

    /**
     * @var double
     *
     * @ORM\Column(type="float")
     */
    private $weight;

    /**
     * @var boolean|null
     *
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $multiplePallet;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    private $packagingCount;

    /**
     * @var int
     *
     * @ORM\Column(type="float")
     */
    private $pallet;

    /**
     * @var int
     *
     * @ORM\Column(type="float")
     */
    private $packaging;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    private $swimmingPool;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Store")
     *
     * @var Store|null
     */
    private $store;

    public function __construct()
    {
        $this->swimmingPool = 0;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     *
     * @return Article
     */
    public function setAmount(int $amount): Article
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     *
     * @return Article
     */
    public function setPrice(float $price): Article
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getPriceEur(): ?float
    {
        return $this->priceEur;
    }

    /**
     * @param float|null $priceEur
     *
     * @return Article
     */
    public function setPriceEur(?float $priceEur): Article
    {
        $this->priceEur = $priceEur;

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
     * @return Article
     */
    public function setCurrency(?string $currency): Article
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
     * @return Article
     */
    public function setMeasure(?string $measure): Article
    {
        $this->measure = $measure;

        return $this;
    }

    /**
     * @return float
     */
    public function getWeight(): float
    {
        return $this->weight;
    }

    /**
     * @param float $weight
     *
     * @return Article
     */
    public function setWeight(float $weight): Article
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getMultiplePallet(): ?bool
    {
        return $this->multiplePallet;
    }

    /**
     * @param bool|null $multiplePallet
     *
     * @return Article
     */
    public function setMultiplePallet(?bool $multiplePallet): Article
    {
        $this->multiplePallet = $multiplePallet;

        return $this;
    }

    /**
     * @return int
     */
    public function getPackagingCount(): int
    {
        return $this->packagingCount;
    }

    /**
     * @param int $packagingCount
     *
     * @return Article
     */
    public function setPackagingCount(int $packagingCount): Article
    {
        $this->packagingCount = $packagingCount;

        return $this;
    }

    /**
     * @return int
     */
    public function getPallet(): int
    {
        return $this->pallet;
    }

    /**
     * @param int $pallet
     *
     * @return Article
     */
    public function setPallet(int $pallet): Article
    {
        $this->pallet = $pallet;

        return $this;
    }

    /**
     * @return int
     */
    public function getPackaging(): int
    {
        return $this->packaging;
    }

    /**
     * @param int $packaging
     *
     * @return Article
     */
    public function setPackaging(int $packaging): Article
    {
        $this->packaging = $packaging;

        return $this;
    }

    /**
     * @return bool
     */
    public function isSwimmingPool()
    {
        return $this->swimmingPool;
    }

    /**
     * @param bool $swimmingPool
     *
     * @return Article
     */
    public function setSwimmingPool(bool $swimmingPool): Article
    {
        $this->swimmingPool = $swimmingPool;

        return $this;
    }

    /**
     * @return Store|null
     */
    public function getStore(): ?Store
    {
        return $this->store;
    }

    /**
     * @param Store|null $store
     *
     * @return Article
     */
    public function setStore(?Store $store): Article
    {
        $this->store = $store;

        return $this;
    }
}
