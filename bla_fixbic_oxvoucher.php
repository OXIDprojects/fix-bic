<?php
class bla_fixbic_oxvoucher extends bla_fixbic_oxvoucher_parent
{
    protected function _getSessionBasketItems($oDiscount = null)
    {
        if (is_null($oDiscount)) {
            $oDiscount = $this->_getSerieDiscount();
        }

        $oBasket = $this->getSession()->getBasket();
        $aItems = array();
        $iCount = 0;

        foreach ($oBasket->getContents() as $oBasketItem) {
            if (!$oBasketItem->isDiscountArticle() && ($oArticle = $oBasketItem->getArticle()) && !$oArticle->skipDiscounts() && $oDiscount->isForBasketItem($oArticle)) {

                $aItems[$iCount] = array(
                    'oxid'     => $oArticle->getId(),
                    //'price'    => $oArticle->getBasketPrice($oBasketItem->getAmount(), $oBasketItem->getSelList(), $oBasket)->getPrice(),
                    'price'    => $oBasketItem->getUnitPrice()->getPrice(),
                    //'discount' => $oDiscount->getAbsValue($oArticle->getBasketPrice($oBasketItem->getAmount(), $oBasketItem->getSelList(), $oBasket)->getPrice()),
                    'discount' => $oDiscount->getAbsValue($oBasketItem->getUnitPrice()->getPrice()),
                    'amount'   => $oBasketItem->getAmount(),
                );

                $iCount++;
            }
        }

        return $aItems;
    }
}