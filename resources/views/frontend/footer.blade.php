<footer class="footer-bs">
    <div class="row">
    	<div class="col-md-3 footer-brand animated fadeInLeft">
        	<img src="{{asset('images/e-kako-logo-trans.png')}}" alt="e-kako" style="width: 100px; margin-bottom: 15px;">
            <p>Suspendisse hendrerit tellus laoreet luctus pharetra. Aliquam porttitor vitae orci nec ultricies. Curabitur vehicula, libero eget faucibus faucibus, purus erat eleifend enim, porta pellentesque ex mi ut sem.</p>
            <p>© 2014 BS3 UI Kit, All rights reserved</p>
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
            	<li><a href="#">Facebook</a></li>
            	<li><a href="#">Twitter</a></li>
            	<li><a href="#">Instagram</a></li>
            	<li><a href="#">RSS</a></li>
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