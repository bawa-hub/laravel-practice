@extends('eloquent.layouts.index')

@section('body')
<style>
    .body {
        padding: 20px;
        background-color: aqua;
        flex: 1
    }
    .users {
        display: flex
    }
    .user {
        background-color: white;
          padding: 12px;
          margin: 10px;
        border-radius: 8px
    }
</style>
<div class="body">
    <div>
        <p>Users and their profile has one to one relation.</p>
        <p></p>
    </div>
    <div>
        <h2>Create User</h2>
        <div>
            <form method="POST" action="{{ route('users.store') }}">
                @csrf
                <div>
                  <input type="text" placeholder="Enter Name" name="name">
                </div>
               <div>
                  <input type="email" placeholder="Enter Email" name="email">
               </div>
               <div>
                <input type="password" placeholder="Enter Password" name="password">
             </div>
             <div>
                <input type="text" placeholder="Enter Phone" name="phone">
             </div>
             <div>
                <input type="text" placeholder="Enter Address" name="address">
             </div>
             <div>
                <input type="text" placeholder="Enter Profession" name="profession">
             </div>
                <div>
                  <button>Save</button>
                </div>
              </form>
        </div>
    </div>
           <div>
            <h2>All Users</h2>

            <div class="users">
             @foreach ($users as $user)
             <div class="user">
                 <h4>Name:{{ $user->name }}</h4>
                 <h4>Email:{{ $user->email }}</h4>
                 <h4>Address:{{ $user->profile->phone }}</h4>
                 <h4>Address:{{ $user->profile->profession }}</h4>
             <h4>Address:{{ $user->profile->address }}</h4>
             </div>
         @endforeach
            </div>
           </div>
</div>
@endsection