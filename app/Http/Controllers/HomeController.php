<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Profile;
use App\Models\Role;
use App\Models\User;
use App\Models\Video;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function insertUser()
    {
        // for ($i = 0; $i < 100; $i++) {
        //     DB::table('users')->insert([
        //         'name' => Str::random(8),
        //         'email' => Str::random(8) . "@gmail.com"
        //     ]);
        // }
        // echo "100 user inserted.";
        $user = User::create([
            'name' => Str::random(8),
            "email" => Str::random(8) . "@gmail.com",
            "password" => "12345678",
            'active' => 1
        ]);
        if ($user) {
            $profile = new Profile();
            $profile->user_id = $user->id;
            $profile->phone = "1111111111";
            $profile->address = "Patalpur";
            $profile->profession = "Web Developer";
            if ($profile->save()) {
                echo "User is created";
            }
        }
    }

    public function getUsers()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function activeUser()
    {
        $users = User::active()->get();
        return $users;
    }

    public function getUserWithQueries()
    {
        $users = User::orderBy('name')->take(10)->get();
        return $users;
    }

    public function retrieveSingleModel()
    {
        // Retrieve a model by its primary key...
        $user = User::find(101);
        // Retrieve the first model matching the query constraints...
        $user1 = User::orderBy('name')->first();
        echo $user->name;
        echo "<br>";
        echo $user1->name;
    }

    public function retrieveSingleModelWithNoValue()
    {
        $user = User::where('name', 'Ram')->firstOr(function () {
            return "Bawa Vikram";
        });
        echo $user;
    }

    public function notFound()
    {
        $user = User::findOrFail(1000);
        return $user;
    }

    public function aggregates()
    {
        $count = User::count();
        return $count;
    }

    public function userProfiles()
    {
        $users = User::all();
        foreach ($users as $user) {
            echo "name: $user->name, address: $user->profile";
            echo "<br>";
        }
    }

    public function profiles()
    {
        $profiles = Profile::all();
        foreach ($profiles as $profile) {
            echo "name: " . $profile->user->name . " profession: " . $profile->profession;
            echo "<br>";
        }
    }

    public function createPost()
    {
        $post = new Post();
        $post->user_id = 1;
        $post->title = "Demo Title";
        $post->body = "Demo body";
        if ($post->save()) {
            return "POst Created";
        }
    }

    public function createPostImage()
    {
        $post = Post::first();
        $post->image()->create(['url' => 'some/image.jpg']);
        echo "image created for post_id 1";
    }

    public function createPostComment()
    {
        $post = Post::first();
        $post->comments()->create(['body' => 'second comment']);
        echo "comment created";
    }

    public function createPostTags()
    {
        $post = Post::first();
        $post->tags()->create(['name' => 'Eloquent']);
        echo "tag created";
    }

    public function createVideoComment()
    {
        $video = Video::first();
        $video->comments()->create(['body' => 'video comment']);
        echo "comment created";
    }

    public function createVideoTags()
    {
        $video = Video::first();
        $video->tags()->create(['name' => 'Eloquent']);
        echo "tag created";
    }

    public function createUserImage()
    {
        $user = User::first();
        $user->image()->create(['url' => 'some/profile.jpg']);
        echo "image created for user_id 1";
    }

    public function posts()
    {
        $posts = User::find(102)->posts;
        foreach ($posts as $post) {
            echo "title: $post->title, body: $post->body";
            echo "<br>";
        }
    }

    public function postUser()
    {
        $posts = Post::all();
        foreach ($posts as $post) {
            echo "title: $post->title, body: $post->body" . " Username: " . $post->user->name;
            echo "<br>";
        }
    }

    public function latestPost()
    {
    }

    public function oldestPost()
    {
    }

    public function createRecords()
    {
        // create roles
        // DB::table('roles')->insert([
        //     'name' => 'Manager'
        // ]);

        // assign role to user1
        // $user = User::find(101);
        // $roleIds = [1, 2];
        // $user->roles()->attach($roleIds);

        // assign role to user2
        // $user = User::find(102);
        // $roleIds = [1, 2];
        // $user->roles()->sync($roleIds);

        // assign user to role
        // $role = Role::find(1);
        // $userIds = [101, 102];
        // $role->users()->attach($userIds);

        // assign user to role
        $role = Role::find(2);
        $userIds = [101, 102];
        $role->users()->sync($userIds);
    }

    public function getRecords()
    {
        // get role of user id 101
        // $user = User::find(101);
        // dd($user->roles);

        // get user with role id 1
        $role = Role::find(1);
        dd($role->users);
    }

    public function getPivotColumns()
    {
        $user = User::find(101);
        foreach ($user->roles as $role) {
            echo $role->pivot->created_at;
        }
    }

    public function deleteUser()
    {
        if (User::find(101)->delete()) {
            echo "user deleted";
        }
    }


    /** RUNNING DATABASE QUERIES */

    public function getData()
    {
        $users = DB::table('users')->get();
        foreach ($users as $user) {
            echo $user->name . "<br>";
        }
    }

    public function getSingle()
    {
        $user = DB::table('users')->where('name', 'f4IVHMjA')->first();
        $userById = DB::table('users')->find(6);
        $email = DB::table('users')->where('name', 'f4IVHMjA')->value('email');
        echo $user->email . " " . $userById->email . " " . $email;
    }

    public function columnValues()
    {
        $names = DB::table('users')->pluck('name');
        foreach ($names as $name) {
            echo $name . "<br>";
        }
        echo "<br>";
        $emails = DB::table('users')->pluck('email', 'name');
        foreach ($emails as $name => $email) {
            echo $name . " => " . $email . "<br>";
        }
    }

    public function chunkResults()
    {
        DB::table('users')->orderBy('id')->chunk(100, function ($users) {
            foreach ($users as $user) {
                echo $user->name . "<br>";
            }
            return false;
        });
    }

    /** SELECT STATEMENT */

    public function selectStmnt()
    {
        $users = DB::table('users')
            ->select('name', 'email as user_email')
            ->get();
        echo $users . "<br>";
        $distinctUsers = DB::table('users')->distinct()->get();
        echo $distinctUsers;
    }

    /** RAW EXPRESSIONS */
    public function rawExp()
    {
        $users = DB::table('users')
            ->select(DB::raw('count(*) as user_count'))
            ->get();
        return $users;
    }

    /** INSERT STATEMENTS */
    public function insert()
    {
        for ($i = 0; $i < 100; $i++) {
            DB::table('users')->insert([
                'name' => Str::random(8),
                'email' => Str::random(8) . '@gmail.com',
            ]);
        }
        echo "user is inserted";
    }

    public function autoincrement()
    {
        $id = DB::table('users')->insertGetId(
            ['email' => 'john@example.com', 'name' => 'bawa']
        );
        echo $id;
    }
}
