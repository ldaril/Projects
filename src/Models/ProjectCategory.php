<?php

namespace TypiCMS\Modules\Projects\Models;

use Laracasts\Presenter\PresentableTrait;
use Spatie\Translatable\HasTranslations;
use TypiCMS\Modules\Core\Models\Base;
use TypiCMS\Modules\History\Traits\Historable;

class ProjectCategory extends Base
{
    use HasTranslations;
    use Historable;
    use PresentableTrait;

    protected $presenter = 'TypiCMS\Modules\Projects\Presenters\CategoryPresenter';

    protected $guarded = ['id', 'exit', 'galleries'];

    public $translatable = [
        'title',
        'slug',
        'status',
    ];

    protected $appends = ['thumb'];

    public $attachments = [
        'image',
    ];

    public function projects()
    {
        return $this->hasMany(Project::class)->order();
    }

    /**
     * Append thumb attribute.
     *
     * @return string
     */
    public function getThumbAttribute()
    {
        return $this->present()->thumbSrc(null, 22);
    }

    /**
     * Get edit url of model.
     *
     * @return string|void
     */
    public function editUrl()
    {
        try {
            return route('admin::edit-project-category', [$this->id]);
        } catch (InvalidArgumentException $e) {
            Log::error($e->getMessage());
        }
    }

    /**
     * Get back office’s index of models url.
     *
     * @return string|void
     */
    public function indexUrl()
    {
        try {
            return route('admin::index-project-categories');
        } catch (InvalidArgumentException $e) {
            Log::error($e->getMessage());
        }
    }
}