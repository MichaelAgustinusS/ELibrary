<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN PAGE</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-home"></i> <span>Halaman</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
        <ul class="treeview-menu">
        <li><a href="{{ url('home') }}"><i class="fa fa-circle-o"></i> Home</a></li>
        @if (auth()->user()->level==1)
            <li><a href="{{ url('books') }}"><i class="fa fa-circle-o"></i> Data Buku</a></li>
        @elseif(auth()->user()->level==2)
            <li><a href="{{ url('bookuser') }}"><i class="fa fa-circle-o"></i> Data Buku</a></li>
        @endif
        </ul>
    </li>
</ul>