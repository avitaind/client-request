        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="/">
                    <img src="{{ asset('images/icon/logo.png') }}" alt="ASHPLAN MEDIA" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                    <!---
                        Dashboard
                    --->
                
                      @auth
                        @if (Auth::user()->is_admin=='1')
                        <li class="active">
                            <a href="{{ url('admin/dashboard') }}"> <i class="fa fa-tachometer-alt"></i>Dashboard</a>
                         </li>
                         @else
                         <li class="active">
                            <a href="{{ url('/dashboard') }}"> <i class="fa fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                         @endif
               
                     @endauth


                    <!---
                        Tickets
                    --->

                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-ticket"></i>Tickets</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                            <li>
                                 <a href="{{ url('ticket/create') }}">
                                  <i class="fa fa-plus"></i>Create New</a>
                             </li>
                             <li>
                                 <a href="chart.html">
                                  <i class="fa fa-check-circle"></i>Completed</a>
                             </li>

                             <li>
                                 <a href="chart.html">
                                  <i class="fa fa-spinner"></i>Processing</a>
                             </li>
                             <li>
                                 <a href="chart.html">
                                  <i class="fa fa-gear"></i>Pending</a>
                             </li>
                         
                             <li>
                                 <a href="chart.html">
                                  <i class="fa fa-stop-circle"></i>Closed</a>
                             </li>
                             <li>
                                 <a href="chart.html">
                                  <i class="fa fa-ban"></i>Rejected</a>
                             </li>
                            <li>
                                 <a href="chart.html">
                                  <i class="fa fa-globe"></i>View All</a>
                             </li>
                           </ul>
                        </li>
                
                   <!---
                        Projects
                    --->
                    <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-tasks"></i>Projects</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                         
                             <li>
                                 <a href="chart.html">Social Media</a>
                             </li>
                             <li>
                                 <a href="chart.html">Retail Artwork</a>
                             </li>
                             <li>
                                 <a href="chart.html">Website/NEXSTMALL</a>
                             </li>
                             <li>
                                 <a href="chart.html">SEO</a>
                             </li>
                             <li>
                                 <a href="chart.html">Print Ads/Outdoor</a>
                             </li>
                             <li>
                                 <a href="chart.html">Social Media</a>
                             </li>
                             <li>
                                 <a href="chart.html">Content</a>
                             </li>
                             <li>
                                 <a href="chart.html">Reporting</a>
                             </li>
                             <li>
                                 <a href="chart.html">EDM</a>
                             </li>
                             <li>
                                 <a href="chart.html">3rd Party eCommerce</a>
                             </li>
                             <li>
                                 <a href="chart.html">Application Support</a>
                             </li>
                             <li>
                                 <a href="chart.html">Misc Work</a>
                             </li>

                           </ul>
                        </li>
                

                   

                  <!---
                        Resources / Employees
                   --->

                   @auth
                      @if (Auth::user()->is_admin=='1')
                        <li>
                            <a href="form.html">
                                <i class="fa fa-users"></i>Resources</a>
                        </li>
                        @else
                        <li>
                            <a href="form.html">
                                <i class="fa fa-users"></i>Employees</a>
                        </li>
                        @endif
               
                     @endauth
                        <li>
                            <a href="calendar.html">
                                <i class="fa fa-calendar-alt"></i>Calendar</a>
                        </li>
                        <li>
                            <a href="map.html">
                                <i class="fa fa-support"></i>Support</a>
                        </li>
                        
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->