<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class Home extends Controller
{
   public function index()
    {
        $category = collect([
            ['name' => 'Alice', 'email' => 'alice@example.com', 'contact' => '123-456-7890'],
            ['name' => 'Bob', 'email' => 'bob@example.com', 'contact' => '234-567-8901'],
            ['name' => 'Charlie', 'email' => 'charlie@example.com', 'contact' => '345-678-9012'],
            ['name' => 'David', 'email' => 'david@example.com', 'contact' => '456-789-0123'],
            ['name' => 'Eve', 'email' => 'eve@example.com', 'contact' => '567-890-1234'],
            ['name' => 'Frank', 'email' => 'frank@example.com', 'contact' => '678-901-2345'],
            ['name' => 'Grace', 'email' => 'grace@example.com', 'contact' => '789-012-3456'],
            ['name' => 'Hannah', 'email' => 'hannah@example.com', 'contact' => '890-123-4567'],
            ['name' => 'Ivy', 'email' => 'ivy@example.com', 'contact' => '901-234-5678'],
            ['name' => 'Jack', 'email' => 'jack@example.com', 'contact' => '012-345-6789'],
            ['name' => 'Kara', 'email' => 'kara@example.com', 'contact' => '123-567-8901'],
            ['name' => 'Leo', 'email' => 'leo@example.com', 'contact' => '234-678-9012'],
            ['name' => 'Mona', 'email' => 'mona@example.com', 'contact' => '345-789-0123'],
            ['name' => 'Nina', 'email' => 'nina@example.com', 'contact' => '456-890-1234'],
            ['name' => 'Oscar', 'email' => 'oscar@example.com', 'contact' => '567-901-2345'],
            ['name' => 'Paul', 'email' => 'paul@example.com', 'contact' => '678-012-3456'],
            ['name' => 'Quincy', 'email' => 'quincy@example.com', 'contact' => '789-123-4567'],
            ['name' => 'Rachel', 'email' => 'rachel@example.com', 'contact' => '890-234-5678'],
            ['name' => 'Sam', 'email' => 'sam@example.com', 'contact' => '901-345-6789'],
            ['name' => 'Tina', 'email' => 'tina@example.com', 'contact' => '012-456-7890'],
            ['name' => 'Uma', 'email' => 'uma@example.com', 'contact' => '123-678-9012'],
            ['name' => 'Vince', 'email' => 'vince@example.com', 'contact' => '234-789-0123'],
            ['name' => 'Wendy', 'email' => 'wendy@example.com', 'contact' => '345-890-1234'],
            ['name' => 'Xander', 'email' => 'xander@example.com', 'contact' => '456-901-2345'],
            ['name' => 'Yara', 'email' => 'yara@example.com', 'contact' => '567-012-3456'],
            ['name' => 'Zack', 'email' => 'zack@example.com', 'contact' => '678-123-4567'],
            ['name' => 'Amelia', 'email' => 'amelia@example.com', 'contact' => '789-234-5678'],
            ['name' => 'Bruce', 'email' => 'bruce@example.com', 'contact' => '890-345-6789'],
            ['name' => 'Clara', 'email' => 'clara@example.com', 'contact' => '901-456-7890'],
            ['name' => 'Dylan', 'email' => 'dylan@example.com', 'contact' => '012-567-8901'],
        ]);

        $perPage =10;
        $page = request('page', 1);
        $paginated = new \Illuminate\Pagination\LengthAwarePaginator(
            $category->forPage($page, $perPage),
            $category->count(),
            $perPage,
            $page,
            ['path' => request()->url(), 'query' => request()->query()]
        );
        
        return Inertia::render('Home', [
            'category' => $paginated
        ]);
    }

    public function about()
    {
        return Inertia::render('About');
    }


}
