<!-- Page Sub Menu
============================================= -->
<?php 
if (!isset($amenu)) {
	$amenu='';	
}
?>

<div id="page-menu">

	<div id="page-menu-wrap">

		<div class="container clearfix">

			<div class="menu-title">Admin <span>omni</span></div>

			<nav>
				<ul>
					<li class="<?= $amenu==1?'current':''  ?>"><a href="<?= base_url('admin/tire')?>"><div>Tyres</div></a>
						<ul>
							<li><a href="<?= base_url('admin/brand')?>"><div>Brand</div></a></li>
							<li><a href="<?= base_url('admin/tire-category')?>"><div>Category</div></a></li>
							<li><a href="<?= base_url('admin/terrain')?>"><div>Terrain Category</div></a></li>
							<li><a href="<?= base_url('admin/icons')?>"><div>Icons</div></a></li>
							<li><a href="<?= base_url('admin/tire/tire-reorder')?>"><div>Reorder Tyres</div></a></li>
							<li><a href="<?= base_url('admin/tire-deleted')?>"><div>Deleted Tyres</div></a></li>
						</ul>
					</li>
					
					<li class="<?= $amenu==1?'current':''  ?>"><a href="<?= base_url('admin/dealers')?>"><div>Dealers</div></a>
						<ul>
							<li><a href="<?= base_url('admin/dealers/deleted')?>"><div>Deleted Dealers</div></a></li>
						</ul>
					</li>
					
					<li class="<?= $amenu==2?'current':''  ?>"><a href="<?= base_url('admin/pr')?>"><div>Press Releases</div></a>
						<ul>
							<li><a href="<?= base_url('admin/cat')?>"><div>Category</div></a></li>							
						</ul>
					</li>
					<li class="<?= $amenu==3?'current':''  ?>">
						<a href="<?= base_url('admin/mc')?>"><div>Media Coverages</div></a>
						<ul>
							<li><a href="<?= base_url('admin/cat')?>"><div>Category</div></a></li>							
						</ul>
					</li>
					<li  class="<?= $amenu==4?'current':''  ?>"><a href="#"><div>Golf</div></a>
						<ul>
							<li><a href="<?= base_url('admin/golf-tournaments')?>"><div>Tounaments</div></a></li>
							<li><a href="<?= base_url('admin/golf-highlights')?>"><div>Highlights</div></a></li>
						</ul>
					</li>
					<li  class="<?= $amenu==5?'current':''  ?>"><a href="#"><div>Motorsports</div></a>
						<ul>
							<li><a href="<?= base_url('admin/races')?>"><div>Race</div></a></li>
							<li><a href="<?= base_url('admin/wins')?>"><div>Wins</div></a></li>
						</ul>
					</li>
					<li  class="<?= $amenu==6?'current':''  ?>"><a href="<?= base_url('admin/carousels')?>"><div>Sliders</div></a>
					</li>
					<li  class="<?= $amenu==8?'current':''  ?>"><a href="#"><div>Forms</div></a>
						<ul>
						    
							<li><a href="<?= base_url('admin/contactinquiry')?>"><div>Contact Inquiry</div></a></li>
							<li><a href="<?= base_url('admin/dealerinquiry')?>"><div>Dealer Inquiry</div></a></li>
							<li><a href="<?= base_url('admin/tire-registrations')?>"><div>Tire Registrations</div></a></li>
							<li><a href="<?= base_url('admin/subscribers')?>"><div>Subscibers</div></a></li>
							<li><a href="<?= base_url('admin/subscribers-tnt')?>"><div>Subscibers TNT</div></a></li>
							<li><a href="<?= base_url('admin/orderinquiry')?>"><div>Order Inquiry</div></a></li>
							<li><a href="<?= base_url('admin/radaruspremium-enquiry')?>"><div>Radar US Premium</div></a></li>
						</ul>
					</li>
					<li  class="<?= $amenu==9?'current':''  ?>"><a href="<?= base_url('admin/news')?>"><div>News</div></a>
					</li>
					<li class="<?= $amenu==7?'current':''  ?>"><a href="#"><div>User</div></a>
						<ul>
							<li><a href="#"><div>Edit Profile</div></a></li>
							<li><a href="#"><div>Change Password</div></a></li>
							<li><a href="<?= base_url('logout')?>"><div>Logout</div></a></li>
						</ul>
					</li>
				</ul>
			</nav>

			<div id="page-submenu-trigger"><i class="icon-reorder"></i></div>

		</div>

	</div>

</div><!-- #page-menu end -->