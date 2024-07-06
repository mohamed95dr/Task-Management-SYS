<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
<style>

body{
margin-top: 50px;
background-color: #f1f1f1;
}
.nav-pills .nav-link.active, .nav-pills .show > .nav-link{
background-color: #17A2B8;
}
.dropdown-menu{
top: 60px;
right: 0px;
left: unset;
width: 460px;
box-shadow: 0px 5px 7px -1px #c1c1c1;
padding-bottom: 0px;
padding: 0px;
}
.dropdown-menu:before{
content: "";
position: absolute;
top: -20px;
right: 12px;
border:10px solid #343A40;
border-color: transparent transparent #343A40 transparent;
}
.head{
padding:5px 15px;
border-radius: 3px 3px 0px 0px;
}
.footer{
padding:5px 15px;
border-radius: 0px 0px 3px 3px;
}
.notification-box{
padding: 10px 0px;
}
.bg-gray{
background-color: #eee;
}
@media (max-width: 640px) {
.dropdown-menu{
top: 50px;
left: -16px;
width: 290px;
}
.nav{
display: block;
}
.nav .nav-item,.nav .nav-item a{
padding-left: 0px;
}
.message{
font-size: 13px;
}
}

 </style>
</head>
<body>
<div class="">
<div class="row">
<div class="col-lg-10 col-sm-10 col-12 offset-lg-1 offset-sm-1">
<nav class="navbar navbar-expand-lg bg-info rounded">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-17A2B8 dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent" style="display: unset !important;">

<ul class="nav nav-pills mr-auto justify-content-end">

<x-nav-link class="navbar-brand text-light" :href="route('tasks.index')" :active="request()->routeIs('tasks.index')">
                        {{ __('Tasks List') }}
                    </x-nav-link>

                    <x-nav-link  class="navbar-brand text-light" :href="route('users.index')" :active="request()->routeIs('users.index')">
                        {{ __('Users List') }}
                    </x-nav-link>
                    
<li class="nav-item dropdown">
<a class="nav-link text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<i class="fa fa-bell"></i>
</a>
<ul class="dropdown-menu">
<li class="head text-light bg-dark">
<div class="row">
<div class="col-lg-12 col-sm-12 col-12">
            
<span>Notifications ({{Auth::User()->unreadNotifications->count()}})</span>
{{-- <a href="" class="float-right text-light"> {{Auth::User()->name}} </a> --}}
</div>
</li>
@foreach (Auth::User()->unreadNotifications as $notification)
<li class="notification-box">
<div class="row">
<div class="col-lg-3 col-sm-3 col-3 text-center">
<img src="/demo/man-profile.jpg" class="w-50 rounded-circle">
</div>
<div class="col-lg-8 col-sm-8 col-8">
    <a href="{{route ('tasks.show',$notification->data['task_id'])}}"> Task Title : {{$notification->data['task_title']}} </a>
<div>
    The Task Constructor:
  {{$notification->data['task_constructor']}}
</div>
<small class="text-warning">{{$notification->created_at}}</small>
</div>
</div>
</li>
@endforeach

<li class="footer bg-dark text-center">
<a href="" class="text-light">View All</a>
</li>
</ul>
</li>
</ul>
</div>
</nav>
</div>
</div>
</div>
</body>
</html>