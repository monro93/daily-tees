<?php

namespace App\Service\Filter\FilterGetter;


use App\Model\Filter;

class FilterGetterFactory
{
    /** @var FilterGetterInterface[] */
    private $filterGetters;

    public function __construct()
    {
        $this->filterGetters = [];
    }

    /**
     * @param FilterGetterInterface $filterGetter
     */
    public function addFilterGetter(FilterGetterInterface $filterGetter) : void
    {
        $this->filterGetters[$filterGetter->getFilteredClass()] = $filterGetter;
    }

    /**
     * @param string $class
     * @param array $extraInfo
     * @return Filter[]
     */
    public function getFilters(string $class, $extraInfo = []) : array
    {
        if(!array_key_exists($class, $this->filterGetters)){
            throw new \InvalidArgumentException('FilterGetter not found for class '.$class);
        }

        return $this->filterGetters[$class]->getFilters($extraInfo);
    }
}