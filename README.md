# fix-bic
makes coupons for particular basket items (coupons assigned to category or product) to be calculated from actual (discounted) basket item price instead of regular oxarticle price

## bug 6657:
https://bugs.oxid-esales.com/view.php?id=6657

category and product coupons take product's original price for calculating discount value instead of getting the actual basketitem price, which could be alredy reduced.
You get the biggest side effect when combining discounts and coupons at same time, e.g. you offer 33% discount for a product "buy 3, pay 2" and also 10% for particular products or categories. When bots discount and coupon are valid for the product in your basket, both discount and coupon values are calculated with the original undiscounted price.

### how to reproduce:
1) product X costs 300€
2) create 100 € discount for product X
3) create 10% coupon test666
4) add X to basket
5) you see: product X - 200€ (_instead of 300€_)
6) enter coupon code test666
7) coupon value is calculated based on 200€ price -> 20€
8) assign product x or its category to the coupon series
9) recalculate basket
10) coupon discoutn value is calculated based on product's original price 300€ -> 30€

## installation
    $ cd modules
    $ git clone https://github.com/vanilla-thunder/fix-bic.git
