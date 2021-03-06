<?php

namespace PBurggraf\LicensePlate\Detector\Germany;

use PBurggraf\LicensePlate\Detector\GermanyDetector;

/**
 * @author Philip Burggraf <philip@pburggraf.de>
 */
class PlateGoe extends AbstractGermanyPlate
{
    /**
     * @var string[]
     */
    protected static $name = [
        'Landkreis Göttingen',
        'Stadt Göttingen',
        'Polizeidirektion Göttingen',
    ];

    /**
     * @var string[]
     */
    protected static $regexes = [
        '/^GÖ (?:[A-CE-OQ-Z]{2} [1-9]\d{0,3}|PD [1-9]\d?)$/',
        '/^GÖ [A-Z] [1-9]\d{0,3}$/',
        '/^GÖ PD [1-9]\d{2,3}$/',
    ];

    /**
     * @var int[]
     */
    protected static $type = [
        GermanyDetector::PLATE_TYPE_DEFAULT,
        GermanyDetector::PLATE_TYPE_DEFAULT,
        GermanyDetector::PLATE_TYPE_LOCAL_POLICE,
    ];
}
