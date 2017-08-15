<a name="menu-ancla"></a>
<div class="bs-example blue" data-example-id="inverted-navbar"> 
   <nav class="navbar navbar-inverse container custom-menu blue" style="border: 0px solid #000000;"> 
      <div class="container-fluid"> 
         <div class="navbar-header"> 
            <button type="button" class="collapsed navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-9" aria-expanded="true"> 
               <span class="sr-only">Toggle navigation</span> 
               <span class="icon-bar"></span> 
               <span class="icon-bar"></span> 
               <span class="icon-bar"></span> 
            </button>
         </div> 
         <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-9"> 
            <ul class="nav navbar-nav"> 
               <li class="click-nav text-white"><a href="{!! route('visitors.partners') !!}">Socios</a></li>
               <li class="nosotros-menu click-nav text-white"><a href="{!! route('visitors.favorites') !!}">Favoritos</a></li> 
               <li class="eventos-especiales-menu click-nav text-white"><a href="{!! route('visitors.myProfile') !!}">Mi perfil</a></li> 
               <li class="click-nav text-white"><a href="{!! route('logout', array(Auth::user()->id)) !!}">Salir</a></li> 
            </ul> 
         </div> 
      </div> 
   </nav> 
</div>