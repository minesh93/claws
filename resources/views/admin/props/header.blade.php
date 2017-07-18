<div class="column is-2 sidebar">
    <div class="title">
        Claws
    </div>
    <div class="subtitle">
        Admin
    </div>
    <aside class="menu">
        <p class="menu-label">
            General
        </p>
        <ul class="menu-list">
            <li><a>Dashboard</a></li>
        </ul>
        <p class="menu-label">
            Content
        </p>
        <ul class="menu-list">
            @foreach(PostRegister::getRegister() as $postReg)
                <li>
                    <a class="@if(strpos(url()->current(),$postReg->name)) is-active @endif" href="/admin/content/{{$postReg->name}}/">{{$postReg->listName}}</a>
                    @if(strpos(url()->current(),$postReg->name))
                        <ul>
                            <li><a class="@if(Request::is('admin/content/'.$postReg->name.'/add')) is-active @endif" href="/admin/content/{{$postReg->name}}/add">{{$postReg->createText}}</a></li>
                            <li><a class="@if(Request::is('admin/content/'.$postReg->name)) is-active @endif" href="/admin/content/{{$postReg->name}}/">{{$postReg->listTitle}}</a></li>
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
        <p class="menu-label">
            Site
        </p>
        <ul class="menu-list">
            <li><a href="/admin/theme/">Theme</a></li>
        </ul>

        <p class="menu-label">
            Settings
        </p>
        <ul class="menu-list">
            <li><a href="/admin/settings/">General</a></li>
        </ul>

    </aside>
</div>

