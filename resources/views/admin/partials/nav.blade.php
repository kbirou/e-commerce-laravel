<aside class="side-nav">
    <div class="logo">
        <img src="{{ asset('img/logo.svg') }}" alt="">
        ADMINPANEL
    </div>
    <ul>
        <li>
            <a href="{{route('adminpanel')}}">Dashboard</a>
        </li>
        <li>
            <a href="{{route('adminpanel.products')}}">Products</a>
        </li>
        <li>
            <a  href="{{route('adminpanel.categories')}}">Categories</a>
        </li>
        <li>
            <a href="{{route('adminpanel.colors')}}">Colors</a>
        </li>
        <li>
            <a href="">Orders</a>
        </li>
    </ul>
    <div class="logout">
        <form action="{{route('logout')}}" method="post">
        @csrf
        <button type="submit">
            &nbsp; Logout
        </button>
    </form>
    </div>
</aside>