<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Page extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = ["page", "template-section"];

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function override()
    {
        return [
            "title" => get_the_title(),
            "children" => $this->children(),
            "siblings" => $this->siblings(),
            "parent" => $this->parent(),
        ];
    }

    public function children()
    {
        global $post;
        return get_posts([
            "post_type" => "page",
            "post_parent" => $post->ID,
            "orderby" => "menu_order",
            "order" => "ASC",
            "numberposts" => -1,
        ]);
    }

    public function siblings()
    {
        global $post;
        if (!$post->post_parent) {
            return null;
        }

        return get_posts([
            "post_type" => "page",
            "post_parent" => $post->post_parent,
            "orderby" => "menu_order",
            "order" => "ASC",
            "numberposts" => -1,
        ]);
    }

    public function parent()
    {
        global $post;

        if (
            !$post->post_parent ||
            get_post_status($post->post_parent) == "private"
        ) {
            return null;
        }

        $parent = new \stdClass();
        $parent->title = get_the_title($post->post_parent);
        $parent->permalink = get_permalink($post->post_parent);
        return $parent;
    }
}
