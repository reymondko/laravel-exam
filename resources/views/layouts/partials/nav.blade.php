<!-- Navigation -->
<ul class="nav nav-pills">
    
   
    <li class="nav-item">
        <a class="nav-link {{ Request::is('users') ? 'active' : '' }}"" href="/users" >Users</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('tasks') ? 'active' : '' }}"" href="/tasks" >tasks</a>
    </li>
</ul>