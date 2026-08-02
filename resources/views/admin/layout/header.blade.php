<header id="header" class="header">

<div class="header-menu">

    <div class="col-sm-7">
        <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
    </div>

    <div class="col-sm-5">
        <div class="user-area dropdown float-right">
            <x-app-layout>
                
            </x-app-layout>
        </div>

        <!-- for notification  starts-->
            <div class="user-area dropdown float-right notification-icon" id="toggleBtn">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="count fa-stack" style="position: absolute;top: -7px;right: -9px;background-color: red; color: white;font-size:12px;">
                         <!-- Initial count -->
                        {{ $user->unreadNotifications->count() }}
                        
                    </span>
                </a>
                <i class="fa fa-bell-o fa-lg"></i>
                <div class="notification-area" id="notificationArea">
                    <h1 style="font-size:22px; font-weight:bold;">Notifications</h1>
                    <ul id="notificationList">
                        <!-- Notification items will be appended here -->
                        @forelse($user->unreadNotifications as $notification)
                            <div>
                                <a href="{{ route('notifications.show', ['type' => $notification->type, 'id' => $notification->id]) }}">
                                    {{ $notification->data['name'] }} submitted a form.

                                </a>
                            </div>
                            <form action="{{ route('notifications.markAsRead', ['type' => $notification->type, 'id' => $notification->id]) }}" method="POST" class="mark-as-read-form">
                                @csrf
                                <button type="submit" class="btn btn-secondary btn-sm rounded">Mark as Read</button>
                            </form>
                            <hr>
                        @empty
                            <a class="nav-link" href="#"> No notification found.</a>
                        @endforelse

                    </ul>
                </div>
            </div>
        <!-- for notification  ends-->
    </div>
</div>

</header><!-- /header -->

