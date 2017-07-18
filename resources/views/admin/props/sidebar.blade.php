<div class="sidebar">
    <h2>Claws Admin</h2>
    <aside class="menu">
        <p class="category-split">
            <i class="fa fa-tachometer" aria-hidden="true"></i> General
        </p>
        <ul class="menu-list">
            <li><a>Dashboard</a></li>
        </ul>
        <p class="category-split">
            <i class="fa fa-file-text" aria-hidden="true"></i> Content
        </p>
        <ul class="content-menu">
            @foreach(PostRegister::getRegister() as $postReg)
                <li>
                    <a class="category-split" v-on:click="activeMenu = type.name"><i v-bind:class="['fa',type.icon]" aria-hidden="true"></i> {{$postReg->listName}}</a>
                    @if(strpos(url()->current(),$postReg->name))
                        <ul>
                            <li><a class="@if(Request::is('admin/content/'.$postReg->name.'/add')) is-active @endif" href="/admin/content/{{$postReg->name}}/add">{{$postReg->createText}}</a></li>
                            <li><a class="@if(Request::is('admin/content/'.$postReg->name)) is-active @endif" href="/admin/content/{{$postReg->name}}/">{{$postReg->listTitle}}</a></li>
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
        <p class="category-split">
            Site
        </p>
        <ul class="menu-list">
            <li><a href="/admin/theme/">Theme</a></li>
        </ul>

        <p class="category-split">
            <i class="fa fa-cogs" aria-hidden="true"></i> Settings
        </p>
        <ul class="menu-list">
            <li><a href="/admin/settings/">General</a></li>
        </ul>

    </aside>
</div>


