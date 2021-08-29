        <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
          <div class="container">
            <div class="row align-items-center">
              
              <div class="col-lg-9 order-lg-first">
                <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                                    
                  <li class="nav-item mn user">
                    <a href="{{ route('user') }}" class="nav-link">
                      <i class="fa fa-users"></i> 
                      Utilisateurs
                    </a>
                  </li>
                  
                  <li class="nav-item mn categorie">
                    <a href="{{ route('categorie') }}" class="nav-link">
                      <i class="fa fa-bars"></i> 
                      Catégories
                    </a>
                  </li>
                 
                  <li class="nav-item mn article">
                    <a href="{{ route('article') }}" class="nav-link">
                      <i class="fa fa-picture-o"></i> 
                      Articles
                    </a>
                  </li>

                  <li class="nav-item mn page">
                    <a href="{{ route('page') }}" class="nav-link">
                      <i class="fa fa-file-text"></i> 
                      Pages
                    </a>
                  </li>

                  <li class="nav-item mn coupon">
                    <a href="{{ route('coupon') }}" class="nav-link">
                      <i class="fa fa-money"></i> 
                      Coupons
                    </a>
                  </li>

                   <li class="nav-item mn client">
                    <a href="{{ route('client') }}" class="nav-link">
                      <i class="fa fa-user"></i> 
                      Clients
                    </a>
                  </li>

                   <li class="nav-item mn commande">
                    <a href="{{ route('commande') }}" class="nav-link">
                      <i class="fa fa-bars"></i>
                      Commandes
                    </a>
                  </li>
                   
                  <script type="text/javascript">
                    $(document).ready(function(){
                      $('.mn.{{ explode('_',\Request::route()->getName())[0] }}').addClass('active');
                    })
                  </script>
                </ul>
              </div>
            </div>
          </div>
        </div>