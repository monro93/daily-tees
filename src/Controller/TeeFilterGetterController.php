<?php
/**
 * Created by PhpStorm.
 * User: albert
 * Date: 22/10/18
 * Time: 21:38
 */

namespace App\Controller;


use App\Entity\Tee;
use App\Model\Filter;
use App\Service\Filter\FilterGetter\FilterGetterFactory;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class TeeFilterGetterController
{
    /** @var FilterGetterFactory  */
    private $filterGetterFactory;

    /** @var SerializerInterface  */
    private $serializer;

    public function __construct(SerializerInterface $serializer, FilterGetterFactory $filterGetterFactory)
    {
        $this->serializer = $serializer;
        $this->filterGetterFactory = $filterGetterFactory;
    }

    /**
     * @Route(
     *     name="app_filters_tee",
     *     path="/api/filters/tee",
     *     methods={"GET"},
     * )
     * @return Filter[]
     */
    public function __invoke() : Response
    {
        $filters = $this->filterGetterFactory->getFilters(Tee::class);
        $json = $this->serializer->serialize($filters, 'json', ['filter']);
        return new Response($json);
    }
}