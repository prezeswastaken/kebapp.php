<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use App\Models\Kebab;
use App\Models\User;
use Illuminate\Container\Attributes\CurrentUser;

class CommentController extends Controller
{
    public function __construct(
        #[CurrentUser] private User $user,
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function store(Kebab $kebab, StoreCommentRequest $request)
    {
        $comment = Comment::create([
            'text' => $request->input('text'),
            'user_id' => $this->user->id,
            'kebab_id' => $kebab->id,
        ]);

        return response()->json($comment);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
