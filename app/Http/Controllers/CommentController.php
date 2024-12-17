<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, $bookId)
    {
        $request->validate([
            'comment' => 'required|string|max:500',
        ]);

        Comment::create([
            'user_id' => auth()->id(),
            'book_id' => $bookId,
            'content' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'نظر شما ثبت شد!');
    }

    public function pendingComments()
    {
        $comments = Comment::where('is_approved', false)->get();
        return view('admin.check-comments', compact('comments'));
    }

    public function approve($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->is_approved = true;
        $comment->save();

        return redirect()->back()->with('success', 'نظر تأیید شد.');
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->back()->with('success', 'نظر حذف شد.');
    }
}
