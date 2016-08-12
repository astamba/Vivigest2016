<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('resources/assets/dist/img/logo bianco.png')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                @yield('user')
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="header">MENU'</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Anagrafiche</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('clienti')}}"><i class="fa fa-circle-o"></i> Clienti</a></li>
                    <li><a href="{{url('fornitori')}}"><i class="fa fa-circle-o"></i> Fornitori</a></li>
                    <hr>
                    <li><a href="{{url('banche')}}"><i class="fa fa-circle-o"></i> Banche</a></li>
                    <li><a href="{{url('abicab')}}"><i class="fa fa-circle-o"></i> Abi-Cab</a></li>
                    <hr>
                    <li><a href="{{url('pagamenti')}}"><i class="fa fa-circle-o"></i> Pagamenti</a></li>
                    <li><a href="{{url('aliquoteiva')}}"><i class="fa fa-circle-o"></i> Aliquote IVA</a></li>
                    <li><a href="{{url('gruppiclifor')}}"><i class="fa fa-circle-o"></i> Gruppi Cli/For</a></li>
                    <li><a href="{{url('vettori')}}"><i class="fa fa-circle-o"></i> Vettori</a></li>
                    <li><a href="{{url('unitamisura')}}"><i class="fa fa-circle-o"></i> Unità di Misura</a></li>
                    <li><a href="{{url('tipologiespedizione')}}"><i class="fa fa-circle-o"></i> Tipologie Spedizione</a></li>
                    <li><a href="{{url('porti')}}"><i class="fa fa-circle-o"></i> Porti</a></li>
                    <li><a href="{{url('causalitrasporto')}}"><i class="fa fa-circle-o"></i> CausaliTrasporto</a></li>
                    <li><a href="{{url('aspettobeni')}}"><i class="fa fa-circle-o"></i> Aspetto dei Beni</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Documenti</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('ordinifor')}}"><i class="fa fa-circle-o"></i> Ordini a Fornitore</a></li>
                    <li><a href="{{url('bollefor')}}"><i class="fa fa-circle-o"></i> Bolle di Acquisto</a></li>
                    <li><a href="{{url('fatturefor')}}"><i class="fa fa-circle-o"></i> Fatture di Acquisto</a></li>
                    <hr>
                    <li><a href="{{url('preventivicli')}}"><i class="fa fa-circle-o"></i> Preventivi Cliente</a></li>
                    <li><a href="{{url('ordinicli')}}"><i class="fa fa-circle-o"></i> Ordini Cliente</a></li>
                    <li><a href="{{url('bollecli')}}"><i class="fa fa-circle-o"></i> Bolle di Vendita</a></li>
                    <li><a href="{{url('fattureacccli')}}"><i class="fa fa-circle-o"></i> Fatture Acc. di Vendita</a></li>
                    <li><a href="{{url('fatturecli')}}"><i class="fa fa-circle-o"></i> Fatture di Vendita</a></li>
                    <hr>
                    <li><a href="{{url('contatori')}}"><i class="fa fa-circle-o"></i> Contatori</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Magazzino</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('gruppiarticoli')}}"><i class="fa fa-circle-o"></i> Gruppi Articoli</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>