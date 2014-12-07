<?php

namespace Mhor\MediaInfo\Builder;

use Mhor\MediaInfo\Type\AbstractType;
use Mhor\MediaInfo\Type\MediaInfoContainer;
use Mhor\MediaInfo\Type\TypeFactory;

class MediaInfoContainerBuilder
{
    /**
     * @var MediaInfoContainer
     */
    private $mediaInfoContainer;

    /**
     * @var TypeFactory
     */
    private $typeFactory;

    public function __construct()
    {
        $this->mediaInfoContainer = new MediaInfoContainer();
        $this->typeFactory = new TypeFactory();
    }

    /**
     * @return MediaInfoContainer
     */
    public function build()
    {
        return $this->mediaInfoContainer;
    }

    public function setVersion($version) {
        $this->mediaInfoContainer->setVersion($version);
    }
    /**
     * @param $typeName
     * @param array $attributes
     */
    public function addTrackType($typeName, array $attributes)
    {
        $trackType = $this->typeFactory->create($typeName);
        $this->addAttributes($trackType, $attributes);

        $this->mediaInfoContainer->add($trackType);
    }

    /**
     * @param AbstractType $trackType
     * @param array $attributes
     */
    public function addAttributes(AbstractType $trackType, $attributes)
    {
        $this->mediaInfoContainer;
        foreach ($attributes as $attribute => $value) {
            $trackType->set($attribute, $value);
        }
    }
} 