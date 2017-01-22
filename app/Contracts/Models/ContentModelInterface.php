<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 25/6/2016
 * Time: 4:42 PM
 */

namespace App\Contracts\Models;


interface ContentModelInterface extends ModelBaseInterface
{
    /**
     * Accessor for Content Image Relationship
     *
     * @return mixed
     */
    public function image();

    /**
     * Accessor for Content Admin Relationship
     *
     * @return mixed
     */
    public function admin();

    /**
     * Local scope for main post content
     *
     * @param $query
     * @return mixed
     */
    public function scopeMainPost($query);

    /**
     * Local scope for Active content
     *
     * @param $query
     * @return mixed
     */
    public function scopeActive($query);

    /**
     * Local scope for Built In Feature posts content
     *
     * @param $query
     * @return mixed
     */
    public function scopeBuiltInFeatures($query);

    /**
     * Local scope for Sample websites post content
     *
     * @param $query
     * @return mixed
     */
    public function scopeSampleWebsites($query);

}