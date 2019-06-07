<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\{
    TopicRepository,
    UserRepository
};

use App\Repositories\Eloquent\Criteria\{
    ByUser,
    IsLive,
    LatestFirst,
    EagerLoad
};

use App\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    protected $topics;

    protected $users;

    public function __construct(TopicRepository $topics, UserRepository $users)
    {
        $this->topics = $topics;
        $this->users = $users;
    }

    public function index()
    {
        $topics = $this->topics->withCriteria([
            new LatestFirst(),
            new IsLive(),
            new ByUser(auth()->id()),
            new EagerLoad(['posts', 'posts.user'])
        ])->all();

        return view('topics.index', compact('topics'));
    }

    public function show($slug)
    {
        $topic = $this->topics->withCriteria(new IsLive(), new EagerLoad(['posts.user']))->findBySlug($slug);

        return view('topics.show', compact('topic'));
    }
}
