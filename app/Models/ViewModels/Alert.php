<?php
declare(strict_types=1);

namespace App\Models\ViewModels;

class Alert
{
    public function __construct(
        private string $type,
        private string $title,
        private string $text
    )
    {
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
}
