<?php

namespace App\Service\Filter\FilterGetter;


use App\Entity\Tee;
use App\Model\Filter;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Translation\TranslatorInterface;

class TeeFilterGetter implements FilterGetterInterface
{

    const TRANSLATION_KEY_PREFIX = 'filters.tee.label.';
    /** @var TranslatorInterface  */
    private $translator;

    /** @var RouterInterface  */
    private $router;

    public function __construct(TranslatorInterface $translator, RouterInterface $router)
    {
        $this->translator = $translator;
        $this->router = $router;
    }

    /**
     * @param array $extraParameters
     * @return Filter[]
     */
    public function getFilters($extraParameters = []): array
    {
        $filters = [];

        $filters[] = new Filter(
            'name',
            $this->translator->trans(self::TRANSLATION_KEY_PREFIX.'name'),
            Filter::TYPE_INPUT
        );

        $filters[] = new Filter(
            'site',
            $this->translator->trans(self::TRANSLATION_KEY_PREFIX.'site'),
            Filter::TYPE_SELECT,
            [
                'choice_url' => $this->router->generate('api_sites_get_collection', ['groups' => ['type_ahead']]),
                'filtrable' => false,
                'label_property' => 'name',
                'value_property' => 'id',
                'default_value' => null,
            ]
        );

        $filters[] = new Filter(
            'expired',
            $this->translator->trans(self::TRANSLATION_KEY_PREFIX.'expired'),
            Filter::TYPE_CHECKBOX,
            [
                'choices' => [
                    $this->translator->trans('global.yes') => true,
                    $this->translator->trans('global.no') => false,
                ]
            ]
        );

        return $filters;
    }

    /**
     * @return string
     */
    public function getFilteredClass(): string
    {
        return Tee::class;
    }
}