<?php

namespace App\Service\Filter\FilterGetter;


use App\Model\Filter;

interface FilterGetterInterface
{
    /**
     * @param array $extraParameters
     * @return Filter[]
     */
    public function getFilters($extraParameters = []) : array;

    public function getFilteredClass() : string;
}