<?php
/**
 * @author Ben Sarmiento <me@bensarmiento.com>
 */

namespace Beebeelee\PayMaya\Domain\ValueObject;

use Assert\Assertion;

final class OrderId
{
    /**
     * @var int
     */
    private $id;

    /**
     * @param int $id
     */
    private function __construct(int $id)
    {
        Assertion::integer($id);

        $this->id = $id;
    }

    /**
     * @param int $int
     * @return self
     */
    public static function fromInt(int $int): self
    {
        Assertion::integer($int);

        return new self($int);
    }

    /**
     * @return int
     */
    public function toInt(): int
    {
        return $this->id;
    }
}
