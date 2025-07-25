<!-- Sidepanel
	============================================= -->
	<div id="side-panel" class="dark">

		<div id="side-panel-trigger-close" class="side-panel-trigger"><a href="#"><i class="icon-line-cross"></i></a></div>

		<div class="side-panel-wrap">
			<div class="widget clearfix">
				<a class="side-panel-logo" href="<?= base_url();?>"><img src="<?= base_url('assets/img/main-logo.png');?>"></a>
				<nav class="nav-tree nobottommargin">
					<ul>
					<li class="<?= $menu==1 ? 'active' : ''; ?>"><a href="#">About Us</a>
						<ul>
							<li class="<?= $menu==1 && $submenu==1 ? 'active' : ''; ?>"><a href="<?= base_url('who-we-are');?>">Who Are We</a></li>
							<li class="<?= $menu==1 && $submenu==2 ? 'active' : ''; ?>"><a href="<?= base_url('misson-vision');?>">Our Mission and Vision</a></li>
							<li class="<?= $menu==1 && $submenu==3 ? 'active' : ''; ?>"><a href="<?= base_url('our-values');?>">Our Values</a></li>
							<!--<li class="<?= $menu==1 && $submenu==4 ? 'active' : ''; ?>"><a href="<?= base_url('ceo-messages');?>">Message from the CEO</a></li>-->
							<li class="<?= $menu==1 && $submenu==5 ? 'active' : ''; ?>"><a href="<?= base_url('leadership');?>">Leadership Team</a></li>
							<li class="<?= $menu==1 && $submenu==6 ? 'active' : ''; ?>"><a href="<?= base_url('awards');?>">Awards</a></li>
							<li class="<?= $menu==1 && $submenu==7 ? 'active' : ''; ?>"><a href="<?= base_url('our-story');?>">Our Story</a></li>
							<li class="<?= $menu==1 && $submenu==8 ? 'active' : ''; ?>"><a href="<?= base_url('real-people-group');?>">REAL PEOPLE, REAL PERFORMANCE</a></li>
						</ul>
					</li>
					<li class="<?= $menu==2 ? 'active' : ''; ?>"><a href="#">Our Brands</a>
						<ul>
							<li class="<?= $menu==2 && $submenu==1 ? 'active' : ''; ?>"><a href="<?= base_url('radar-us');?>" class="radar_link">Radar</a></li>
							<li class="<?= $menu==2 && $submenu==9 ? 'active' : ''; ?>"><a href="<?= base_url('radar-tbr');?>" class="radar_link">Radar TBR</a></li>
							 <li class="<?= $menu==2 && $submenu==2 ? 'active' : ''; ?>"><a href="<?= base_url('patriot');?>">Patriot</a></li> 
							 <li class="<?= $menu==2 && $submenu==3 ? 'active' : ''; ?>"><a href="<?= base_url('american-tourer');?>">American Tourer</a></li> 
							<li class="<?= $menu==2 && $submenu==4 ? 'active' : ''; ?>"><a href="<?= base_url('tecnica');?>">Tecnica</a></li>
							<!--<li class="<?= $menu==2 && $submenu==8 ? 'active' : ''; ?>"><a href="<?= base_url('agora');?>">Agora</a></li>-->
							<li class="<?= $menu==2 && $submenu==5 ? 'active' : ''; ?>"><a href="<?= base_url('roadlux');?>">Roadlux</a></li>
							<!--<li class="<?= $menu==2 && $submenu==7 ? 'active' : ''; ?>"><a href="<?= base_url('dealer-login');?>">Dealer Corner</a></li>-->
							<li class="<?= $menu==2 && $submenu==7 ? 'active' : ''; ?>"><a href="<?= base_url('north-america-dealer-locator');?>">Dealer Locator - North America</a></li>
							<li class="<?= $menu==2 && $submenu==8 ? 'active' : ''; ?>"><a href="<?= base_url('uk-europe-dealer-locator');?>">Dealer Locator - UK/Europe</a></li>
							<li class="<?= $menu==2 && $submenu==10 ? 'active' : ''; ?>"><a href="<?= base_url('radar/rpx-800-test-results');?>">Radar Test Results</a></li>
							<!--<li class="<?= $menu==2 && $submenu==6 ? 'active' : ''; ?>"><a href="<?= base_url('t-and-c');?>">Terms & Conditions</a></li>-->
						</ul>
					</li>
					<li class="<?= $menu==7 ? 'active' : ''; ?>"><a href="#">Warranty</a>
						<ul>
							<li class="<?= $menu==7 && $submenu==1 ? 'active' : ''; ?>"><a href="<?= base_url('radar-us/limited-warranty');?>">Radar - North America</a></li>
							<li class="<?= $menu==7 && $submenu==6 ? 'active' : ''; ?>"><a href="https://radartyres.com/eu/warranty">Radar - Europe</a></li>
							<li class="<?= $menu==7 && $submenu==2 ? 'active' : ''; ?>"><a href="<?= base_url('limited-warranty-radar');?>">Radar – Rest of the world</a></li>
							<li class="<?= $menu==7 && $submenu==3 ? 'active' : ''; ?>"><a href="<?= base_url('patriot-us/limited-warranty');?>">Patriot - North America</a></li>
							<!--<li class="<?= $menu==7 && $submenu==5 ? 'active' : ''; ?>"><a href="<?= base_url('american-tourer-us/limited-warranty');?>">American Tourer - North America</a></li>-->
							<!--<li class="<?= $menu==7 && $submenu==4 ? 'active' : ''; ?>"><a href="<?= base_url('limited-warranty-american-tourer');?>">American Tourer</a></li>-->
						</ul>
					</li>
					<li class="<?= $menu==3 ? 'active' : ''; ?>"><a href="#">Renegade Program</a>
						<ul>
							<li class="<?= $menu==3 && $submenu==1 ? 'active' : ''; ?>"><a href="<?= base_url('motorsport');?>">Radar Motorsport</a></li>
						</ul>
					</li>
					<li class="<?= $menu==8 ? 'active' : ''; ?>"><a href="#">DISTRIBUTORS</a>
						<ul>
							<!--<li class="<?= $menu==8 && $submenu==1 ? 'active' : ''; ?>"><a target="_blank" href="https://omnisync.omni-united.com/">OMNISYNC</a></li>-->
							<li class="<?= $menu==8 && $submenu==1 ? 'active' : ''; ?>"><a href="<?= base_url('omni-sync');?>">OMNISYNC</a></li>
						</ul>
					</li>
					<li class="<?= $menu==4 ? 'active' : ''; ?>"><a href="#">Responsibility</a>
						<ul>
							<li class="<?= $menu==4 && $submenu==1 ? 'active' : ''; ?>"><a href="<?= base_url('social-responsibility');?>">Social</a></li>
							<!--<li class="<?= $menu==4 && $submenu==2 ? 'active' : ''; ?>"><a href="<?= base_url('environmental-responsibility');?>">Environmental</a></li>-->
							<!--<li class="<?= $menu==4 && $submenu==4 ? 'active' : ''; ?>"><a href="<?= base_url('climate-change');?>">Climate Change</a></li>-->
							<li class="<?= $menu==4 && $submenu==5 ? 'active' : ''; ?>"><a href="<?= base_url('relief-efforts');?>">Relief Efforts</a></li>
							<!--<li class="<?= $menu==4 && $submenu==3 ? 'active' : ''; ?>"><a href="<?= base_url('covid-assistance');?>">COVID-19 ASSISTANCE</a></li>-->
						</ul>
					</li>
					<li class="<?= $menu==5 ? 'active' : ''; ?>"><a href="#">Media Centre</a>
						<ul>
							<li class="<?= $menu==5 && $submenu==1 ? 'active' : ''; ?>"><a href="<?= base_url('press-releases');?>">Press Releases</a></li>
							<li class="<?= $menu==5 && $submenu==2 ? 'active' : ''; ?>"><a href="<?= base_url('media-coverage');?>">Media Coverage</a></li>
						</ul>
					</li>
					<li class="<?= $menu==6 ? 'active' : ''; ?>"><a href="<?= base_url('contact-us');?>">Contact Us</a></li>
				</ul>
				</nav>
			</div>
		</div>

	</div>