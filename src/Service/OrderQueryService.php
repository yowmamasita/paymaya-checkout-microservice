<?php
/**
 * @author Ben Sarmiento <me@bensarmiento.com>
 */

namespace Beebeelee\PayMaya\Service;

use Beebeelee\PayMaya\Domain\ValueObject\OrderId;

final class OrderQueryService
{
    /**
     * Fetch order details from Magento
     *
     * @param OrderId $id
     */
    public function getOrder(OrderId $id)
    {
        // TODO: Implement getOrder
    }
}
