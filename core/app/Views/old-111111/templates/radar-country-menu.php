<!-------mega menu----->
<div class="country-select">
	    <!-- dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false-->
	<a href="#" class="btn btn-success country-menu-button">
	    <div class="country-button-label">Select your region</div>
	  <span class="country-menu-button-text">United States</span>
	</a>
	<div class="country-menu-wrapper">
	  	<div class="row country-menu" >
		    <div class="col-lg-12">
		      <h2 class="uppercase">Select your region/country</h2>
		    </div>
		    <div class="col-lg-3 col-barl line-hide">
		      <strong><i class="omniicon-united-states"></i>North America</strong>
		      <ul class="location-list">
		        <li><a href="<?= base_url('radar-us'); ?>" data-state="North America" data-region="United States">United States</a></li>
		        <li><a class="" href="<?= base_url('radar-ca'); ?>" data-state="North America" data-region="Canada">Canada</a></li>
		      </ul>
		    </div>
		    <div class="col-lg-3 col-barl">
		      <strong><i class="omniicon-south-america"></i><a class="" href="<?= base_url('radar'); ?>" data-state="South America"  data-region=''>south America</a></strong>
		    </div>
		    <div class="col-lg-3 col-barl">
		      <strong><i class="omniicon-europe"></i><a class="" href="<?= base_url('radar-eu'); ?>" data-state="Europe" data-region=''>Europe</a></strong>
		    </div>
		    <div class="col-lg-3 col-barl">
		      <strong><i class="omniicon-asia"></i><a class="" href="<?= base_url('radar'); ?>" data-state="Asia" data-region=''>Asia</a></strong>
		    </div>
		    <div class="col-lg-3 col-barl line-four">
		      <strong><i class="omniicon-middle-east-africa"></i><a class="" href="<?= base_url('radar'); ?>" data-state="Middle East and Africa" data-region=''>Middle East and Africa</a></strong>
		    </div>
	  	</div>	  
	</div>
</div>