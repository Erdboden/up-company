<?php

/**
 * Resolve conflict between EloquentTrait, HasTranslations for get/setAttribute methods
 * @var [type]
 */

namespace App\Traits\Models;

use Codesleeve\Stapler\ORM\EloquentTrait;
use Terranet\Translatable\HasTranslations;

trait ConflictTrait
{
    use EloquentTrait, HasTranslations {
        HasTranslations::getAttribute as getTranslatedAttribute;
        HasTranslations::setAttribute as setTranslatedAttribute;
        EloquentTrait::getAttribute as getStaplerableAttribute;
        EloquentTrait::setAttribute as setStaplerableAttribute;
    }

    function getAttribute($key)
    {
        if ($this->isKeyReturningTranslationText($key)) {
            return $this->getTranslatedAttribute($key);
        } else {
            if (array_key_exists($key, $this->attachedFiles)) {
                return $this->getStaplerableAttribute($key);
            }
        }
        return parent::getAttribute($key);
    }

    function setAttribute($key, $value)
    {
        if ($this->hasTranslatedAttributes() && in_array($key, $this->translatedAttributes)) {
            return $this->setTranslatedAttribute($key, $value);
        } else {
            if (array_key_exists($key, $this->attachedFiles)) {
                return $this->setStaplerableAttribute($key, $value);
            }
        }
        return parent::setAttribute($key, $value);
    }
}
