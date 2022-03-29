<?php

namespace Tests\Unit;

use App\Models\Comment;
use Tests\TestCase;

class MorphToTest extends TestCase
{
    public function testMorphToWithNull()
    {
        // Create a comment that has "commentable_type" null.
        // If the relationship wasn't null and had a value in "commentable_type" it would work.
        /** @var Comment $comment */
        $comment = Comment::factory()->create();

        $this->assertInstanceOf(Comment::class, $comment);

        // Will throw error Illuminate\Database\QueryException : SQLSTATE[42S22]: Column not found: 1054 Unknown column 'comments.' in 'where clause' (SQL: select * from `comments` where `comments`.`` is null limit 1)
        $comment->commentable()->first();
    }
}
