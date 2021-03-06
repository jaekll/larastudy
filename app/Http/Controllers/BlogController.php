<?php

namespace App\Http\Controllers;

use App\Jobs\BlogIndexData;
use App\Http\Requests;
use App\Models\Post;
use App\Models\Tag;
use App\Services\RssFeed;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $tag = $request->get('tag');
        $data = $this->dispatch(new BlogIndexData($tag));
        $layout = $tag ? Tag::layout($tag) : 'blog.layouts.index';

        return view($layout, $data);
    }

    public function showPost($slug, Request $request)
    {
        $post = Post::with('tags')->whereSlug($slug)->firstOrFail();
        $tag = $request->get('tag');
        if ($tag) {
            $tag = Tag::whereTag($tag)->firstOrFail();
        }

        return view($post->layout, compact('post', 'tag'));
    }

    public function rss(RssFeed $feed)
    {
        $rss = $feed->getRSS();
        return response($rss)->header('Content-type','application/rss+xml');
    }
}