<?php

namespace ikepu_tp\DesignerHelper\app\Models;

use Carbon\Carbon;
use ikepu_tp\DesignerHelper\database\factories\Form_element_attrFactory;

/**
 * @property int $id
 * @property int $form_element_id
 * @property string $placeholder
 * @property string $default_value
 * @property boolean $attr_required
 * @property string $attr_min
 * @property string $attr_max
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 *
 * @property-read Form_element $formElement
 */
class Form_element_attr extends BaseModel
{
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'form_element_id' => 'integer',
        'placeholder' => 'string',
        'default_value' => 'string',
        'attr_required' => 'boolean',
        'attr_min' => 'string',
        'attr_max' => 'string',
        "created_at" => "datetime",
        "updated_at" => "datetime",
        "deleted_at" => "datetime",
    ];

    protected static $factoryModel = Form_element_attrFactory::class;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|Form_element
     */
    public function formElement()
    {
        return $this->belongsTo(Form_element::class);
    }
}