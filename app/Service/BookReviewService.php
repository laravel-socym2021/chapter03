<?php
declare(strict_types=1);

namespace App\Service;

/**
 * Class BookReviewService
 * 書籍レビュークラス
 */
final class BookReviewService
{
    /**
     * レビュー投稿を行う
     *
     * @param string $userId
     * @param string $bookId
     * @param string $body
     */
    public function addReview(
        string $userId,
        string $bookId,
        string $body
    ) {
        // レビュー保管
    }
}
