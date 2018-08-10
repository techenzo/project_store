<?php

function presentPrice($price)
{
   
    return money_format('%i', $price / 100);
}

function setActiveCategory($category)
{
    return request()->category == $category->slug ? 'active' : '';
}

function printEcho(){
    echo ('hello');
}