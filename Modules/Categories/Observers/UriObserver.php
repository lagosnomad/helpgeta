<?php

namespace Modules\Categories\Observers;

use Modules\Categories\Entities\Category;

class UriObserver
{
    /**
     * On create, update uri.
     *
     * @param Category $model
     *
     * @return void
     */
    /*public function creating(Category $model)
    {
        $model->uri = $this->incrementWhileExists($model, $model->slug);
    }*/

    /**
     * On update, change uri.
     *
     * @param Category $model
     *
     * @return void
     */
    public function saving(Category $model)
    {
        $parentUri = $this->getParentUri($model);

        if ($parentUri) {
            $uri = $parentUri;
            if ($model->slug) {
                $uri .= '/'.$model->slug;
            }
        } else {
            $uri = $model->slug;
        }

        $model->uri = $this->incrementWhileExists($model, $uri, $model->id);
    }

    /**
     * Get parent page’s URI.
     *
     * @param Category $model
     *
     * @return string
     */
    private function getParentUri(Category $model)
    {
        if ($parentCategory = $model->parent) {
            return $parentCategory->uri;
        }

        return;
    }

    /**
     * Check if uri exists.
     *
     * @param Category $model
     * @param string          $uri
     * @param int             $id
     *
     * @return bool
     */
    private function uriExists(Category $model, $uri, $id)
    {
        $query = $model->where('uri', $uri);
        if ($id) {
            $query->where('id', '!=', $id);
        }

        if ($query->first()) {
            return true;
        }

        return false;
    }

    /**
     * Add '-x' on uri if it exists in page_translations table.
     *
     * @param Category $model
     * @param string          $uri
     * @param int             $id
     *
     * @return string|null
     */
    private function incrementWhileExists(Category $model, $uri, $id = null)
    {
        if (!$uri) {
            return;
        }

        $originalUri = $uri;

        $i = 0;
        // Check if uri is unique
        while ($this->uriExists($model, $uri, $id)) {
            $i++;
            // increment uri if it exists
            $uri = $originalUri.'-'.$i;
        }

        return $uri;
    }
}
