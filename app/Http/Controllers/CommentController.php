<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Article;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Article $article)
    {
        $validated = $request->validate([
            'text' => 'required|string|max:200'
        ]);

        $article->comments()->create([
            'user_id' => auth()->id(),
            'text' => $validated['text'],
            'is_approved' => false
        ]);

        return redirect()->back()
            ->with('success', 'Комментарий добавлен! Отправлен на модерацию');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        if ($comment->user_id != auth()->id()) {
            abort(403, 'Вы не можете редактировать чужой комментарий.');
        }
    
        $validated = $request->validate([
            'text' => 'required|string|max:200'
        ]);

        $comment->update($validated);

        return redirect()->back()
            ->with('success', 'Комментарий обновлён!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $user = auth()->user();

        $isAuthor = $comment->user_id == $user->id;

        $isModerator = $user->role &&
                       $user->role->role == 'moderator';

        if (!$isAuthor && !$isModerator) {
            abort(403, 'У вас нет прав на удаление этого комментария.');
        }

        $comment->delete();

        return redirect()->back()
            ->with('success', 'Комментарий удалён!');
    }

    private function checkModerator()
    {
        $user = auth()->user();

        abort_unless(
            $user && $user->role && $user->role->role == 'moderator',
            403
        );
    }

    public function moderation()
    {
        $this->checkModerator();

        $comments = Comment::where('is_approved', false)
            ->with(['user', 'article'])
            ->latest()
            ->get();

        return view('comments.moderation', compact('comments'));
    }

    public function approve(Comment $comment)
    {
        $this->checkModerator();

        $comment->is_approved = true;
        $comment->save();

        return redirect()
            ->route('comment.moderation')
            ->with('success', 'Комментарий одобрен!');
    }

    public function reject(Comment $comment)
    {
        $this->checkModerator();

        $comment->delete();

        return redirect()->back()
            ->with('success', 'Комментарий отклонён!');
    }
}
