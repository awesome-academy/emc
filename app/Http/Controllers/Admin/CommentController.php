<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comment;
use App\Http\Controllers\Controller;
use App\Repositories\Comment\CommentRepositoryInterface;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $commentRepo;

    public function __construct(CommentRepositoryInterface $commentRepo)
    {
        $this->commentRepo = $commentRepo;
    }

    public function index()
    {
        $paginate = config('setting.paginate');
        $comments = $this->commentRepo->paginate('id', 'DESC', $paginate);

        return view('admin.comments.index', ['comments' => $comments]);
    }

    public function changeStatus($status,$id)
    {
        try {
            $order['status'] = $status;
            $this->commentRepo->update($id, $order);
        } catch (ModelNotFoundException $ex) {
            throw new \Exception($ex->getMessage());
        }
    }

    public function changeActive($id)
    {
        $status = Comment::ACTIVE;
        $this->changeStatus($status,$id);
        return redirect()->back()->with(['activeCommentSuccess' => trans('admin.active-comment-success')]);
    }

    public function changeLock($id)
    {
        $status = Comment::LOCK;
        $this->changeStatus($status,$id);

        return redirect()->back()->with(['lockCommentSuccess' => trans('admin.lock-comment-success')]);
    }

    public function delete($id)
    {
        $this->commentRepo->delete($id);

        return redirect()->back()->with(['deleteCommentSuccess' => trans('admin.delete-comment-success')]);
    }
}
