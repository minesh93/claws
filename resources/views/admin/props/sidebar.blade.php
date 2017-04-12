
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
            Store
        </p>
        <ul class="menu-list">
            <li><a href="/admin/products">Products</a></li>
            <li>
                @if (url()->current() == '/admin/products/')
                    <ul>
                        <li><a href="/admin/products/add">Add Product</a></li>
                    </ul>
                @endif
            </li>
            <li><a>Orders</a></li>
        </ul>
        <p class="menu-label">
            Content
        </p>
        <ul class="menu-list">
            <li><a href="/admin/content/page/">Pages</a></li>
            <li><a href="/admin/content/blog/">Blogs</a></li>
        </ul>
        <p class="menu-label">
            Other Important Shit
        </p>
    </aside>
</div>

