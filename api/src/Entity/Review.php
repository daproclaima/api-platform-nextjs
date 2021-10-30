<?php
// api/src/Entity/Review.php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;

/** A review of a book. */
#[ApiResource]
class Review
{
    /** The id of this review. */
    private ?int $id = null;

    /** The rating of this review (between 0 and 5). */
    public int $rating = 0;

    /** The body of the review. */
    public string $body = '';

    /** The author of the review. */
    public string $author = '';

    /** The date of publication of this review.*/
    public ?\DateTimeInterface $publicationDate = null;

    /** The book this review is about. */
    public ?Book $book = null;

    public function getId(): ?int
    {
        return $this->id;
    }
}
