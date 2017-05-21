<footer class="footer-bs">
    <div class="row">
    	<div class="col-md-3 footer-brand animated fadeInLeft">
        	<img src="{{asset('images/e-kako-logo-trans.png')}}" alt="e-kako" style="width: 100px; margin-bottom: 15px;">
            <p>Saznajte sve informacije kako započeti novi život u Njemačkoj. Pročitajte lična iskustva onih koji su već prošli proces prilagođavanja od momenta kako predati za vizu te spajanja porodice do momenta normalnog rada i života u Njemačkoj</p>
            <p>© {{Carbon\Carbon::now()->year}} e-kako.ba, Sva prava zadrzava</p>
        </div>
    	<div class="col-md-4 footer-nav animated fadeInUp">
        	<h4>KATEGORIJE —</h4>
        	<div class="col-md-6">
                <ul class="pages">
                    @foreach($categories as $category)
                    <li><a href="{{route('frontend.category', ['category' => $category])}}">{{$category->name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    	<div class="col-md-2 footer-social animated fadeInDown">
        	<h4>Pratite nas</h4>
        	<ul>
            	<li><a href="https://www.facebook.com/E-kako-1309113109157543/" target="_blank">Facebook</a></li>
            </ul>
        </div>
    {{-- 	<div class="col-md-3 footer-ns animated fadeInRight">
        	<h4>Newsletter</h4>
            <p>A rover wearing a fuzzy suit doesn’t alarm the real penguins</p>
            <p>
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-envelope"></span></button>
                  </span>
                </div><!-- /input-group -->
             </p>
        </div>--}}
    </div>
</footer>