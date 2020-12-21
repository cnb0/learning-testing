<?php
declare(strict_types=1);

namespace DomainShop\Entity;

final class Order
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $domainName;

    /**
     * @var string
     */
    private $ownerName;

    /**
     * @var string
     */
    private $ownerEmailAddress;

    /**
     * @var string
     */
    private $payInCurrency;

    /**
     * @var int
     */
    private $amount;

    /**
     * @var int
     */
    private $amountPaid;

    public function id(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getDomainName(): string
    {
        return $this->domainName;
    }

    public function setDomainName(string $domainName): void
    {
        $this->domainName = $domainName;
    }

    public function getOwnerName(): string
    {
        return $this->ownerName;
    }

    public function setOwnerName(string $ownerName): void
    {
        $this->ownerName = $ownerName;
    }

    public function getOwnerEmailAddress(): string
    {
        return $this->ownerEmailAddress;
    }

    public function setOwnerEmailAddress(string $ownerEmailAddress): void
    {
        $this->ownerEmailAddress = $ownerEmailAddress;
    }

    public function pay(int $amount): void
    {
        if ($this->amountPaid + $amount > $this->amount) {
            throw new \RuntimeException('Do not pay more than needed.');
        }

        $this->amountPaid += $amount;
    }

    public function amountOpen(): int
    {
        return $this->amount - $this->amountPaid;
    }

    public function wasPaid(): bool
    {
        return $this->amountPaid === $this->amount;
    }

    public function setWasPaid(bool $wasPaid): void
    {
        $this->wasPaid = $wasPaid;
    }

    public function getDomainNameExtension(): string
    {
        $parts = explode('.', $this->getDomainName());
        return '.' . $parts[1];
    }

    public function setPayInCurrency(string $currency): void
    {
        $this->payInCurrency = $currency;
    }

    public function getPayInCurrency(): string
    {
        return $this->payInCurrency;
    }

    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }
}
