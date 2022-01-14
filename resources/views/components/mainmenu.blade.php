<div class="mainmenu pull-left">
    <ul class="nav navbar-nav collapse navbar-collapse">
        <li><a href="{{route('home')}}" class="active">Home</a></li>

        <li class="dropdown"><a href="contact-us.html">Product<i class="fa fa-angle-down"></i></a>

            <ul role="menu" class="sub-menu">
                @foreach($danhmucsaches as $categoryParent)
                <li><a href="{{route('category.product', ['slug' => $categoryParent->slug, 'id' => $categoryParent->id])}}">{{$categoryParent->DMS_Tieude}}</a></li>
                @endforeach
            </ul>
        </li>

        <li><a href="{{route('blog')}}">Blog</a></li>
        <li><a href="{{route('contact')}}">Contact</a></li>
    </ul>
</div>

