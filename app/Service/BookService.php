<?php

declare(strict_types=1);

namespace App\Service;

use App\User;
use App\Book;
use App\Purchase;

/**
 * Class BookService
 * トランザクションスクリプトパターン
 */
class BookService
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function order(array $books = [])
    {
        $purchases = [];
        /** @var \App\DataTransfer\Book $book */
        foreach ($books as $book) {
            // ②
            if (!$result = Book::find($book->getId())) {
                throw new \App\Exceptions\BookStockException('在庫エラー');
            }
            $purchases[] = $result;
        }
        // ③
        foreach ($purchases as $purchase) {
            Purchase::create(
                [
                    'book_id' => $purchase->id,
                    'user_id' => $this->user->id,
                ]
            );
        }
        // ④
        // ポイント加算
        // 決済完了メール送信
    }
}
