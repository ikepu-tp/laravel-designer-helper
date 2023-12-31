<?php

namespace ikepu_tp\DesignerHelper\app\Models;

use Carbon\Carbon;
use ikepu_tp\DesignerHelper\database\factories\FormFactory;

/**
 * @property int $id
 * @property string $name
 * @property int $screen_id
 * @property string $note
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 *
 * @property-read Screen $screen
 * @property-read Form_element[] $formElements
 */
class Form extends BaseModel
{
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'screen_id' => 'integer',
        'note' => 'string',
        "created_at" => "datetime",
        "updated_at" => "datetime",
        "deleted_at" => "datetime",
    ];

    protected static $factoryModel = FormFactory::class;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo|Screen
     */
    public function screen()
    {
        return $this->belongsTo(Screen::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Project>|Project
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Form_element>|Form_element[]
     */
    public function formElements()
    {
        return $this->hasMany(Form_element::class);
    }
}