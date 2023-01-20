<?php
declare(strict_types=1);

namespace App\Models\News;

use DateTime;

class News
{

    private DateTime $creationDate;

    /**
     * @throws \Exception
     */
    function __construct(
        private int $id,
        private ?string $header = null,
        private ?string $description = null,
        ?string $creationDate = null,
        private ?string $text = null)
    {
        if($creationDate) $this->creationDate = new DateTime($creationDate);

    }

    function setId(int $id)
    {
      $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param string $creationDate
     * @throws \Exception
     */
    public function setCreationDate(string $creationDate): void
    {
        $this->creationDate = new DateTime($creationDate);
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @param string $header
     */
    public function setHeader(string $header): void
    {
        $this->header = $header;
    }

    /**
     * @param string|null $text
     */
    public function setText(?string $text): void
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getCreationDate(): string
    {
        return $this->creationDate->format('d.m.Y');
    }
    public function getCreationDateUnformatted(): DateTime
    {
        return $this->creationDate;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getHeader(): string
    {
        return $this->header;
    }

    /**
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

}
