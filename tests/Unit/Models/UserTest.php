<?php

namespace Tests\Unit\Models;

use Mockery as m;
use App\Models\User;
use App\Models\Order;
use App\Models\Rating;
use App\Models\Comment;
use App\Models\SuggestProduct;
use App\Models\Message;
use Tests\ModelTestCase;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserTest extends ModelTestCase
{
    public function test_model_configuration()
    {
        $this->runConfigurationAssertions(new User() , null, [
            'full_name',
            'email',
            'password',
            'gender',
            'birthdate',
            'address',
            'phone',
            'role',
        ],[
            'password',
            'remember_token',
        ],[
            '*'
        ],[
        ],[
            'email_verified_at' => 'datetime',
            'id' => 'int'
        ]);
    }

    public function test_orders_relation()
    {
        $m = new User();
        $r = $m->orders();
        $this->assertHasManyRelation($r, $m, new Order());
    }

    public function test_ratings_relation()
    {
        $m = new User();
        $r = $m->ratings();
        $this->assertHasManyRelation($r, $m, new Rating());
    }

    public function test_comments_relation()
    {
        $m = new User();
        $r = $m->comments();
        $this->assertHasManyRelation($r, $m, new Comment());
    }

    public function test_suggest_products_relation()
    {
        $m = new User();
        $r = $m->suggest_products();
        $this->assertHasManyRelation($r, $m, new SuggestProduct());
    }

    public function test_messages_relation()
    {
        $m = new User();
        $r = $m->messages();
        $this->assertHasManyRelation($r, $m, new Message());
    }
}
