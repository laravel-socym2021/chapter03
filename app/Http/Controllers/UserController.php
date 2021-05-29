<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\User;
use App\Purchase;
use App\Service\UserService;
use App\Service\BookReviewService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

final class UserController extends Controller
{
    /** @var UserService */
    private $userService;

    /** @var BookReviewService */
    private $bookReviewService;

    /**
     * ①
     * UserController constructor.
     *
     * @param UserService       $userService
     * @param BookReviewService $bookReviewService
     */
    public function __construct(
        UserService $userService,
        BookReviewService $bookReviewService
    ) {
        $this->userService = $userService;
        $this->bookReviewService = $bookReviewService;
    }

    /**
     * @param Request $request
     *
     * @return View
     */
    public function index(Request $request): View
    {
        return view('user.index', [
            'user' => $this->userService->retrieveUser($request->get('id', '1'))
        ]);
        /*
        ビジネスロジックに基づいたデータベース操作をコントローラで行う場合
        $user = User::find(1);
        $purchase =Purchase::findAllBy($user->id);
        // 様々な処理が続く..
        */
    }

    /**
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $this->userService->activate(
            $request->get('user_id'),
            $request->get('user_name')
        );
        // ②
        $this->bookReviewService->addReview(
            $request->get('user_id'),
            $request->get('book_id'),
            $request->get('review')
        );
        // レスポンス返却の処理
        return redirect('/users');
    }
}
