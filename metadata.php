<?php
$sMetadataVersion = '1.1';
$aModule          = array(
    'id'          => 'fix-bic',
    'title'       => '<b>fix:</b> basket item coupons',
    'description' => 'makes coupons for particular basket items (coupons assigned to category or product) to be calculated from actual (discounted) basket item price instead of regular oxarticle price',
    'thumbnail'   => 'bestlife.png',
    'version'     => '0.1.0',
    'author'      => 'Marat Bedoev, Bestlife AG',
    'email'       => 'oxid@bestlife.ag',
    'url'         => 'http://www.bestlife.ag',
    'extend'      => array('oxvoucher' => 'fix-bic/bla_fixbic_oxvoucher')
);
