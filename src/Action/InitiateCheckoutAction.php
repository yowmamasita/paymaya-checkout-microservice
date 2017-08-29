<?php
/**
 * @author Ben Sarmiento <me@bensarmiento.com>
 */

namespace Beebeelee\PayMaya\Action;

use Beebeelee\PayMaya\Domain\ValueObject\OrderId;
use Beebeelee\PayMaya\Service\OrderQueryService;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use League\Fractal\Manager;
use PayMaya\API\Checkout;
use PayMaya\Model\Checkout\Buyer;
use PayMaya\Model\Checkout\Item;
use PayMaya\Model\Checkout\ItemAmount;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Ramsey\Uuid\Uuid;
use Zend\Diactoros\Response\EmptyResponse;

final class InitiateCheckoutAction implements MiddlewareInterface
{
    /**
     * @var OrderQueryService
     */
    private $orderService;

    /**
     * @var Manager
     */
    private $manager;

    public function __construct()
    {
        $this->manager = new Manager();
    }

    public function process(ServerRequestInterface $request, DelegateInterface $delegate): ResponseInterface
    {
        $body = json_decode($request->getBody()->getContents(), true);

        $orderId = OrderId::fromInt($body['order_id']);

        $this->orderService->getOrder($orderId);

        // assume we got the $order from the line above
        $order = [];

        $itemCheckout = new Checkout();

        $buyer = new Buyer();
        $buyer->firstName = '';
        $buyer->lastName = '';

        $itemAmount = new ItemAmount();
        $itemAmount->currency = "PHP";
        $itemAmount->value = "69.00";

        $item = new Item();
        $item->name = "Leather Belt";
        $item->code = "pm_belt";
        $item->description = "Medium-sized belt made from authentic leather";
        $item->quantity = "1";
        $item->amount = $itemAmount;
        $item->totalAmount = $itemAmount;

        $itemCheckout->items = array($item);
        $itemCheckout->totalAmount = $itemAmount;
        $itemCheckout->requestReferenceNumber = (string)Uuid::uuid4();
        $itemCheckout->redirectUrl = array(
            'success' => 'https://shop.com/success',
            'failure' => 'https://shop.com/failure',
            'cancel' => 'https://shop.com/cancel'
        );

        return new EmptyResponse();
    }
}
